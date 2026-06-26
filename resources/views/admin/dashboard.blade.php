@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Dashboard')

@section('content')
<div class="mb-8 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Dashboard</h1>
        <p class="text-slate-400 text-sm mt-1">Panoramica del sistema</p>
    </div>
    <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl text-sm transition-all">
        Tutti i Preventivi &rarr;
    </a>
</div>

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    <a href="{{ route('admin.quotes.index') }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Preventivi Totali</p>
        <p class="text-3xl font-black text-white">{{ $totalQuotes }}</p>
    </a>

    <a href="{{ route('admin.quotes.index') }}?status=pending" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">In Attesa</p>
        <p class="text-3xl font-black text-amber-400">{{ $pendingQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">Da contattare</p>
    </a>

    <a href="{{ route('admin.quotes.index') }}?status=contacted" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Contattati</p>
        <p class="text-3xl font-black text-blue-400">{{ $contactedQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">In attesa acconto</p>
    </a>

    <a href="{{ route('admin.quotes.index') }}?payment=deposit" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Acconti Ricevuti</p>
        <p class="text-3xl font-black text-amber-400">{{ $depositOnlyQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">In lavorazione</p>
    </a>

    <a href="{{ route('admin.quotes.index') }}?payment=paid" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-emerald-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-emerald-400 transition-colors">Saldati</p>
        <p class="text-3xl font-black text-emerald-400">{{ $paidQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">Completati</p>
    </a>

    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Ricavi Totali</p>
        <p class="text-3xl font-black text-amber-500">&euro;{{ number_format($revenue, 2) }}</p>
    </div>
</div>

{{-- RECENT QUOTES TABLE --}}
<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider">Ultimi Preventivi</h2>
        <a href="{{ route('admin.quotes.index') }}" class="text-xs text-amber-500 hover:text-amber-400 font-bold">Vedi tutti &rarr;</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-slate-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-3 font-bold">Cliente</th>
                    <th class="px-6 py-3 font-bold">Servizio</th>
                    <th class="px-6 py-3 font-bold">Prezzo</th>
                    <th class="px-6 py-3 font-bold">Pagamento</th>
                    <th class="px-6 py-3 font-bold">Stato</th>
                    <th class="px-6 py-3 font-bold">Data</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse ($recentQuotes as $quote)
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-3">
                        <p class="text-white font-bold">{{ $quote->name }}</p>
                        <p class="text-slate-500 text-xs">{{ $quote->email }}</p>
                    </td>
                    <td class="px-6 py-3 text-slate-300">{{ $quote->service_type }}</td>
                    <td class="px-6 py-3 text-white font-bold">{{ $quote->hasAmount() ? '€' . number_format($quote->amount, 2) : '—' }}</td>
                    <td class="px-6 py-3">
                        @if ($quote->isPaid())
                            <span class="text-emerald-400 font-bold text-xs">Salda&shy;to</span>
                        @elseif ($quote->hasPaidDeposit())
                            <span class="text-amber-400 font-bold text-xs">Acconto ricevuto</span>
                        @else
                            <span class="text-slate-600 text-xs">Nessun pagamento</span>
                        @endif
                    </td>
                    <td class="px-6 py-3">
                        <span class="px-2 py-1 text-xs font-bold rounded-full
                            @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                            @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                            @else bg-emerald-900/30 text-emerald-400 @endif">
                            {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                        </span>
                    </td>
                    <td class="px-6 py-3 text-slate-500 text-xs">{{ $quote->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.quotes.show', $quote) }}" class="text-amber-500 hover:text-amber-400 font-bold text-xs">Dettaglio &rarr;</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-slate-500">Nessun preventivo.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
