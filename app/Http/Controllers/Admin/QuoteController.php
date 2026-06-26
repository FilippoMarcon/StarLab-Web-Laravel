<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use Illuminate\Http\Request;
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

        $logoPath = public_path('images/StarLab-Logo.png');

        foreach ($request->file('files') as $file) {
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $originalPath = $file->storeAs('quotes/' . $quote->id . '/deliverables', $filename, 'public');

            $watermarkedPath = null;
            if (str_starts_with($file->getMimeType(), 'image/')) {
                $watermarkedPath = 'quotes/' . $quote->id . '/deliverables/wm_' . $filename;
                $this->applyLogoWatermark(
                    Storage::disk('public')->path($originalPath),
                    Storage::disk('public')->path($watermarkedPath),
                    $logoPath
                );
            }

            QuoteDeliverable::create([
                'quote_id' => $quote->id,
                'filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'path_original' => $originalPath,
                'path_watermarked' => $watermarkedPath,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);
        }

        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Grafiche caricate con successo.');
    }

    public function downloadDeliverable(Quote $quote, QuoteDeliverable $deliverable)
    {
        if ($deliverable->quote_id !== $quote->id) abort(404);

        // If not paid, only allow watermarked download
        if (!$quote->isPaid()) {
            if ($deliverable->path_watermarked) {
                return Storage::disk('public')->download($deliverable->path_watermarked, $deliverable->original_name);
            }
            return back()->with('error', 'Nessuna anteprima disponibile.');
        }

        return Storage::disk('public')->download($deliverable->path_original, $deliverable->original_name);
    }

    public function downloadAttachment(Quote $quote, QuoteAttachment $attachment)
    {
        if ($attachment->quote_id !== $quote->id) {
            abort(404);
        }
        return Storage::disk('public')->download($attachment->path, $attachment->original_name);
    }

    public function destroyDeliverable(Quote $quote, QuoteDeliverable $deliverable)
    {
        if ($deliverable->quote_id !== $quote->id) abort(404);

        Storage::disk('public')->delete([$deliverable->path_original, $deliverable->path_watermarked]);
        $deliverable->delete();

        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Grafica eliminata.');
    }

    private function applyLogoWatermark($sourcePath, $destPath, $logoPath)
    {
        if (!file_exists($logoPath)) return;

        $info = getimagesize($sourcePath);
        if (!$info) return;

        $width = $info[0];
        $height = $info[1];
        $mime = $info['mime'];

        switch ($mime) {
            case 'image/jpeg': $srcImg = imagecreatefromjpeg($sourcePath); break;
            case 'image/png': $srcImg = imagecreatefrompng($sourcePath); break;
            case 'image/gif': $srcImg = imagecreatefromgif($sourcePath); break;
            case 'image/webp': $srcImg = imagecreatefromwebp($sourcePath); break;
            default: return;
        }

        $logoImg = imagecreatefrompng($logoPath);
        $logoSrcW = imagesx($logoImg);
        $logoSrcH = imagesy($logoImg);

        $logoW = intval($width * 0.15);
        $logoH = intval($logoSrcH * ($logoW / $logoSrcW));

        $spacingX = intval($logoW * 1.3);
        $spacingY = intval($logoH * 1.3);

        $watermarked = imagecreatetruecolor($width, $height);
        imagecopy($watermarked, $srcImg, 0, 0, 0, 0, $width, $height);

        for ($x = 0; $x < $width; $x += $spacingX) {
            for ($y = 0; $y < $height; $y += $spacingY) {
                imagecopyresampled($watermarked, $logoImg, $x, $y, 0, 0, $logoW, $logoH, $logoSrcW, $logoSrcH);
            }
        }

        imagedestroy($logoImg);

        imagecopymerge($srcImg, $watermarked, 0, 0, 0, 0, $width, $height, 30);
        imagedestroy($watermarked);

        $destDir = dirname($destPath);
        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        switch ($mime) {
            case 'image/jpeg': imagejpeg($srcImg, $destPath, 90); break;
            case 'image/png': imagepng($srcImg, $destPath, 9); break;
            case 'image/gif': imagegif($srcImg, $destPath); break;
            case 'image/webp': imagewebp($srcImg, $destPath, 90); break;
        }
        imagedestroy($srcImg);
    }
}
