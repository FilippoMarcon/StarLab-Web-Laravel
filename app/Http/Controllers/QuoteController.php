<?php

namespace App\Http\Controllers;

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
            'files.*' => 'nullable|file|max:25600',
        ]);

        $quote = Quote::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'service_type' => $data['service_type'],
            'description' => $data['description'],
            'user_id' => auth()->id(),
            'token' => Str::uuid(),
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                try {
                    if (!$file || !$file->isValid()) continue;
                    $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('quotes/' . $quote->id, $filename, 'cloudinary');
                    if ($path) {
                        QuoteAttachment::create([
                            'quote_id' => $quote->id,
                            'filename' => $filename,
                            'original_name' => $file->getClientOriginalName(),
                            'path' => $path,
                            'mime_type' => $file->getMimeType(),
                            'size' => $file->getSize(),
                        ]);
                    }
                } catch (\Exception $e) {
                    \Log::error('Quote file upload error: ' . $e->getMessage());
                }
            }
        }

        return back()->with('success', 'Richiesta inviata con successo! Ti contatteremo presto.')->with('token', $quote->token);
    }
}
