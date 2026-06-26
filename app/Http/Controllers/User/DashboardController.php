<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class DashboardController extends Controller
{
    public function index()
    {
        $quotes = Quote::where('user_id', auth()->id())->latest()->get();
        $totalQuotes = $quotes->count();
        $pendingQuotes = $quotes->where('status', 'pending')->count();
        $completedQuotes = $quotes->where('status', 'done')->count();

        return view('user.dashboard', compact('quotes', 'totalQuotes', 'pendingQuotes', 'completedQuotes'));
    }
}
