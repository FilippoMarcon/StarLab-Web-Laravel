@extends('layouts.app')

@section('title', 'StarLab | Blog & Aggiornamenti')
@section('og-title', 'StarLab | Blog & Aggiornamenti')
@section('og-description', 'Scopri le ultime news e aggiornamenti dal mondo StarLab.')

@section('content')
@php
$news = [
    [
        'title' => 'StarLab è finalmente Online!',
        'excerpt' => 'Siamo orgogliosi di presentare il nuovo hub digitale di StarLab, un punto di riferimento per lo sviluppo web e il graphic design. Dopo mesi di duro lavoro, il nostro team ha creato una piattaforma moderna e performante per offrirti il meglio dei nostri servizi StarWeb e StarGraphics.',
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop',
        'category' => 'Annuncio',
        'date' => '14 Mar 2026',
        'content' => 'Siamo entusiasti di annunciare il lancio ufficiale del nuovo sito web di StarLab! Questo progetto rappresenta un importante traguardo per il nostro team, un hub digitale completamente rinnovato per offrirti un\'esperienza di navigazione fluida e moderna.<br><br>Il nuovo portale integra tutte le nostre competenze: dallo sviluppo web con StarWeb al graphic design con StarGraphics, passando per consulenze personalizzate e molto altro. Ogni sezione è stata progettata pensando alle tue esigenze, con un\'interfaccia intuitiva e contenuti sempre aggiornati.<br><br>Ringraziamo tutti coloro che hanno reso possibile questo progetto e ti invitiamo a esplorare le nostre pagine per scoprire come possiamo trasformare le tue idee in realtà digitali.'
    ],
    [
        'title' => 'Siamo ufficialmente Riaperti',
        'excerpt' => 'Dopo una breve pausa per ristrutturazione e upgrade tecnologico, StarLab è tornato più forte che mai. Il nostro team è stato potenziato con nuove risorse e competenze per garantirti un servizio ancora più professionale e tempestivo.',
        'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop',
        'category' => 'StarLab',
        'date' => '13 Mar 2026',
        'content' => 'StarLab riapre le porte con una veste completamente rinnovata! La pausa ci ha permesso di ristrutturare i nostri processi interni, aggiornare le tecnologie e ampliare il nostro team creativo.<br><br>Cosa cambia? Tempi di consegna più rapidi, nuovi servizi di modellazione 3D, un portfolio ampliato e un supporto clienti ancora più dedicato. Il nostro obiettivo è offrirti un\'esperienza completa a 360 gradi, dalla consulenza iniziale fino al lancio del tuo progetto.<br><br>Contattaci per scoprire tutte le novità e prenotare una consulenza gratuita. Ti aspettiamo!'
    ]
];
$featured = $news[0];
@endphp
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-amber-500 dark:text-amber-400 font-semibold text-sm uppercase tracking-widest">Blog & Aggiornamenti</span>
            <h1 class="text-5xl sm:text-6xl font-bold text-slate-900 dark:text-white mt-4">Ultime <span class="text-amber-500 dark:text-amber-400">News</span></h1>
            <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-2xl mx-auto text-lg">Rimani aggiornato sulle ultime novità dal mondo StarLab.</p>
        </div>

        <div class="glass-card rounded-2xl overflow-hidden mb-12 max-w-5xl mx-auto group" id="featured-post">
            <div class="grid md:grid-cols-2">
                <div class="relative h-64 md:h-auto overflow-hidden">
                    <img src="{{ $featured['image'] }}" alt="{{ $featured['title'] }}" loading="eager" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-black/40 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-400 text-slate-900">{{ $featured['category'] }}</span>
                    </div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $featured['date'] }}</span>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">{{ $featured['title'] }}</h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6">{{ $featured['excerpt'] }}</p>
                    <button onclick="openModal(0)" class="self-start inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30 cursor-pointer">
                        Leggi l'articolo
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @foreach ($news as $index => $item)
            @if ($index === 0) @continue @endif
            <div class="glass-card rounded-2xl overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-400 text-slate-900">{{ $item['category'] }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $item['date'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-amber-500 dark:group-hover:text-amber-400 transition-colors">{{ $item['title'] }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4 text-sm">{{ $item['excerpt'] }}</p>
                    <button onclick="openModal({{ $index }})" class="inline-flex items-center gap-1 text-amber-500 dark:text-amber-400 font-semibold group/link cursor-pointer">
                        Leggi di più
                        <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div id="news-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="relative bg-white dark:bg-zinc-900 rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
        <button onclick="closeModal()" class="absolute top-4 right-4 z-10 p-2 rounded-xl bg-white/80 dark:bg-zinc-800/80 backdrop-blur-sm text-slate-700 dark:text-slate-300 hover:bg-white dark:hover:bg-zinc-700 transition-colors cursor-pointer">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div id="modal-image" class="h-56 overflow-hidden rounded-t-2xl">
            <img id="modal-img" src="" alt="" class="w-full h-full object-cover" />
        </div>
        <div class="p-8">
            <div class="flex items-center gap-3 mb-4">
                <span id="modal-category" class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-400 text-slate-900"></span>
                <span id="modal-date" class="text-sm text-slate-500 dark:text-slate-400"></span>
            </div>
            <h2 id="modal-title" class="text-2xl font-bold text-slate-900 dark:text-white mb-4"></h2>
            <div id="modal-content" class="text-slate-600 dark:text-slate-400 leading-relaxed space-y-4"></div>
        </div>
    </div>
</div>

<script>
var newsData = @json($news);

function openModal(index) {
    var item = newsData[index];
    document.getElementById('modal-img').src = item.image;
    document.getElementById('modal-img').alt = item.title;
    document.getElementById('modal-category').textContent = item.category;
    document.getElementById('modal-date').textContent = item.date;
    document.getElementById('modal-title').textContent = item.title;
    var contentDiv = document.getElementById('modal-content');
    contentDiv.innerHTML = item.content || item.excerpt;
    var modal = document.getElementById('news-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    var modal = document.getElementById('news-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
});
</script>
@endsection
