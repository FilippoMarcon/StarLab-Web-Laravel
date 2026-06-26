<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use Illuminate\Support\Facades\Storage;

class PublicQuoteController extends Controller
{
    public function show($token)
    {
        $quote = Quote::where('token', $token)->with('attachments', 'deliverables')->firstOrFail();
        return view('public.preventivo', compact('quote'));
    }

    public function downloadAttachment($token, QuoteAttachment $attachment)
    {
        $quote = Quote::where('token', $token)->firstOrFail();
        if ($attachment->quote_id !== $quote->id) abort(404);
        return Storage::disk('public')->download($attachment->path, $attachment->original_name);
    }

    public function downloadDeliverable($token, QuoteDeliverable $deliverable)
    {
        $quote = Quote::where('token', $token)->firstOrFail();
        if ($deliverable->quote_id !== $quote->id) abort(404);

        if ($quote->isPaid()) {
            return Storage::disk('public')->download($deliverable->path_original, $deliverable->original_name);
        }

        if ($deliverable->path_watermarked) {
            return Storage::disk('public')->download($deliverable->path_watermarked, $deliverable->original_name);
        }

        return back()->with('error', 'Nessuna anteprima disponibile.');
    }
}
