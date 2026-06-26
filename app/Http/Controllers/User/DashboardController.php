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

        $staffReplies = DB::table('quote_messages')
            ->joinSub($lastMessageSub, 'latest', fn($j) => $j->on('quote_messages.id', '=', 'latest.max_id'))
            ->where('quote_messages.is_staff', true)
            ->select('quote_messages.quote_id', 'quote_messages.created_at as last_reply_at')
            ->get()
            ->keyBy('quote_id');

        $newReplyIds = [];
        $quotes->each(function ($q) use ($staffReplies, &$newReplyIds) {
            $row = $staffReplies[$q->id] ?? null;
            if ($row) {
                $lastReplyAt = $row->last_reply_at;
                if (!$q->client_last_viewed_at || $lastReplyAt > $q->client_last_viewed_at) {
                    $newReplyIds[] = $q->id;
                }
            }
        });

        return view('user.dashboard', compact(
            'quotes', 'totalQuotes', 'pendingQuotes', 'completedQuotes', 'newReplyIds'
        ));
    }
}
