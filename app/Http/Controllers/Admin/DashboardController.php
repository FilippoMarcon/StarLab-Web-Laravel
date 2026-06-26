<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class DashboardController extends Controller
{
    public function index()
    {
        $quotesCount = Quote::where('status', 'pending')->count();
        $totalQuotes = Quote::count();
        $completedQuotes = Quote::where('status', 'done')->count();
        $depositQuotes = Quote::whereNotNull('deposit_paid_at')->count();
        $paidQuotes = Quote::whereNotNull('paid_at')->count();
        $revenue = Quote::whereNotNull('paid_at')->sum('amount');

        return view('admin.dashboard', compact('quotesCount', 'totalQuotes', 'completedQuotes', 'depositQuotes', 'paidQuotes', 'revenue'));
    }
}
