@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Preventivi')

@section('content')
<div class="mb-8 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Preventivi</h1>
        <p class="text-slate-400 text-sm mt-1">
            @if ($currentFilter === 'pending')
                In attesa di contatto
            @elseif ($currentFilter === 'contacted')
                Contattati, in attesa acconto
            @elseif ($currentFilter === 'deposit')
                Acconto ricevuto, in lavorazione
            @elseif ($currentFilter === 'paid')
                Saldati e completati
            @else
                Tutte le richieste
            @endif
        </p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-xl text-sm transition-all">
        &larr; Dashboard
    </a>
</div>

<div class="flex flex-wrap gap-2 mb-6">
    <a href="{{ route('admin.quotes.index') }}"
       class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all {{ !$currentFilter ? 'bg-amber-500 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
        Tutti
    </a>
    <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}"
       class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all {{ $currentFilter === 'pending' ? 'bg-amber-500 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
        In Attesa
    </a>
    <a href="{{ route('admin.quotes.index', ['status' => 'contacted']) }}"
       class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all {{ $currentFilter === 'contacted' ? 'bg-amber-500 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
        Contattati
    </a>
    <a href="{{ route('admin.quotes.index', ['payment' => 'deposit']) }}"
       class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all {{ $currentFilter === 'deposit' ? 'bg-amber-500 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
        Acconti Ricevuti
    </a>
    <a href="{{ route('admin.quotes.index', ['payment' => 'paid']) }}"
       class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all {{ $currentFilter === 'paid' ? 'bg-amber-500 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
        Saldati
    </a>
</div>

<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-slate-800">
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Data</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nome</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Servizio</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Pagamento</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Stato</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quotes as $quote)
                <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                    <td class="p-4 text-sm text-slate-300">{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                    <td class="p-4 text-sm text-white font-bold">{{ $quote->name }}</td>
                    <td class="p-4 text-sm text-slate-300">{{ $quote->service_type }}</td>
                    <td class="p-4">
                        @if ($quote->isPaid())
                            <span class="text-emerald-400 font-bold text-xs">Salda&shy;to</span>
                        @elseif ($quote->hasPaidDeposit())
                            <span class="text-amber-400 font-bold text-xs">Acconto</span>
                        @else
                            <span class="text-slate-600 text-xs">—</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs font-bold rounded-full
                            @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                            @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                            @else bg-emerald-900/30 text-emerald-400 @endif">
                            {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.quotes.show', $quote) }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Dettagli</a>
                            <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" onsubmit="return confirm('Eliminare questo preventivo? L\'operazione è irreversibile.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" title="Elimina">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-12 text-center text-slate-500">
                        <p class="text-lg font-bold">Nessun preventivo</p>
                        <p class="text-sm mt-1">Nessuna richiesta corrisponde al filtro selezionato.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
