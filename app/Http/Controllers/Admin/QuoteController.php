<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use App\Services\CloudinaryUrl;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Quote::with('user')->latest();

        if ($request->status === 'pending') {
            $query->where('status', 'pending');
        } elseif ($request->status === 'contacted') {
            $query->where('status', 'contacted');
        } elseif ($request->status === 'in_progress') {
            $query->where('status', 'in_progress');
        } elseif ($request->payment === 'deposit') {
            $query->whereNotNull('deposit_paid_at')->whereNull('paid_at');
        } elseif ($request->payment === 'paid') {
            $query->whereNotNull('paid_at');
        }

        $quotes = $query->get();
        $currentFilter = $request->status ?? $request->payment ?? null;

        return view('admin.quotes.index', compact('quotes', 'currentFilter'));
    }

    public function show(Quote $quote)
    {
        $quote->load('attachments', 'deliverables', 'messages.user');
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(Request $request, Quote $quote)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,contacted,in_progress,done',
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

        $oldStatus = $quote->status;
        $oldNotes = $quote->staff_notes;
        $quote->update($updateData);
        if ($oldStatus !== $quote->status) {
            $statusLabels = ['pending' => 'In attesa', 'contacted' => 'Contattato', 'in_progress' => 'In lavorazione', 'done' => 'Completato'];
            $quote->logActivity('status.changed', 'Stato cambiato in ' . ($statusLabels[$quote->status] ?? $quote->status));
        }
        if ($oldNotes !== $quote->staff_notes && !empty($quote->staff_notes)) {
            $quote->logActivity('note.added', 'Nota aggiunta dallo staff');
        }
        return redirect()->route('admin.quotes.show', $quote)->with('success', 'Preventivo aggiornato.');
    }

    public function uploadDeliverable(Request $request, Quote $quote)
    {
        error_log('UPLOAD_DELIVERABLE: reached controller for quote ' . $quote->id);

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

                error_log('Deliverable file debug: mime=' . $file->getMimeType() . ' ext=' . $file->getClientOriginalExtension() . ' realpath=' . ($file->getRealPath() ?: 'NULL'));

                $watermarkedPath = null;
                if (str_starts_with($file->getMimeType(), 'image/')) {
                    $watermarkedPath = 'quotes/' . $quote->id . '/deliverables/wm_' . $filename;
                    try {
                        $tmpFile = tempnam(sys_get_temp_dir(), 'wm_');
                        $this->applyLogoWatermark($file->getRealPath(), $tmpFile);
                        if (file_exists($tmpFile)) {
                            $handle = fopen($tmpFile, 'rb');
                            Storage::disk('cloudinary')->put($watermarkedPath, $handle);
                            @unlink($tmpFile);
                        }
                    } catch (\Throwable $we) {
                        error_log('Watermark failed for ' . $filename . ': ' . $we->getMessage());
                        $watermarkedPath = null;
                    }
                }

                error_log('Creating deliverable: original=' . $originalPath . ' wm=' . ($watermarkedPath ?? 'null') . ' name=' . $file->getClientOriginalName());

                QuoteDeliverable::create([
                    'quote_id' => $quote->id,
                    'filename' => $filename,
                    'original_name' => $file->getClientOriginalName(),
                    'path_original' => $originalPath,
                    'path_watermarked' => $watermarkedPath,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);
                $quote->logActivity('deliverable.uploaded', 'Grafica caricata: ' . $file->getClientOriginalName());
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

        $isWatermarked = !$quote->isPaid();

        if (!$quote->isPaid()) {
            if ($deliverable->path_watermarked) {
                DownloadLog::create([
                    'quote_id' => $quote->id,
                    'user_id' => auth()->id(),
                    'file_type' => $deliverable->mime_type ?? 'unknown',
                    'file_name' => $deliverable->original_name ?? 'file',
                    'is_watermarked' => true,
                    'ip_address' => request()->ip(),
                ]);
                return redirect(CloudinaryUrl::get($deliverable->path_watermarked));
            }
            return back()->with('error', 'Nessuna anteprima disponibile.');
        }

        DownloadLog::create([
            'quote_id' => $quote->id,
            'user_id' => auth()->id(),
            'file_type' => $deliverable->mime_type ?? 'unknown',
            'file_name' => $deliverable->original_name ?? 'file',
            'is_watermarked' => false,
            'ip_address' => request()->ip(),
        ]);

        return redirect(CloudinaryUrl::get($deliverable->path_original));
    }

    public function downloadAttachment(Quote $quote, QuoteAttachment $attachment)
    {
        if ($attachment->quote_id !== $quote->id) {
            abort(404);
        }
        DownloadLog::create([
            'quote_id' => $quote->id,
            'user_id' => auth()->id(),
            'file_type' => $attachment->mime_type ?? 'unknown',
            'file_name' => $attachment->original_name ?? 'file',
            'is_watermarked' => false,
            'ip_address' => request()->ip(),
        ]);
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

    public function simulateDeposit(Quote $quote)
    {
        $quote->update([
            'deposit_paid_at' => now(),
            'deposit_paypal_txn_id' => 'SIMULATO_' . Str::random(16),
            'staff_notes' => 'L\'acconto del 50% è stato ricevuto! Iniziamo a lavorare alla tua grafica.',
            'staff_notes_updated_at' => now(),
            'status' => 'in_progress',
        ]);
        $quote->logActivity('deposit.paid', 'Acconto del 50% simulato (test)');
        return redirect()->route('admin.quotes.show', $quote)
            ->with('success', 'Acconto del 50% simulato con successo (nessun addebito reale).');
    }

    public function resetPaymentSimulation(Quote $quote)
    {
        $quote->update([
            'paid_at' => null,
            'paypal_txn_id' => null,
        ]);
        $quote->logActivity('simulation.reset', 'Simulazione saldo rimossa');
        return redirect()->route('admin.quotes.show', $quote)
            ->with('success', 'Simulazione saldo rimossa. Il preventivo è tornato allo stato "saldo da pagare".');
    }

    public function simulateFinal(Quote $quote)
    {
        $quote->update([
            'paid_at' => now(),
            'paypal_txn_id' => 'SIMULATO_' . Str::random(16),
            'staff_notes' => 'Il saldo finale è stato ricevuto con successo! Puoi scaricare le versioni originali senza watermark.',
            'staff_notes_updated_at' => now(),
        ]);
        if (!$quote->isDelivered()) {
            $quote->update(['delivered_at' => now()]);
        }
        $quote->logActivity('final.paid', 'Saldo del 50% simulato (test)');
        return redirect()->route('admin.quotes.show', $quote)
            ->with('success', 'Saldo del 50% simulato con successo (nessun addebito reale).');
    }

    private function applyLogoWatermark($sourcePath, $destPath)
    {
        error_log('applyLogoWatermark called: source=' . $sourcePath . ' dest=' . $destPath);

        $logoPath = public_path('images/StarLab-Logo.png');
        if (!file_exists($logoPath)) {
            error_log('Watermark: logo not found at ' . $logoPath);
            return;
        }

        error_log('Watermark: logo found, source exists=' . (file_exists($sourcePath) ? 'yes' : 'no') . ' size=' . (file_exists($sourcePath) ? filesize($sourcePath) : 'N/A'));

        $info = @getimagesize($sourcePath);
        if (!$info) {
            error_log('Watermark: getimagesize failed for ' . $sourcePath);
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
                error_log('Watermark: unsupported mime ' . $mime);
                return;
        }

        if (!$srcImg) {
            error_log('Watermark: imagecreate failed for ' . $sourcePath);
            return;
        }

        $logoImg = @imagecreatefrompng($logoPath);
        if (!$logoImg) {
            error_log('Watermark: logo imagecreate failed');
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
