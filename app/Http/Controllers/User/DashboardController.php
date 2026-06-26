<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $quotes = Quote::where('user_id', auth()->id())
            ->with('deliverables')
            ->latest()
            ->get();

        $totalQuotes = $quotes->count();
        $pendingQuotes = $quotes->where('status', 'pending')->count();
        $completedQuotes = $quotes->where('status', 'done')->count();

        $lastMessageSub = DB::table('quote_messages')
            ->selectRaw('MAX(id) as max_id')
            ->groupBy('quote_id');

        $newReplyIds = DB::table('quote_messages')
            ->joinSub($lastMessageSub, 'latest', fn($j) => $j->on('quote_messages.id', '=', 'latest.max_id'))
            ->where('quote_messages.is_staff', true)
            ->pluck('quote_messages.quote_id')
            ->toArray();

        return view('user.dashboard', compact(
            'quotes', 'totalQuotes', 'pendingQuotes', 'completedQuotes', 'newReplyIds'
        ));
    }
}
