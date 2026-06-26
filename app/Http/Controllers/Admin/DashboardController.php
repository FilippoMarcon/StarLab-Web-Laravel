<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteActivity;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalQuotes = Quote::count();
        $pendingQuotes = Quote::where('status', 'pending')->count();
        $contactedQuotes = Quote::where('status', 'contacted')->whereNull('deposit_paid_at')->count();
        $inProgressQuotes = Quote::where('status', 'in_progress')->count();
        $depositOnlyQuotes = Quote::whereNotNull('deposit_paid_at')->whereNull('paid_at')->count();
        $paidQuotes = Quote::whereNotNull('paid_at')->count();
        $revenue = Quote::whereNotNull('paid_at')->sum('amount');
        $monthlyRevenue = Quote::whereNotNull('paid_at')
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('amount');

        $toBeDelivered = Quote::whereNotNull('deposit_paid_at')
            ->whereNull('paid_at')
            ->whereDoesntHave('deliverables')
            ->with('user')
            ->get();

        $lastMessageSub = DB::table('quote_messages')
            ->selectRaw('MAX(id) as max_id')
            ->groupBy('quote_id');

        $pendingReplyRows = DB::table('quote_messages')
            ->joinSub($lastMessageSub, 'latest', fn($j) => $j->on('quote_messages.id', '=', 'latest.max_id'))
            ->where('quote_messages.is_staff', false)
            ->select('quote_messages.quote_id', 'quote_messages.created_at as last_msg_at')
            ->get()
            ->keyBy('quote_id');

        $pendingReplyIds = [];
        $pendingReplyQuotes = Quote::whereIn('id', $pendingReplyRows->keys())->with('user')->get();
        $filtered = [];
        foreach ($pendingReplyQuotes as $q) {
            $lastMsgAt = $pendingReplyRows[$q->id]->last_msg_at ?? null;
            if ($lastMsgAt && (!$q->staff_last_viewed_at || $lastMsgAt > $q->staff_last_viewed_at)) {
                $filtered[] = $q;
                $pendingReplyIds[] = $q->id;
            }
        }
        $pendingReplyCount = count($filtered);
        $pendingReplyQuotes = collect($filtered);

        $monthlyChart = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $total = Quote::whereNotNull('paid_at')
                ->whereMonth('paid_at', $date->month)
                ->whereYear('paid_at', $date->year)
                ->sum('amount');
            $monthlyChart[] = [
                'month' => $date->isoFormat('MMM'),
                'year' => $date->year,
                'total' => (float) $total,
            ];
        }

        $recentActivities = QuoteActivity::with('quote')
            ->latest()
            ->take(15)
            ->get();

        $recentQuotes = Quote::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalQuotes', 'pendingQuotes', 'contactedQuotes', 'inProgressQuotes',
            'depositOnlyQuotes', 'paidQuotes', 'revenue', 'monthlyRevenue',
            'toBeDelivered', 'pendingReplyCount', 'pendingReplyQuotes',
            'pendingReplyIds', 'monthlyChart', 'recentActivities', 'recentQuotes'
        ));
    }
}
