<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service_type' => 'required|string|max:255',
            'description' => 'required|string',
            'files' => 'nullable|array',
            'files.*' => 'file|max:25600',
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
                    \Log::error('Quote (public) file upload error: ' . $e->getMessage(), [
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
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'service_type' => $data['service_type'],
            'description' => $data['description'],
            'user_id' => auth()->id(),
            'token' => $token,
        ]);

        $quote->update([
            'staff_notes' => 'Grazie per averci contattato! Ti ricontatteremo al più presto.',
            'staff_notes_updated_at' => now(),
        ]);

        foreach ($attachments as $att) {
            $att['quote_id'] = $quote->id;
            QuoteAttachment::create($att);
        }

        return redirect()->route('preventivo.show', $quote->token)->with('success', 'Richiesta inviata con successo! Ti contatteremo presto.');
    }
}
