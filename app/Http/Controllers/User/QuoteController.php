<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteAttachment;
use App\Models\QuoteDeliverable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\CloudinaryUrl;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::where('user_id', auth()->id())->with('attachments')->latest()->get();
        return view('user.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('user.quotes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'required|string',
            'files.*' => 'nullable|file|max:25600',
        ]);

        $token = Str::uuid();

        $attachments = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                try {
                    if (!$file || !$file->isValid()) continue;
                    $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads/' . $token, $filename, 'cloudinary');
                    if ($path) {
                        $attachments[] = [
                            'filename' => $filename,
                            'original_name' => $file->getClientOriginalName(),
                            'path' => $path,
                            'mime_type' => $file->getMimeType(),
                            'size' => $file->getSize(),
                        ];
                    }
                } catch (\Throwable $e) {
                    \Log::error('Quote (user) file upload error: ' . $e->getMessage(), [
                        'file' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                    return back()->withInput()->withErrors(['files' => 'Errore caricamento file: ' . $e->getMessage()]);
                }
            }
        }

        $quote = Quote::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => $request->phone,
            'service_type' => $data['service_type'],
            'description' => $data['description'],
            'status' => 'pending',
            'token' => $token,
        ]);

        foreach ($attachments as $att) {
            $att['quote_id'] = $quote->id;
            QuoteAttachment::create($att);
        }

        return redirect()->route('user.quotes.show', $quote)->with('success', 'Richiesta inviata con successo!');
    }

    public function show(Quote $quote)
    {
        if ($quote->user_id !== auth()->id()) {
            abort(403);
        }
        $quote->load('attachments', 'deliverables', 'messages.user');
        return view('user.quotes.show', compact('quote'));
    }

    public function downloadAttachment(Quote $quote, QuoteAttachment $attachment)
    {
        if ($quote->user_id !== auth()->id()) abort(403);
        if ($attachment->quote_id !== $quote->id) abort(404);
        return redirect(CloudinaryUrl::get($attachment->path));
    }

    public function downloadDeliverable(Quote $quote, QuoteDeliverable $deliverable)
    {
        if ($quote->user_id !== auth()->id()) abort(403);
        if ($deliverable->quote_id !== $quote->id) abort(404);

        if ($quote->isPaid()) {
            return redirect(CloudinaryUrl::get($deliverable->path_original));
        }

        if ($deliverable->path_watermarked) {
            return redirect(CloudinaryUrl::get($deliverable->path_watermarked));
        }

        return back()->with('error', 'Nessuna anteprima disponibile.');
    }

    public function checkout(Request $request, Quote $quote)
    {
        if ($quote->user_id !== auth()->id()) {
            abort(403);
        }
        if (!$quote->hasAmount()) {
            return back()->withErrors(['amount' => 'Nessun prezzo impostato per questo preventivo.']);
        }

        $paymentType = $request->query('type', 'deposit');

        if ($paymentType === 'deposit') {
            if ($quote->hasPaidDeposit()) {
                return back()->withErrors(['paid' => 'Acconto già pagato.']);
            }
            $amount = $quote->depositAmount();
            $label = 'Acconto 50%';
        } else {
            if ($quote->isPaid()) {
                return back()->withErrors(['paid' => 'Preventivo già saldato.']);
            }
            if (!$quote->hasPaidDeposit()) {
                return back()->withErrors(['paid' => 'Devi prima pagare l\'acconto del 50%.']);
            }
            if (!$quote->isDelivered()) {
                return back()->withErrors(['delivered' => 'La grafica non è stata ancora consegnata.']);
            }
            $amount = $quote->finalAmount();
            $label = 'Saldo 50%';
        }

        return view('user.quotes.paypal', compact('quote', 'paymentType', 'amount', 'label'));
    }
}
