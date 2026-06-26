<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use App\Services\CloudinaryUrl;
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
        return redirect(CloudinaryUrl::get($attachment->path));
    }

    public function downloadDeliverable($token, QuoteDeliverable $deliverable)
    {
        $quote = Quote::where('token', $token)->firstOrFail();
        if ($deliverable->quote_id !== $quote->id) abort(404);

        if ($quote->isPaid()) {
            return redirect(CloudinaryUrl::get($deliverable->path_original));
        }

        if ($deliverable->path_watermarked) {
            return redirect(CloudinaryUrl::get($deliverable->path_watermarked));
        }

        return back()->with('error', 'Nessuna anteprima disponibile.');
    }
}
