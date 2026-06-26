<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class DashboardController extends Controller
{
    public function index()
    {
        $totalQuotes = Quote::count();

        $pendingQuotes = Quote::where('status', 'pending')->count();
        $contactedQuotes = Quote::where('status', 'contacted')->whereNull('deposit_paid_at')->count();
        $depositOnlyQuotes = Quote::whereNotNull('deposit_paid_at')->whereNull('paid_at')->count();
        $paidQuotes = Quote::whereNotNull('paid_at')->count();
        $revenue = Quote::whereNotNull('paid_at')->sum('amount');

        $recentQuotes = Quote::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalQuotes', 'pendingQuotes', 'contactedQuotes',
            'depositOnlyQuotes', 'paidQuotes', 'revenue', 'recentQuotes'
        ));
    }
}
