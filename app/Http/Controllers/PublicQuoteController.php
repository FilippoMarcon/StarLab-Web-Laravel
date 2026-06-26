<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use Illuminate\Support\Facades\Storage;

class PublicQuoteController extends Controller
{
    private string $disk = 'cloudinary';

    public function show($token)
    {
        $quote = Quote::where('token', $token)->with('attachments', 'deliverables')->firstOrFail();
        return view('public.preventivo', compact('quote'));
    }

    public function downloadAttachment($token, QuoteAttachment $attachment)
    {
        $quote = Quote::where('token', $token)->firstOrFail();
        if ($attachment->quote_id !== $quote->id) abort(404);
        return redirect(Storage::disk($this->disk)->url($attachment->path));
    }

    public function downloadDeliverable($token, QuoteDeliverable $deliverable)
    {
        $quote = Quote::where('token', $token)->firstOrFail();
        if ($deliverable->quote_id !== $quote->id) abort(404);

        if ($quote->isPaid()) {
            return redirect(Storage::disk($this->disk)->url($deliverable->path_original));
        }

        if ($deliverable->path_watermarked) {
            return redirect(Storage::disk($this->disk)->url($deliverable->path_watermarked));
        }

        return back()->with('error', 'Nessuna anteprima disponibile.');
    }
}
