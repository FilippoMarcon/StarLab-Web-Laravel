@extends('user.layouts.app')

@section('title', 'StarLab | Dashboard')

@section('content')
<div class="mb-8 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Dashboard</h1>
        <p class="text-slate-400 text-sm mt-1">Benvenuto, {{ auth()->user()->name }}!</p>
    </div>
    <a href="{{ route('user.quotes.create') }}" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all text-sm shadow-lg shadow-amber-500/25">Nuova Richiesta</a>
</div>

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Richieste Totali</p>
        <p class="text-3xl font-black text-white">{{ $totalQuotes }}</p>
    </div>
    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">In Attesa</p>
        <p class="text-3xl font-black text-amber-400">{{ $pendingQuotes }}</p>
    </div>
    <div class="p-5 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Completate</p>
        <p class="text-3xl font-black text-emerald-400">{{ $completedQuotes }}</p>
    </div>
</div>

{{-- QUOTE CARDS --}}
@forelse ($quotes as $quote)
<div class="mb-4 p-6 bg-slate-900/50 border border-slate-800 rounded-2xl hover:border-slate-700 transition-all">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <h3 class="text-white font-bold text-lg">{{ $quote->service_type }}</h3>
            @if (in_array($quote->id, $newReplyIds))
            <span class="px-2 py-0.5 bg-sky-900/30 text-sky-400 text-xs font-bold rounded-full flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                Nuovo messaggio
            </span>
            @endif
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 text-xs font-bold rounded-full
                @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                @elseif($quote->status === 'in_progress') bg-violet-900/30 text-violet-400
                @else bg-emerald-900/30 text-emerald-400 @endif">
                {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : ($quote->status === 'in_progress' ? 'In lavorazione' : 'Completato')) }}
            </span>
            <span class="text-xs text-slate-500">{{ $quote->created_at->format('d/m/Y') }}</span>
        </div>
    </div>

    {{-- TIMELINE --}}
    <div class="mb-4">
        <div class="flex items-center gap-0">
            @php
                $steps = [
                    ['label' => 'Richiesta', 'done' => true],
                    ['label' => 'Contatto', 'done' => in_array($quote->status, ['contacted', 'done']) || $quote->hasPaidDeposit()],
                    ['label' => 'Lavorazione', 'done' => $quote->hasPaidDeposit()],
                    ['label' => 'Completato', 'done' => $quote->isPaid()],
                ];
            @endphp
            @foreach ($steps as $i => $step)
            <div class="flex items-center flex-1 {{ $i === count($steps) - 1 ? '' : '' }}">
                <div class="flex items-center gap-2 {{ $step['done'] ? 'text-emerald-400' : 'text-slate-600' }}">
                    <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold {{ $step['done'] ? 'bg-emerald-500/20 text-emerald-400' : 'bg-slate-800 text-slate-600' }}">
                        @if ($step['done'])
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        @else
                        {{ $i + 1 }}
                        @endif
                    </div>
                    <span class="text-xs font-bold {{ $step['done'] ? 'text-emerald-400' : 'text-slate-600' }}">{{ $step['label'] }}</span>
                </div>
                @if ($i < count($steps) - 1)
                <div class="flex-1 h-px mx-2 {{ $step['done'] && $steps[$i + 1]['done'] ? 'bg-emerald-500/50' : 'bg-slate-800' }}"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <div class="flex items-center justify-between pt-3 border-t border-slate-800">
        <div class="flex items-center gap-3 text-sm">
            @if ($quote->hasAmount())
            <span class="text-slate-400">
                @if ($quote->isPaid())
                    Salda&shy;to: &euro;{{ number_format($quote->amount, 2) }}
                @elseif ($quote->hasPaidDeposit())
                    Acconto pagato, saldo: &euro;{{ number_format($quote->finalAmount(), 2) }}
                @else
                    Prezzo: &euro;{{ number_format($quote->amount, 2) }}
                @endif
            </span>
            @endif
            <span class="text-slate-600">&middot;</span>
            <span class="text-slate-500">{{ $quote->deliverables->count() }} grafica/che</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('user.quotes.show', $quote) }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-sm font-bold rounded-lg transition-all">
                Dettagli
            </a>
            @if ($quote->isPaid() && $quote->deliverables->count() > 0)
            <a href="{{ route('user.quotes.show', $quote) }}#grafiche" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold rounded-lg transition-all">
                Scarica Originali
            </a>
            @endif
        </div>
    </div>
</div>
@empty
<div class="p-12 bg-slate-900/50 border border-slate-800 rounded-2xl text-center">
    <p class="text-lg font-bold text-slate-400">Nessuna richiesta</p>
    <p class="text-sm text-slate-500 mt-1">Crea la tua prima richiesta per iniziare.</p>
    <a href="{{ route('user.quotes.create') }}" class="inline-block mt-4 px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all text-sm">Nuova Richiesta</a>
</div>
@endforelse
@endsection
