<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contatti');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'project_type' => 'required|string|max:255',
            'budget' => 'nullable|string|max:255',
            'description' => 'required|string|max:5000',
            'deadline' => 'nullable|string|max:255',
        ]);

        $budget = $data['budget'] ?? 'Non specificato';
        $deadline = $data['deadline'] ?? 'Non specificata';

        try {
            Mail::raw(
                "Nuova richiesta da: {$data['name']}\n" .
                "Email: {$data['email']}\n" .
                "Tipo progetto: {$data['project_type']}\n" .
                "Budget: {$budget}\n" .
                "Descrizione: {$data['description']}\n" .
                "Deadline: {$deadline}",
                function ($message) {
                    $message->to(config('mail.from.address'))
                        ->subject('Nuova richiesta da StarLab Design');
                }
            );
        } catch (\Throwable $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
        }

        return back()->with('success', 'Richiesta inviata con successo! Ti ricontatterò entro 24h.');
    }
}
