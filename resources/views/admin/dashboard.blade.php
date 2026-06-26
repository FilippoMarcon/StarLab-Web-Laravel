@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-black text-white uppercase tracking-tight">Dashboard</h1>
    <p class="text-slate-400 text-sm mt-1">Panoramica del sistema</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Preventivi Totali</p>
        <p class="text-3xl font-black text-white">{{ $totalQuotes }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">In Attesa</p>
        <p class="text-3xl font-black text-amber-400">{{ $quotesCount }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Completati</p>
        <p class="text-3xl font-black text-emerald-400">{{ $completedQuotes }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Pagamenti Ricevuti</p>
        <p class="text-3xl font-black text-white">{{ $paidQuotes }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Ricavi Totali</p>
        <p class="text-3xl font-black text-amber-500">&euro;{{ number_format($revenue, 2) }}</p>
    </div>
</div>
@endsection
