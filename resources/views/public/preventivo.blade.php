@extends('layouts.app')

@section('title', 'StarLab | Preventivo')
@section('og-title', 'StarLab | Preventivo')

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden bg-slate-50 dark:bg-zinc-950 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-black text-slate-900 dark:text-white uppercase tracking-tight">Preventivo</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Dettagli della tua richiesta a StarLab</p>
            </div>

            <div class="p-8 bg-white/80 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-3xl space-y-5">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">{{ $quote->service_type }}</h2>
                    <span class="px-3 py-1 text-xs font-bold rounded-full
                        @if($quote->status === 'pending') bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400
                        @elseif($quote->status === 'contacted') bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400
                        @else bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 @endif">
                        {{ $quote->status === 'pending' ? 'In attesa' : ($quote->status === 'contacted' ? 'Contattato' : 'Completato') }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Cliente</p>
                        <p class="text-slate-700 dark:text-slate-300 font-bold">{{ $quote->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Email</p>
                        <p class="text-amber-600 dark:text-amber-500 font-bold">{{ $quote->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Richiesto il</p>
                        <p class="text-slate-700 dark:text-slate-300">{{ $quote->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Ultimo aggiornamento</p>
                        <p class="text-slate-700 dark:text-slate-300">{{ $quote->updated_at->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Descrizione del Progetto</p>
                    <p class="text-slate-600 dark:text-slate-300 whitespace-pre-wrap">{{ $quote->description }}</p>
                </div>

                @if ($quote->attachments->count() > 0)
                <div>
                    <p class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-3">Allegati ({{ $quote->attachments->count() }})</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach ($quote->attachments as $attachment)
                            <div class="group relative bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                                @if ($attachment->isImage())
                                    <img src="{{ $attachment->url }}" alt="{{ $attachment->original_name }}" class="w-full h-28 object-cover">
                                @else
                                    <div class="w-full h-28 flex items-center justify-center bg-slate-100 dark:bg-slate-800">
                                        <svg class="w-10 h-10 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                @endif
                                <div class="p-2">
                                    <p class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ $attachment->original_name }}</p>
                                    <p class="text-xs text-slate-400 dark:text-slate-500">{{ $attachment->size_for_humans }}</p>
                                </div>
                                <a href="{{ route('preventivo.download', [$quote->token, $attachment]) }}" class="absolute inset-0 flex items-center justify-center bg-black/30 dark:bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl">
                                    <span class="px-3 py-1.5 bg-amber-500 text-white text-xs font-bold rounded-lg">Scarica</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($quote->hasAmount())
                <div class="flex items-center justify-between p-5 bg-white/50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-2xl">
                    <div>
                        <p class="text-xs text-slate-400 dark:text-slate-500">Prezzo</p>
                        <p class="text-2xl font-black text-amber-500">&euro;{{ number_format($quote->amount, 2) }}</p>
                    </div>
                    <div>
                        @if ($quote->isPaid())
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                <span class="text-emerald-600 dark:text-emerald-400 font-bold">Pagato</span>
                            </div>
                        @else
                            <span class="text-slate-400 dark:text-slate-500">In attesa di pagamento</span>
                        @endif
                    </div>
                </div>
                @endif

                @if ($quote->deliverables->count() > 0)
                <div>
                    <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">
                        Grafiche Consegnate
                        @if (!$quote->isPaid())
                        <span class="text-xs font-normal text-slate-400 dark:text-slate-500">(anteprima)</span>
                        @endif
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach ($quote->deliverables as $deliverable)
                            <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                                @if ($deliverable->isImage())
                                    <img src="{{ $deliverable->url_watermarked ?? $deliverable->url_original }}" alt="{{ $deliverable->original_name }}" class="w-full h-28 object-cover cursor-pointer" onclick="openPreview('{{ ($deliverable->url_watermarked ?? $deliverable->url_original) }}', '{{ $deliverable->original_name }}')">
                                @else
                                    <div class="w-full h-28 flex items-center justify-center bg-slate-100 dark:bg-slate-800">
                                        <svg class="w-10 h-10 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                                <div class="p-2 flex items-center justify-between">
                                    <div class="min-w-0 flex-1 mr-2">
                                        <p class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ $deliverable->original_name }}</p>
                                        <p class="text-xs text-slate-400 dark:text-slate-500">{{ $deliverable->size_for_humans }}</p>
                                    </div>
                                    <div class="flex items-center gap-1 shrink-0">
                                        @if ($deliverable->isImage())
                                        <button onclick="openPreview('{{ $deliverable->url_watermarked ?? $deliverable->url_original }}', '{{ $deliverable->original_name }}')" class="p-1.5 bg-sky-500/20 hover:bg-sky-500/40 text-sky-600 dark:text-sky-400 rounded-lg transition-all" title="Anteprima">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </button>
                                        @endif
                                        <a href="{{ route('preventivo.deliverable', [$quote->token, $deliverable]) }}" class="p-1.5 bg-amber-500/20 hover:bg-amber-500/40 text-amber-600 dark:text-amber-400 rounded-lg transition-all" title="Scarica">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (!$quote->isPaid())
                    <p class="text-xs text-slate-400 dark:text-slate-500 mt-2">Dopo il pagamento, potrai scaricare le versioni originali senza watermark.</p>
                    @endif
                </div>
                @endif

                @if ($quote->staff_notes)
                    <div class="p-5 bg-amber-50 dark:bg-amber-900/10 border border-amber-200 dark:border-amber-800/30 rounded-2xl">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            <h3 class="text-sm font-bold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Nota dallo Staff</h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 whitespace-pre-wrap text-sm">{{ $quote->staff_notes }}</p>
                    </div>
                @endif

                <div class="pt-4 border-t border-slate-200 dark:border-slate-800 text-center">
                    <p class="text-xs text-slate-400 dark:text-slate-500">StarLab — graphic design &amp; sviluppo web</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
@endsection
