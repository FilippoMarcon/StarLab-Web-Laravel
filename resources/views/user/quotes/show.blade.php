@extends('user.layouts.app')

@section('title', 'StarLab | Dettaglio Richiesta')

@section('content')
<div class="mb-8">
    <a href="{{ route('user.quotes.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna alle richieste</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">Dettaglio Richiesta</h1>
</div>

<div class="lg:grid lg:grid-cols-3 lg:gap-6">
    <div class="space-y-6 lg:col-span-2">
    @if (session('error'))
        <div class="p-4 bg-red-900/30 border border-red-800 rounded-xl text-red-300 text-sm">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 bg-red-900/30 border border-red-800 rounded-xl text-red-300 text-sm">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-white">{{ $quote->service_type }}</h2>
            <span class="px-3 py-1 text-xs font-bold rounded-full
                @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                @elseif($quote->status === 'in_progress') bg-violet-900/30 text-violet-400
                @else bg-emerald-900/30 text-emerald-400 @endif">
                {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : ($quote->status === 'in_progress' ? 'In lavorazione' : 'Completato')) }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Data Richiesta</p>
                <p class="text-slate-300">{{ $quote->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Ultimo Aggiornamento</p>
                <p class="text-slate-300">{{ $quote->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div>
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Descrizione</p>
            <p class="text-slate-300 whitespace-pre-wrap">{{ $quote->description }}</p>
        </div>

        @if ($quote->attachments->count() > 0)
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Allegati ({{ $quote->attachments->count() }})</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach ($quote->attachments as $attachment)
                        <div class="group relative bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden">
                            @if ($attachment->isImage())
                                <img src="{{ $attachment->url }}" alt="{{ $attachment->original_name }}" class="w-full h-28 object-cover">
                            @else
                                <div class="w-full h-28 flex items-center justify-center bg-slate-800">
                                    <svg class="w-10 h-10 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div class="p-2">
                                <p class="text-xs text-slate-400 truncate">{{ $attachment->original_name }}</p>
                                <p class="text-xs text-slate-500">{{ $attachment->size_for_humans }}</p>
                            </div>
                            <a href="{{ route('user.quotes.download', [$quote, $attachment]) }}" class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl">
                                <span class="px-3 py-1.5 bg-amber-500 text-white text-xs font-bold rounded-lg">Scarica</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($quote->token)
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Link Condivisibile</p>
                <p class="text-sm text-slate-400">Condividi questo link con chi vuoi per mostrare lo stato della richiesta:</p>
                <div class="flex items-center gap-2 mt-2">
                    <input type="text" readonly value="{{ route('preventivo.show', $quote->token) }}"
                        class="flex-1 px-3 py-2 text-xs bg-slate-800 border border-slate-700 rounded-lg text-slate-300 select-all"
                        onclick="this.select()">
                    <button onclick="navigator.clipboard.writeText(this.previousElementSibling.value);this.textContent='Copiato!';setTimeout(()=>this.textContent='Copia',2000)"
                        class="px-3 py-2 bg-amber-500 hover:bg-amber-400 text-white text-xs font-bold rounded-lg transition-all">Copia</button>
                </div>
            </div>
        @endif
    </div>

    @if ($quote->hasAmount())
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Prezzo e Pagamenti</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-slate-500">Totale</p>
                    <p class="text-3xl font-black text-amber-500">&euro;{{ number_format($quote->amount, 2) }}</p>
                </div>
                <div class="text-right space-y-2">
                    @if ($quote->isPaid())
                        <div class="flex items-center gap-2 justify-end">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <span class="text-emerald-400 font-bold">Completamente Pagato</span>
                        </div>
                        <p class="text-xs text-slate-500">{{ $quote->paid_at->format('d/m/Y H:i') }}</p>
                    @elseif ($quote->hasPaidDeposit() && $quote->isDelivered())
                        <div class="flex items-center gap-2 justify-end">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <span class="text-emerald-400 font-bold text-sm">Acconto 50% pagato</span>
                        </div>
                        <form method="POST" action="{{ route('user.quotes.checkout', ['quote' => $quote, 'type' => 'final']) }}">
                            @csrf
                            <button type="submit" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-amber-500/25">
                                Paga Saldo 50% (&euro;{{ number_format($quote->finalAmount(), 2) }})
                            </button>
                        </form>
                    @elseif ($quote->hasPaidDeposit())
                        <div class="flex items-center gap-2 justify-end">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <span class="text-emerald-400 font-bold text-sm">Acconto 50% pagato</span>
                        </div>
                        <p class="text-xs text-slate-500 text-right">In attesa della consegna grafica</p>
                    @else
                        <form method="POST" action="{{ route('user.quotes.checkout', ['quote' => $quote, 'type' => 'deposit']) }}">
                            @csrf
                            <button type="submit" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-amber-500/25">
                                Paga Acconto 50% (&euro;{{ number_format($quote->depositAmount(), 2) }})
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($quote->deliverables->count() > 0)
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-3">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider">
            Grafiche Consegnate
            @if (!$quote->isPaid())
            <span class="text-xs font-normal text-slate-500">(anteprima con watermark)</span>
            @endif
        </h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach ($quote->deliverables as $deliverable)
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden">
                    @if ($deliverable->isImage())
                        <img src="{{ $quote->isPaid() ? $deliverable->url_original : ($deliverable->url_watermarked ?? $deliverable->url_original) }}" alt="{{ $deliverable->original_name }}" class="w-full h-28 object-cover cursor-pointer" onclick="openPreview('{{ $quote->isPaid() ? $deliverable->url_original : ($deliverable->url_watermarked ?? $deliverable->url_original) }}', '{{ $deliverable->original_name }}')">
                    @else
                        <div class="w-full h-28 flex items-center justify-center bg-slate-800">
                            <svg class="w-10 h-10 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <div class="p-2 flex items-center justify-between">
                        <div class="min-w-0 flex-1 mr-2">
                            <p class="text-xs text-slate-400 truncate">{{ $deliverable->original_name }}</p>
                            <p class="text-xs text-slate-500">{{ $deliverable->size_for_humans }}</p>
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            @if ($deliverable->isImage())
                            <button onclick="openPreview('{{ $quote->isPaid() ? $deliverable->url_original : ($deliverable->url_watermarked ?? $deliverable->url_original) }}', '{{ $deliverable->original_name }}')" class="p-1.5 bg-sky-500/20 hover:bg-sky-500/40 text-sky-400 rounded-lg transition-all" title="Anteprima">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            @endif
                            <a href="{{ route('user.quotes.deliverable', [$quote, $deliverable]) }}" class="p-1.5 bg-amber-500/20 hover:bg-amber-500/40 text-amber-400 rounded-lg transition-all" title="{{ $quote->isPaid() ? 'Scarica Originale' : 'Scarica Anteprima' }}">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (!$quote->isPaid())
        <p class="text-xs text-slate-500 mt-2">Dopo il saldo finale, potrai scaricare le versioni originali senza watermark.</p>
        @endif
    </div>
    @endif

    @if ($quote->staff_notes)
        <div class="p-6 bg-amber-900/10 border border-amber-800/30 rounded-2xl">
            <div class="flex items-center gap-2 mb-3">
                <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                <h3 class="text-sm font-bold text-amber-400 uppercase tracking-wider">Nota dallo Staff</h3>
                @if ($quote->staff_notes_updated_at)
                    <span class="text-xs text-slate-500">{{ $quote->staff_notes_updated_at->diffForHumans() }}</span>
                @endif
            </div>
            <p class="text-slate-300 whitespace-pre-wrap text-sm">{{ $quote->staff_notes }}</p>
        </div>
    @endif

    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Cosa Succede Ora?</h3>
        <ul class="space-y-2 text-sm text-slate-400">
            <li class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full bg-amber-900/30 text-amber-400 flex items-center justify-center text-xs font-bold @if($quote->status !== 'pending') opacity-30 @endif">1</span>
                Richiesta ricevuta - ti risponderemo entro 24 ore
            </li>
            <li class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full @if($quote->hasPaidDeposit()) bg-emerald-900/30 text-emerald-400 @else bg-slate-800 text-slate-500 @endif flex items-center justify-center text-xs font-bold">2</span>
                Pagamento acconto 50% - iniziamo a lavorare alla tua grafica
            </li>
            <li class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full @if($quote->isDelivered()) bg-blue-900/30 text-blue-400 @else bg-slate-800 text-slate-500 @endif flex items-center justify-center text-xs font-bold">3</span>
                Consegna grafica con watermark + saldo finale 50%
            </li>
            <li class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-full @if($quote->isPaid()) bg-emerald-900/30 text-emerald-400 @else bg-slate-800 text-slate-500 @endif flex items-center justify-center text-xs font-bold">4</span>
                Lavoro completato! Scarica le versioni originali senza watermark
            </li>
        </ul>
    </div>

    </div>{{-- end left column --}}

    <div class="space-y-6 lg:col-span-1">
        <x-quote-chat :quote="$quote" :isStaff="false" />
    </div>{{-- end right column --}}
</div>{{-- end grid --}}

    {{-- Lightbox --}}
    <div id="preview-modal" class="fixed inset-0 z-50 bg-black/80 hidden items-center justify-center p-4" onclick="closePreview(event)">
        <div class="relative max-w-4xl w-full max-h-[90vh] flex items-center justify-center" onclick="event.stopPropagation()">
            <button onclick="closePreview()" class="absolute -top-10 right-0 text-white/60 hover:text-white text-sm font-bold transition-colors">CHIUDI [X]</button>
            <img id="preview-img" src="" alt="" class="max-w-full max-h-[85vh] rounded-xl shadow-2xl">
        </div>
    </div>

    <script>
    function openPreview(src, name) {
        document.getElementById('preview-img').src = src;
        document.getElementById('preview-img').alt = name;
        document.getElementById('preview-modal').classList.remove('hidden');
        document.getElementById('preview-modal').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closePreview(e) {
        if (e && e.target !== e.currentTarget) return;
        document.getElementById('preview-modal').classList.add('hidden');
        document.getElementById('preview-modal').classList.remove('flex');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closePreview();
    });
    </script>
</div>
@endsection
