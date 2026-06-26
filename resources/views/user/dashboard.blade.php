@extends('user.layouts.app')

@section('title', 'StarLab | Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-black text-white uppercase tracking-tight">Dashboard</h1>
    <p class="text-slate-400 text-sm mt-1">Benvenuto, {{ auth()->user()->name }}!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Richieste Totali</p>
        <p class="text-3xl font-black text-white">{{ $totalQuotes }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">In Attesa</p>
        <p class="text-3xl font-black text-amber-400">{{ $pendingQuotes }}</p>
    </div>
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Completate</p>
        <p class="text-3xl font-black text-emerald-400">{{ $completedQuotes }}</p>
    </div>
</div>

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">Richieste Recenti</h2>
    <a href="{{ route('user.quotes.create') }}" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all text-sm shadow-lg shadow-amber-500/25">Nuova Richiesta</a>
</div>

<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-slate-800">
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Data</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Servizio</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Stato</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quotes->take(5) as $quote)
                <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                    <td class="p-4 text-sm text-slate-300">{{ $quote->created_at->format('d/m/Y') }}</td>
                    <td class="p-4 text-sm text-white font-bold">{{ $quote->service_type }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs font-bold rounded-full
                            @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                            @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                            @else bg-emerald-900/30 text-emerald-400 @endif">
                            {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                        </span>
                    </td>
                    <td class="p-4">
                        <a href="{{ route('user.quotes.show', $quote) }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Dettagli</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-12 text-center text-slate-500">
                        <p class="text-lg font-bold">Nessuna richiesta</p>
                        <p class="text-sm mt-1">Crea la tua prima richiesta per iniziare.</p>
                        <a href="{{ route('user.quotes.create') }}" class="inline-block mt-4 px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all text-sm">Nuova Richiesta</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($quotes->count() > 5)
        <div class="p-4 text-center">
            <a href="{{ route('user.quotes.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Vedi tutte &rarr;</a>
        </div>
    @endif
</div>
@endsection
