@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Dettaglio Preventivo')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.quotes.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna ai preventivi</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">Dettaglio Preventivo</h1>
</div>

<div class="lg:grid lg:grid-cols-3 lg:gap-6">
    <div class="space-y-6 lg:col-span-2">
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nome</p>
                <p class="text-white font-bold">{{ $quote->name }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Email</p>
                <a href="mailto:{{ $quote->email }}" class="text-amber-500 hover:text-amber-400 font-bold">{{ $quote->email }}</a>
            </div>
            @if ($quote->phone)
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Telefono</p>
                <p class="text-white">{{ $quote->phone }}</p>
            </div>
            @endif
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Servizio</p>
                <p class="text-white">{{ $quote->service_type }}
                    @if ($quote->service_price)
                        <span class="ml-2 text-xs text-amber-400 font-bold">(listino standard: €{{ number_format($quote->service_price, 2) }})</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Data</p>
                <p class="text-slate-300">{{ $quote->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Stato Attuale</p>
                <span class="px-2 py-1 text-xs font-bold rounded-full
                    @if($quote->status === 'pending') bg-amber-900/30 text-amber-400
                    @elseif($quote->status === 'contacted') bg-blue-900/30 text-blue-400
                    @else bg-emerald-900/30 text-emerald-400 @endif">
                    {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                </span>
            </div>
            @if ($quote->user)
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Utente Collegato</p>
                <p class="text-white">{{ $quote->user->name }} ({{ $quote->user->email }})</p>
            </div>
            @endif
        </div>
        <div>
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Descrizione</p>
            <p class="text-slate-300 whitespace-pre-wrap">{{ $quote->description }}</p>
        </div>
    </div>

    @if ($quote->attachments->count() > 0)
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-3">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider">Allegati ({{ $quote->attachments->count() }})</h3>
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
                    <a href="{{ route('admin.quotes.download', [$quote, $attachment]) }}" class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl">
                        <span class="px-3 py-1.5 bg-amber-500 text-white text-xs font-bold rounded-lg">Scarica</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Prezzo e Pagamenti</h3>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-500">Prezzo Totale</p>
                <p class="text-2xl font-black {{ $quote->hasAmount() ? 'text-white' : 'text-slate-600' }}">
                    {{ $quote->hasAmount() ? '€' . number_format($quote->amount, 2) : 'Non impostato' }}
                </p>
            </div>
            <div class="text-right space-y-1">
                <p class="text-xs text-slate-500">Acconto 50%</p>
                @if ($quote->hasPaidDeposit())
                    <p class="text-emerald-400 font-bold text-sm">&check; Pagato il {{ $quote->deposit_paid_at->format('d/m/Y') }}</p>
                @else
                    <p class="text-slate-500 text-sm">In attesa</p>
                @endif
                <p class="text-xs text-slate-500">Saldo 50%</p>
                @if ($quote->isPaid())
                    <p class="text-emerald-400 font-bold text-sm">&check; Pagato il {{ $quote->paid_at->format('d/m/Y') }}</p>
                @else
                    <p class="text-slate-500 text-sm">In attesa</p>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider">Grafiche Consegnate</h3>
        @if ($quote->deliverables->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach ($quote->deliverables as $deliverable)
                <div class="group relative bg-slate-800/50 border border-slate-700 rounded-xl overflow-hidden">
                    @if ($deliverable->isImage())
                        <img src="{{ $deliverable->url_watermarked ?? $deliverable->url_original }}" alt="{{ $deliverable->original_name }}" class="w-full h-28 object-cover">
                    @else
                        <div class="w-full h-28 flex items-center justify-center bg-slate-800">
                            <svg class="w-10 h-10 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <div class="p-2 flex items-center justify-between">
                        <div class="min-w-0 flex-1 mr-2">
                            <p class="text-xs text-slate-400 truncate">{{ $deliverable->original_name }}</p>
                            <p class="text-xs text-slate-500">{{ $deliverable->size_for_humans }}</p>
                            @if ($deliverable->path_watermarked)
                                <span class="text-xs text-amber-400 font-bold">&#9679; Watermark</span>
                            @else
                                <span class="text-xs text-red-400 font-bold">&#9679; NO watermark</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            @if ($deliverable->isImage())
                            <button onclick="openPreview('{{ $deliverable->url_watermarked ?? $deliverable->url_original }}', '{{ $deliverable->original_name }}')" class="p-1.5 bg-sky-500/20 hover:bg-sky-500/40 text-sky-400 rounded-lg transition-all" title="Anteprima">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            @endif
                            <a href="{{ route('admin.quotes.deliverable', [$quote, $deliverable]) }}" class="p-1.5 bg-amber-500/20 hover:bg-amber-500/40 text-amber-400 rounded-lg transition-all" title="Scarica">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.quotes.deliverables.destroy', [$quote, $deliverable]) }}" onsubmit="return confirm('Eliminare {{ $deliverable->original_name }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1.5 bg-red-500/20 hover:bg-red-500/40 text-red-400 rounded-lg transition-all" title="Elimina">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <p class="text-sm text-slate-500">Nessuna grafica consegnata.</p>
        @endif
        @if ($quote->isDelivered())
        <p class="text-xs text-emerald-400 font-bold">Consegnato il {{ $quote->delivered_at->format('d/m/Y H:i') }}</p>
        @endif
        <form method="POST" action="{{ route('admin.quotes.deliverables.upload', $quote) }}" enctype="multipart/form-data" class="pt-3 border-t border-slate-800">
            @csrf
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Carica Nuove Grafiche</label>
            @error('files')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror
            @error('files.*')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-3">
                <input type="file" name="files[]" multiple required
                    class="flex-1 px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 focus:ring-2 focus:ring-amber-500 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:text-sm hover:file:bg-amber-400 file:cursor-pointer file:transition-all">
                <button type="submit" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all whitespace-nowrap">Carica</button>
            </div>
            <p class="text-xs text-slate-500 mt-1">Le immagini verranno automaticamente marcate con il logo StarLab. Le originali sono scaricabili solo dopo il saldo finale (50%).</p>
        </form>
    </div>

    @if ($quote->token)
    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Link Condivisibile</h3>
        <p class="text-xs text-slate-500 mb-2">Il cliente pu&ograve; vedere lo stato della richiesta a questo link:</p>
        <div class="flex items-center gap-2">
            <input type="text" readonly value="{{ route('preventivo.show', $quote->token) }}"
                class="flex-1 px-3 py-2 text-xs bg-slate-800 border border-slate-700 rounded-lg text-slate-300 select-all"
                onclick="this.select()">
            <button onclick="navigator.clipboard.writeText(this.previousElementSibling.value);this.textContent='Copiato!';setTimeout(()=>this.textContent='Copia',2000)"
                class="px-3 py-2 bg-amber-500 hover:bg-amber-400 text-white text-xs font-bold rounded-lg transition-all whitespace-nowrap">Copia</button>
        </div>
    </div>
    @endif

    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Prezzo &amp; Stato</h3>
        <form method="POST" action="{{ route('admin.quotes.status', $quote) }}" class="space-y-4">
            @csrf
            <div class="flex items-end gap-3">
                <div class="flex-1">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Prezzo (&euro;)
                        @if ($quote->service_price)
                            <span class="text-amber-400 font-bold">(listino standard: €{{ number_format($quote->service_price, 2) }})</span>
                        @endif
                    </label>
                    <input type="number" name="amount" step="0.01" min="0" value="{{ old('amount', $quote->amount) }}"
                        class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all" placeholder="0.00">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Stato</label>
                    <select name="status" class="px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
                        <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>In attesa</option>
                        <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contattato</option>
                        <option value="done" {{ $quote->status === 'done' ? 'selected' : '' }}>Completato</option>
                    </select>
                </div>
                <button type="submit" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all h-fit whitespace-nowrap">Aggiorna</button>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nota per il Cliente</label>
                <div class="flex flex-wrap gap-1.5 mb-2">
                    <button type="button" onclick="insertNote('Grazie per averci contattato! Ti ricontatteremo al pi\u00f9 presto.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">Grazie, ti ricontattiamo</button>
                    <button type="button" onclick="insertNote('Servono maggiori informazioni per completare il preventivo. Puoi contattarci per maggiori dettagli.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">Info mancanti</button>
                    <button type="button" onclick="insertNote('Il preventivo \u00e8 in fase di elaborazione. Ti aggiorneremo a breve.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">In elaborazione</button>
                    <button type="button" onclick="insertNote('L\u2019acconto del 50% \u00e8 stato ricevuto! Iniziamo a lavorare alla tua grafica.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">Acconto ricevuto</button>
                    <button type="button" onclick="insertNote('Il lavoro \u00e8 stato completato! Puoi visualizzare e scaricare le grafiche nella sezione dedicata.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">Completato</button>
                    <button type="button" onclick="insertNote('Il saldo finale \u00e8 stato ricevuto con successo! Puoi scaricare le versioni originali senza watermark.')" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-all">Saldo ricevuto</button>
                </div>
                <textarea name="staff_notes" rows="3" id="staff-notes-textarea" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all" placeholder="Scrivi un aggiornamento per il cliente...">{{ $quote->staff_notes }}</textarea>
            </div>
        </form>
    </div>

    <script>
    function insertNote(text) {
        var ta = document.getElementById('staff-notes-textarea');
        ta.value = text;
        ta.focus();
    }
    </script>

    <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Azioni Rapide</h3>
        <div class="flex flex-wrap gap-2">
            <a href="mailto:{{ $quote->email }}?subject=StarLab%20-%20Richiesta%20Preventivo&body=Ciao%20{{ urlencode($quote->name) }}%2C%0A%0A" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-sm font-bold transition-all">
                Rispondi via Email
            </a>
            @if ($quote->token)
            <a href="{{ route('preventivo.show', $quote->token) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-sm font-bold transition-all">
                Vedi come lo vede il cliente
            </a>
            @endif
        </div>
        <div class="mt-4 p-4 bg-amber-900/20 border border-amber-800/40 rounded-xl">
            <p class="text-xs font-bold text-amber-400 uppercase tracking-wider mb-3">Test Pagamenti (nessun addebito reale)</p>
            <div class="flex flex-wrap gap-2">
                @if (!$quote->hasPaidDeposit())
                <form method="POST" action="{{ route('admin.quotes.simulate-deposit', $quote) }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white font-bold rounded-lg text-sm transition-all whitespace-nowrap">
                        Simula Pagamento Acconto 50%
                    </button>
                </form>
                @endif
                @if ($quote->hasPaidDeposit() && !$quote->isPaid())
                <form method="POST" action="{{ route('admin.quotes.simulate-final', $quote) }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-lg text-sm transition-all whitespace-nowrap">
                        Simula Pagamento Saldo 50%
                    </button>
                </form>
                @endif
                @if ($quote->isPaid())
                <form method="POST" action="{{ route('admin.quotes.reset-payment-simulation', $quote) }}" onsubmit="return confirm('Rimuovere la simulazione del saldo?')">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600/50 hover:bg-red-500 text-white font-bold rounded-lg text-sm transition-all whitespace-nowrap">
                        Annulla Simulazione Saldo
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>

    </div>{{-- end left column --}}

    <div class="space-y-6 lg:col-span-1">
        <x-quote-chat :quote="$quote" :isStaff="true" />
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
