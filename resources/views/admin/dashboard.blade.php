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

@if ($toBeDelivered->count() > 0)
<div class="mb-6 p-4 bg-amber-900/20 border border-amber-700/40 rounded-2xl flex items-center justify-between">
    <div class="flex items-center gap-3">
        <div class="w-3 h-3 rounded-full bg-amber-400 animate-pulse"></div>
        <div>
            <p class="text-amber-400 font-bold text-sm">{{ $toBeDelivered->count() }} preventivo/i da consegnare</p>
            <p class="text-amber-500/70 text-xs">Acconto ricevuto, grafica non ancora caricata</p>
        </div>
    </div>
    <div class="flex gap-2">
        @foreach ($toBeDelivered as $td)
        <a href="{{ route('admin.quotes.show', $td) }}" class="px-3 py-1.5 bg-amber-600/50 hover:bg-amber-500 text-white text-xs font-bold rounded-lg transition-all">
            {{ $td->name }}
        </a>
        @endforeach
    </div>
</div>
@endif

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <a href="{{ route('admin.quotes.index') }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Preventivi</p>
        <p class="text-3xl font-black text-white">{{ $totalQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">Totali</p>
    </a>

    <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">In Attesa</p>
        <p class="text-3xl font-black text-amber-400">{{ $pendingQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">Da contattare</p>
    </a>

    <a href="{{ route('admin.quotes.index', ['status' => 'contacted']) }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Contattati</p>
        <p class="text-3xl font-black text-blue-400">{{ $contactedQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">In attesa acconto</p>
    </a>

    <a href="{{ route('admin.quotes.index', ['payment' => 'deposit']) }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-amber-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-amber-400 transition-colors">Acconti Ricevuti</p>
        <p class="text-3xl font-black text-amber-400">{{ $depositOnlyQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">In lavorazione</p>
    </a>

    <a href="{{ route('admin.quotes.index', ['payment' => 'paid']) }}" class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-emerald-500/30 transition-all group">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 group-hover:text-emerald-400 transition-colors">Saldati</p>
        <p class="text-3xl font-black text-emerald-400">{{ $paidQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">Completati</p>
    </a>

    <div class="p-5 bg-slate-900/50 border border-amber-800/30 rounded-2xl">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Messaggi</p>
        <p class="text-3xl font-black {{ $pendingReplyCount > 0 ? 'text-amber-400' : 'text-white' }}">{{ $pendingReplyCount }}</p>
        <p class="text-xs {{ $pendingReplyCount > 0 ? 'text-amber-500' : 'text-slate-600' }} mt-1">Da rispondere</p>
    </div>

    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Ricavi Totali</p>
        <p class="text-3xl font-black text-white">&euro;{{ number_format($revenue, 2) }}</p>
        <p class="text-xs text-emerald-500 mt-1">Questo mese: &euro;{{ number_format($monthlyRevenue, 2) }}</p>
    </div>

    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Completati</p>
        <p class="text-3xl font-black text-emerald-400">{{ $paidQuotes }}</p>
        <p class="text-xs text-slate-600 mt-1">&check; Saldati</p>
    </div>
</div>

{{-- ALERT: Messaggi in attesa --}}
@if ($pendingReplyCount > 0)
<div class="mb-6 p-4 bg-sky-900/20 border border-sky-700/40 rounded-2xl">
    <div class="flex items-center gap-2 mb-3">
        <svg class="w-5 h-5 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <p class="text-sky-400 font-bold text-sm">{{ $pendingReplyCount }} messaggio/i da te in attesa di risposta</p>
    </div>
    <div class="flex flex-wrap gap-2">
        @foreach ($pendingReplyQuotes as $prq)
        <a href="{{ route('admin.quotes.show', $prq) }}" class="px-3 py-1.5 bg-sky-600/30 hover:bg-sky-600/50 text-sky-300 text-xs font-bold rounded-lg transition-all">
            {{ $prq->name }}
        </a>
        @endforeach
    </div>
</div>
@endif

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
                        <div class="flex items-center gap-2">
                            <p class="text-white font-bold">{{ $quote->name }}</p>
                            @if (in_array($quote->id, $pendingReplyIds))
                            <span class="w-2 h-2 rounded-full bg-sky-400" title="Messaggio in attesa"></span>
                            @endif
                        </div>
                        <p class="text-slate-500 text-xs">{{ $quote->email }}</p>
                    </td>
                    <td class="px-6 py-3 text-slate-300">{{ $quote->service_type }}</td>
                    <td class="px-6 py-3 text-white font-bold">{{ $quote->hasAmount() ? '€' . number_format($quote->amount, 2) : '—' }}</td>
                    <td class="px-6 py-3">
                        @if ($quote->isPaid())
                            <span class="text-emerald-400 font-bold text-xs">Salda&shy;to</span>
                        @elseif ($quote->hasPaidDeposit())
                            <span class="text-amber-400 font-bold text-xs">Acconto</span>
                        @else
                            <span class="text-slate-600 text-xs">—</span>
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
