@extends('layouts.app')

@section('title', 'StarLab | Portfolio - I Nostri Progetti')
@section('og-title', 'StarLab | Portfolio - I Nostri Progetti')
@section('og-description', 'Scopri i progetti realizzati da StarLab: siti web, design grafico, branding e molto altro.')

@php
$projects = [
  (object)[
    'id' => 1,
    'title' => 'StarLab Official Website – Digital Hub',
    'category' => 'web',
    'image' => 'images/StarLab-Logo.png',
    'link' => '/',
    'description' => 'Il nostro hub digitale, progettato e sviluppato interamente dal team StarWeb.',
    'tech' => ['React 18', 'TypeScript', 'Tailwind CSS', 'Framer Motion'],
    'fullDesc' => 'Questo sito è la nostra vetrina principale. Sviluppato interamente in-house, riflette la nostra filosofia di design: performance estreme, animazioni fluide e un\'interfaccia moderna perfettamente ottimizzata per ogni dispositivo. Rappresenta il mix perfetto tra codice pulito e impatto visivo premium.'
  ],
  (object)[
    'id' => 2,
    'title' => 'YouTube Gaming Thumbnail – Custom Render',
    'category' => 'graphics',
    'image' => 'images/portfolio/ereh2908-Roblox-Doors-Floor-2.png',
    'description' => 'Design studiato per massimizzare il CTR utilizzando illuminazione dinamica e render 3D personalizzati.',
    'tech' => ['3D Rendering', 'Lighting Design', 'CTR Strategy'],
    'fullDesc' => 'Creazione di una miniatura ad alto impatto per il gioco "Doors" su Roblox. Il design combina illuminazione volumetrica, profondità di campo e composizione dinamica per catturare l\'attenzione nello scrolling di YouTube. Ottimizzato per massimizzare il CTR attraverso gerarchia visiva e contrasti cromatici studiati.'
  ],
  (object)[
    'id' => 3,
    'title' => 'Promo Banner – Minecraft Edition',
    'category' => 'graphics',
    'image' => 'images/portfolio/Nantexz-Commissions-Open-Contact-Us-On-Discord.png',
    'description' => 'Grafica promozionale con focus su Call to Action e integrazione di render 3D.',
    'tech' => ['Character Interaction', 'CTA Focus', 'Minecraft Branding'],
    'fullDesc' => 'Grafica promozionale per l\'apertura delle commissioni di Nantexz. Il banner mostra un\'interazione tra personaggi Minecraft in un setup scenico studiato, con una Call to Action chiara e immediata. Il design bilancia elementi informativi con impatto visivo per massimizzare le conversioni.'
  ],
  (object)[
    'id' => 4,
    'title' => 'Corporate Banner – Nantexz Studios',
    'category' => 'graphics',
    'image' => 'images/portfolio/Nantexz-Studios-Banner.png',
    'description' => 'Branding coordinato che unisce estetica epica gaming con layout corporate moderni.',
    'tech' => ['Brand Identity', 'Gaming Corporate', 'Layout Design'],
    'fullDesc' => 'Sviluppo del banner ufficiale per lo studio Nantexz, combinando elementi epici del gaming con una struttura da corporate branding professionale. Il risultato è un\'identità visiva che comunica potenza e professionalità, adatta sia a contesti gaming che aziendali.'
  ],
  (object)[
    'id' => 5,
    'title' => 'Social Announcement – Telegram Launch',
    'category' => 'graphics',
    'image' => 'images/portfolio/Scheggia-Cloud-Scheggia-Services-New-Telegram.png',
    'description' => 'Grafica istituzionale Clean & Tech con icone 3D e gerarchia visiva chiara.',
    'tech' => ['Clean & Tech Style', '3D Icons', 'Information Design'],
    'fullDesc' => 'Grafica istituzionale per la comunicazione di nuovi canali Telegram di Scheggia Services. Design pulito e tecnologico con icone 3D personalizzate, gerarchia informativa chiara e palette cromatica che riflette il brand identity del servizio cloud.'
  ],
  (object)[
    'id' => 6,
    'title' => 'Official Launch – AlphaNet Network',
    'category' => 'graphics',
    'image' => 'images/portfolio/AlphaNet-Apertura-Ufficiale.png',
    'description' => 'Grafica d\'impatto per l\'annuncio dell\'apertura ufficiale del network AlphaNet.',
    'tech' => ['Hype Generation', 'Visual Impact', 'Branding'],
    'fullDesc' => 'Design creato per l\'inaugurazione del Network AlphaNet. La composizione utilizza elementi dinamici e un lettering audace per generare hype e aspettativa. Ogni dettaglio è studiato per comunicare energia, innovazione e la nascita di una nuova realtà nel panorama gaming.'
  ],
  (object)[
    'id' => 7,
    'title' => 'Community Events – Sunday Specials',
    'category' => 'graphics',
    'image' => 'images/portfolio/AlphaNet-Eventi-Domenicali.png',
    'description' => 'Design dedicato agli eventi settimanali per mantenere alta l\'engagement della community.',
    'tech' => ['Event Promotion', 'Community Engagement', 'Color Theory'],
    'fullDesc' => 'Grafica promozionale per gli eventi domenicali di AlphaNet, progettata per mantenere alta la partecipazione della community. Uso strategico del colore e della tipografia per comunicare un\'atmosfera festosa e accogliente, con chiare indicazioni su orari e modalità di partecipazione.'
  ],
  (object)[
    'id' => 8,
    'title' => 'Server Welcome – Prison Mode',
    'category' => 'graphics',
    'image' => 'images/portfolio/AscendiaMC-Benvenuto-nel-Prison.png',
    'description' => 'Grafica di benvenuto per una nuova modalità di gioco con render 3D immersivi.',
    'tech' => ['3D Rendering', 'Mode Spotlight', 'Immersive Design'],
    'fullDesc' => 'Annuncio dell\'apertura della modalità Prison su AscendiaMC. La grafica utilizza render 3D per mostrare l\'ambiente di gioco in modo immersivo, con un design che comunica le meccaniche principali della modalità e invita i giocatori a esplorare il nuovo content.'
  ],
  (object)[
    'id' => 9,
    'title' => 'Weekly Updates – Changelog Header',
    'category' => 'graphics',
    'image' => 'images/portfolio/AscendiaMC-Changelogs-Settimanali.png',
    'description' => 'Layout pulito per la comunicazione degli aggiornamenti settimanali del server.',
    'tech' => ['Information Layout', 'Modular Design', 'Consistency'],
    'fullDesc' => 'Template per i changelog settimanali di AscendiaMC. Design modulare e pulito che permette di comunicare aggiornamenti, fix e nuove feature in modo chiaro e ordinato. La struttura coerente facilita la lettura e mantiene un\'identità visiva riconoscibile settimana dopo settimana.'
  ],
  (object)[
    'id' => 10,
    'title' => 'Seasonal Event – Halloween Special',
    'category' => 'graphics',
    'image' => 'images/portfolio/AscendiaMC-Halloween-Evento.png',
    'description' => 'Grafica a tema stagionale con illuminazione atmosferica e design tematico.',
    'tech' => ['Seasonal Marketing', 'Atmospheric Lighting', 'Theme Design'],
    'fullDesc' => 'Special poster per l\'evento di Halloween di AscendiaMC. Illuminazione atmosferica cupa e elementi tematici creano un\'esperienza visiva immersiva. Il design bilancia perfettamente il richiamo stagionale con la brand identity del server, mantenendo alta la leggibilità delle informazioni.'
  ],
  (object)[
    'id' => 11,
    'title' => 'Brand Evolution – Echo Services',
    'category' => 'graphics',
    'image' => 'images/portfolio/Echo-Services-Rebranding.png',
    'description' => 'Presentazione del nuovo volto di Echo Services con design minimal e corporate.',
    'tech' => ['Corporate Identity', 'Rebranding', 'Minimalist Design'],
    'fullDesc' => 'Grafica per il rebrand totale di Echo Services. Design minimalista e corporate che presenta la nuova identità del brand con linee pulite, tipografia moderna e una palette cromatica raffinata. Comunica professionalità, innovazione e la nuova direzione strategica dell\'azienda.'
  ]
];
@endphp

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-yellow-500 dark:text-yellow-400 font-semibold text-sm uppercase tracking-widest">Portfolio</span>
            <h1 class="text-5xl sm:text-6xl font-bold text-slate-900 dark:text-white mt-4">Il Nostro <span class="text-yellow-500">Portfolio</span></h1>
            <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-2xl mx-auto text-lg">Una selezione dei nostri progetti migliori. Ogni lavoro racconta una storia di collaborazione, creatività e risultati concreti.</p>
        </div>

        <div class="flex justify-center gap-4 mb-12" id="filter-buttons">
            <button class="filter-btn px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-yellow-400 text-slate-900 shadow-lg shadow-yellow-200/50 dark:shadow-yellow-900/30" data-filter="all">Tutti</button>
            <button class="filter-btn px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-white dark:bg-zinc-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-zinc-800 hover:border-yellow-400 dark:hover:border-yellow-500" data-filter="web">StarWeb</button>
            <button class="filter-btn px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-white dark:bg-zinc-900 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-zinc-800 hover:border-yellow-400 dark:hover:border-yellow-500" data-filter="graphics">StarGraphics</button>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto" id="portfolio-grid">
            @foreach ($projects as $project)
            <div class="portfolio-item group relative rounded-2xl overflow-hidden cursor-pointer bg-white dark:bg-zinc-900 border border-slate-200 dark:border-zinc-800 hover:shadow-xl hover:shadow-yellow-200/20 dark:hover:shadow-yellow-900/20 transition-all duration-500 hover:-translate-y-1" data-category="{{ $project->category }}" data-id="{{ $project->id }}" onclick="openModal({{ $project->id }})">
                <div class="aspect-[4/3] relative overflow-hidden bg-slate-100 dark:bg-zinc-800">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" onerror="this.style.display='none'" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $project->category === 'web' ? 'bg-blue-500/90 text-white' : 'bg-pink-500/90 text-white' }} backdrop-blur-sm">{{ $project->category === 'web' ? 'StarWeb' : 'StarGraphics' }}</span>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="w-16 h-16 rounded-full bg-white/90 dark:bg-zinc-800/90 flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-slate-900 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-yellow-500 transition-colors">{{ $project->title }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">{{ $project->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div id="portfolio-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="relative bg-white dark:bg-zinc-900 rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-200 dark:border-zinc-800 transform scale-95 transition-all duration-300" id="modal-content">
        <button onclick="closeModal()" class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/90 dark:bg-zinc-800/90 flex items-center justify-center hover:bg-slate-100 dark:hover:bg-zinc-700 transition-colors shadow-lg cursor-pointer">
            <svg class="w-5 h-5 text-slate-700 dark:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="aspect-video relative overflow-hidden rounded-t-3xl bg-slate-100 dark:bg-zinc-800" id="modal-image-container">
            <img id="modal-image" class="w-full h-full object-cover" alt="" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
        <div class="p-8">
            <span id="modal-category" class="inline-block px-4 py-1.5 text-xs font-semibold rounded-full mb-4"></span>
            <h2 id="modal-title" class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white"></h2>
            <p id="modal-desc" class="text-slate-600 dark:text-slate-400 mt-4 leading-relaxed"></p>
            <div class="mt-6">
                <h4 class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-3">Tecnologie</h4>
                <div id="modal-tech" class="flex flex-wrap gap-2"></div>
            </div>
            <a id="modal-action-btn" href="#" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 mt-8 px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-yellow-200/50 dark:shadow-yellow-900/30">
                <span id="modal-btn-text">Apri Progetto</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</div>

<script>
var projects = @json($projects);

function openModal(id) {
    var project = projects.find(function(p) { return p.id === id; });
    if (!project) return;

    var modal = document.getElementById('portfolio-modal');
    var content = document.getElementById('modal-content');
    var body = document.body;

    document.getElementById('modal-image').src = '{{ asset('') }}' + project.image;
    document.getElementById('modal-title').textContent = project.title;
    document.getElementById('modal-desc').textContent = project.fullDesc;

    var catEl = document.getElementById('modal-category');
    catEl.textContent = project.category === 'web' ? 'StarWeb' : 'StarGraphics';
    catEl.className = 'inline-block px-4 py-1.5 text-xs font-semibold rounded-full mb-4 ' +
        (project.category === 'web'
            ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300'
            : 'bg-pink-100 text-pink-700 dark:bg-pink-900/50 dark:text-pink-300');

    var techContainer = document.getElementById('modal-tech');
    techContainer.innerHTML = '';
    project.tech.forEach(function(t) {
        var badge = document.createElement('span');
        badge.className = 'px-3 py-1 text-xs font-medium rounded-full bg-slate-100 dark:bg-zinc-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-zinc-700';
        badge.textContent = t;
        techContainer.appendChild(badge);
    });

    var actionBtn = document.getElementById('modal-action-btn');
    var btnText = document.getElementById('modal-btn-text');
    if (project.category === 'web' && project.link) {
        btnText.textContent = 'Apri Progetto';
        actionBtn.href = project.link;
    } else {
        btnText.textContent = 'Apri Immagine';
        actionBtn.href = '{{ asset('') }}' + project.image;
    }

    modal.classList.remove('opacity-0', 'pointer-events-none');
    content.classList.remove('scale-95');
    body.style.overflow = 'hidden';
}

function closeModal() {
    var modal = document.getElementById('portfolio-modal');
    var content = document.getElementById('modal-content');
    var body = document.body;
    modal.classList.add('opacity-0', 'pointer-events-none');
    content.classList.add('scale-95');
    body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', function() {
    var filterBtns = document.querySelectorAll('.filter-btn');
    var items = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterBtns.forEach(function(b) {
                b.classList.remove('bg-yellow-400', 'text-slate-900', 'shadow-lg', 'shadow-yellow-200/50', 'dark:shadow-yellow-900/30');
                b.classList.add('bg-white', 'dark:bg-zinc-900', 'text-slate-700', 'dark:text-slate-300', 'border', 'border-slate-200', 'dark:border-zinc-800');
            });
            this.classList.remove('bg-white', 'dark:bg-zinc-900', 'text-slate-700', 'dark:text-slate-300', 'border', 'border-slate-200', 'dark:border-zinc-800');
            this.classList.add('bg-yellow-400', 'text-slate-900', 'shadow-lg', 'shadow-yellow-200/50', 'dark:shadow-yellow-900/30');

            var filter = this.getAttribute('data-filter');
            items.forEach(function(item) {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
});
</script>
@endsection
