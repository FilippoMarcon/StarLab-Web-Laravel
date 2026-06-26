<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\QuoteMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function messages(Request $request, Quote $quote)
    {
        $this->authorizeAccess($quote);

        $after = $request->integer('after', 0);

        $user = Auth::user();
        $isStaff = $user->role === 'staff' || $user->role === 'admin';

        if ($isStaff) {
            $quote->update(['staff_last_viewed_at' => now()]);
        } else {
            $quote->update(['client_last_viewed_at' => now()]);
        }

        return $quote->messages()
            ->with('user')
            ->when($after, fn($q) => $q->where('id', '>', $after))
            ->oldest()
            ->get()
            ->map(function ($msg) {
                return [
                    'id' => $msg->id,
                    'message' => $msg->message,
                    'is_staff' => $msg->is_staff,
                    'sender' => $msg->is_staff ? 'Staff' : ($msg->user->name ?? 'Utente'),
                    'time' => $msg->created_at->format('d/m H:i'),
                ];
            });
    }

    public function send(Request $request, Quote $quote)
    {
        $this->authorizeAccess($quote);

        $data = $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $user = Auth::user();
        $isStaff = $user->role === 'staff' || $user->role === 'admin';

        $msg = QuoteMessage::create([
            'quote_id' => $quote->id,
            'user_id' => $user->id,
            'is_staff' => $isStaff,
            'message' => $data['message'],
        ]);

        $msg->load('user');

        return [
            'id' => $msg->id,
            'message' => $msg->message,
            'is_staff' => $msg->is_staff,
            'sender' => $msg->is_staff ? 'Staff' : $msg->user->name,
            'time' => $msg->created_at->format('d/m H:i'),
        ];
    }

    private function authorizeAccess(Quote $quote): void
    {
        $user = Auth::user();
        if (!$user) abort(403);

        $isStaff = $user->role === 'staff' || $user->role === 'admin';
        if (!$isStaff && $quote->user_id !== $user->id) {
            abort(403);
        }
    }
}
