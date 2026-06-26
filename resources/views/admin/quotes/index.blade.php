@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Preventivi')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-black text-white uppercase tracking-tight">Preventivi</h1>
    <p class="text-slate-400 text-sm mt-1">Richieste ricevute dal form contatti</p>
</div>

<div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="border-b border-slate-800">
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Data</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Nome</th>
                <th class="text-left p-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Servizio</th>
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
                        <span class="px-2 py-1 text-xs font-bold rounded-full
                            @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                            @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                            @else bg-emerald-900/30 text-emerald-400 @endif">
                            {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                        </span>
                    </td>
                    <td class="p-4">
                        <a href="{{ route('admin.quotes.show', $quote) }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">Dettagli</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-12 text-center text-slate-500">
                        <p class="text-lg font-bold">Nessun preventivo</p>
                        <p class="text-sm mt-1">I preventivi richiesti dal sito appariranno qui.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
