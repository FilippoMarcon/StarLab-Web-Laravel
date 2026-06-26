<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use Illuminate\Http\Request;
use App\Services\CloudinaryUrl;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::with('user')->latest()->get();
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(Quote $quote)
    {
        $quote->load('attachments', 'deliverables', 'messages.user');
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, Quote $quote)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,contacted,done',
            'staff_notes' => 'nullable|string',
            'amount' => 'nullable|numeric|min:0|max:999999.99',
        ]);

        $updateData = ['status' => $data['status']];
        if (!empty($data['staff_notes'])) {
            $updateData['staff_notes'] = $data['staff_notes'];
            $updateData['staff_notes_updated_at'] = now();
        }
        if (isset($data['amount'])) {
            $updateData['amount'] = $data['amount'];
        }

        $quote->update($updateData);
        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Preventivo aggiornato.');
    }

    public function uploadDeliverable(Request $request, Quote $quote)
    {
        $request->validate([
            'files.*' => 'required|file|max:102400',
        ]);

        $uploaded = 0;
        foreach ($request->file('files') as $file) {
            try {
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $originalPath = $file->storeAs('quotes/' . $quote->id . '/deliverables', $filename, 'cloudinary');

                if (!$originalPath) {
                    \Log::error('Upload deliverable: Cloudinary storeAs failed', ['name' => $file->getClientOriginalName()]);
                    continue;
                }

                $watermarkedPath = null;
                if (str_starts_with($file->getMimeType(), 'image/')) {
                    $watermarkedPath = 'quotes/' . $quote->id . '/deliverables/wm_' . $filename;
                    try {
                        $tmpFile = tempnam(sys_get_temp_dir(), 'wm_');
                        $this->applyLogoWatermark($file->getRealPath(), $tmpFile);
                        if (file_exists($tmpFile)) {
                            $handle = fopen($tmpFile, 'rb');
                            Storage::disk('cloudinary')->put($watermarkedPath, $handle);
                            fclose($handle);
                            unlink($tmpFile);
                        }
                    } catch (\Throwable $we) {
                        \Log::warning('Watermark failed for ' . $filename . ': ' . $we->getMessage());
                        $watermarkedPath = null;
                    }
                }

                \Log::info('Creating deliverable: original=' . $originalPath . ' wm=' . ($watermarkedPath ?? 'null') . ' name=' . $file->getClientOriginalName());

                QuoteDeliverable::create([
                    'quote_id' => $quote->id,
                    'filename' => $filename,
                    'original_name' => $file->getClientOriginalName(),
                    'path_original' => $originalPath,
                    'path_watermarked' => $watermarkedPath,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);
                $uploaded++;
            } catch (\Throwable $e) {
                \Log::error('Upload deliverable error: ' . $e->getMessage(), [
                    'file' => $file->getClientOriginalName(),
                    'trace' => $e->getTraceAsString(),
                ]);
                return back()->withErrors(['files' => 'Errore caricamento ' . $file->getClientOriginalName() . ': ' . $e->getMessage()]);
            }
        }

        if (!$quote->isDelivered() && $uploaded > 0) {
            $quote->update(['delivered_at' => now()]);
        }

        return redirect()->route('admin.quotes.show', $quote)->with('success', "$uploaded grafica/e caricata/e con successo.");
    }

    public function downloadDeliverable(Quote $quote, QuoteDeliverable $deliverable)
    {
        if ($deliverable->quote_id !== $quote->id) abort(404);

        if (!$quote->isPaid()) {
            if ($deliverable->path_watermarked) {
                return redirect(CloudinaryUrl::get($deliverable->path_watermarked));
            }
            return back()->with('error', 'Nessuna anteprima disponibile.');
        }

        return redirect(CloudinaryUrl::get($deliverable->path_original));
    }

    public function downloadAttachment(Quote $quote, QuoteAttachment $attachment)
    {
        if ($attachment->quote_id !== $quote->id) {
            abort(404);
        }
        return redirect(CloudinaryUrl::get($attachment->path));
    }

    public function destroy(Quote $quote)
    {
        foreach ($quote->deliverables as $deliverable) {
            $paths = array_filter([$deliverable->path_original, $deliverable->path_watermarked]);
            if ($paths) {
                Storage::disk('cloudinary')->delete($paths);
            }
        }
        foreach ($quote->attachments as $attachment) {
            Storage::disk('cloudinary')->delete($attachment->path);
        }
        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('success', 'Preventivo eliminato.');
    }

    public function destroyDeliverable(Quote $quote, QuoteDeliverable $deliverable)
    {
        if ($deliverable->quote_id !== $quote->id) abort(404);

        $paths = array_filter([$deliverable->path_original, $deliverable->path_watermarked]);
        if ($paths) {
            Storage::disk('cloudinary')->delete($paths);
        }
        $deliverable->delete();

        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Grafica eliminata.');
    }

    private function applyLogoWatermark($sourcePath, $destPath)
    {
        $logoPath = public_path('images/StarLab-Logo.png');
        if (!file_exists($logoPath)) {
            \Log::error('Watermark: logo not found at ' . $logoPath);
            return;
        }

        $info = @getimagesize($sourcePath);
        if (!$info) {
            \Log::error('Watermark: getimagesize failed for ' . $sourcePath);
            return;
        }

        $width = $info[0];
        $height = $info[1];
        $mime = $info['mime'];

        switch ($mime) {
            case 'image/jpeg': $srcImg = @imagecreatefromjpeg($sourcePath); break;
            case 'image/png': $srcImg = @imagecreatefrompng($sourcePath); break;
            case 'image/gif': $srcImg = @imagecreatefromgif($sourcePath); break;
            case 'image/webp': $srcImg = @imagecreatefromwebp($sourcePath); break;
            default:
                \Log::error('Watermark: unsupported mime ' . $mime);
                return;
        }

        if (!$srcImg) {
            \Log::error('Watermark: imagecreate failed for ' . $sourcePath);
            return;
        }

        $logoImg = @imagecreatefrompng($logoPath);
        if (!$logoImg) {
            \Log::error('Watermark: logo imagecreate failed');
            return;
        }

        $logoSrcW = imagesx($logoImg);
        $logoSrcH = imagesy($logoImg);

        $logoW = intval($width * 0.15);
        $logoH = intval($logoSrcH * ($logoW / $logoSrcW));

        $spacingX = intval($logoW * 1.3);
        $spacingY = intval($logoH * 1.3);

        $watermarked = @imagecreatetruecolor($width, $height);
        if (!$watermarked) {
            \Log::error('Watermark: imagecreatetruecolor failed for size ' . $width . 'x' . $height);
            imagedestroy($srcImg);
            imagedestroy($logoImg);
            return;
        }

        imagecopy($watermarked, $srcImg, 0, 0, 0, 0, $width, $height);

        for ($x = 0; $x < $width; $x += $spacingX) {
            for ($y = 0; $y < $height; $y += $spacingY) {
                @imagecopyresampled($watermarked, $logoImg, $x, $y, 0, 0, $logoW, $logoH, $logoSrcW, $logoSrcH);
            }
        }

        imagedestroy($logoImg);

        @imagecopymerge($srcImg, $watermarked, 0, 0, 0, 0, $width, $height, 30);
        imagedestroy($watermarked);

        switch ($mime) {
            case 'image/jpeg': @imagejpeg($srcImg, $destPath, 90); break;
            case 'image/png': @imagepng($srcImg, $destPath, 9); break;
            case 'image/gif': @imagegif($srcImg, $destPath); break;
            case 'image/webp': @imagewebp($srcImg, $destPath, 90); break;
        }
        imagedestroy($srcImg);
    }
}
