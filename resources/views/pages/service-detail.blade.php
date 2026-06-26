@extends('layouts.app')

@section('title', 'StarLab | Dettaglio Servizio')
@section('og-title', 'StarLab | Dettaglio Servizio')

@section('content')
@php
$serviceId = $id ?? null;

$services = [
    'web-development' => [
        'title' => 'Sviluppo Web Full Stack',
        'description' => 'Creiamo applicazioni web complesse e scalabili utilizzando le tecnologie più moderne del mercato. Dal backend al frontend, ogni componente è progettato per offrire prestazioni elevate e un\'esperienza utente impeccabile.',
        'benefits' => ['Architettura scalabile', 'API RESTful & GraphQL', 'Sicurezza avanzata', 'Integrazione Database']
    ],
    'frontend' => [
        'title' => 'Frontend Development',
        'description' => 'Realizziamo interfacce utente moderne e reattive con le migliori tecnologie del settore. Il nostro focus è sulla velocità, l\'accessibilità e un design che cattura l\'attenzione.',
        'benefits' => ['React & Next.js', 'Tailwind CSS', 'Micro-interazioni', 'Accessibilità (a11y)']
    ],
    'seo' => [
        'title' => 'SEO & Performance',
        'description' => 'Ottimizziamo la tua presenza online con strategie SEO avanzate. Analizziamo ogni aspetto del tuo sito per garantire visibilità massima sui motori di ricerca e tempi di caricamento fulminei.',
        'benefits' => ['Audit Tecnico', 'Core Web Vitals', 'Keyword Strategy', 'Link Building']
    ],
    'branding' => [
        'title' => 'Branding & Identity',
        'description' => 'Creiamo identità visive complete che raccontano la tua storia. Dal logo alla carta intestata, ogni elemento è pensato per comunicare i valori del tuo brand in modo coerente e professionale.',
        'benefits' => ['Logo Design', 'Brand Book', 'Biglietti da visita', 'Coerenza visiva']
    ],
    'ui-ux' => [
        'title' => 'UI/UX Design',
        'description' => 'Progettiamo esperienze utente intuitive e coinvolgenti. Attraverso ricerca e prototipazione, creiamo interfacce che gli utenti amano utilizzare.',
        'benefits' => ['User Research', 'Wireframing', 'Prototipi interattivi', 'Design System']
    ],
    'graphic-design' => [
        'title' => 'Graphic Design',
        'description' => 'Dai social media alla carta stampata, realizziamo contenuti visivi professionali per ogni canale di comunicazione. Il tuo brand merita di essere visto al meglio.',
        'benefits' => ['Social Media Post', 'Brochure & Flyer', 'Advertising', 'Illustrazioni']
    ],
    '3d-modeling' => [
        'title' => 'Modellazione 3D',
        'description' => 'Diamo vita alle tue idee con la modellazione 3D professionale. Dai product design ai render architettonici, creiamo asset tridimensionali di alto impatto visivo.',
        'benefits' => ['Product Design', 'Render Architettonici', 'Asset per Giochi', 'Motion Graphics']
    ]
];

$service = $services[$serviceId] ?? null;
@endphp

@if (!$service)
<section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 dark:bg-zinc-950">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="text-8xl font-black text-slate-200 dark:text-zinc-800 select-none">?</div>
        <h1 class="text-4xl sm:text-5xl font-bold text-slate-900 dark:text-white mt-4">Servizio non trovato</h1>
        <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-md mx-auto text-lg">Il servizio <span class="font-semibold text-amber-500 dark:text-amber-400">{{ $serviceId }}</span> che stai cercando non esiste.</p>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mt-8 px-8 py-4 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Torna alla Home
        </a>
    </div>
</section>
@else
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-slate-600 dark:text-slate-400 hover:text-amber-500 dark:hover:text-amber-400 mb-8 transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m7 7l-7-7 7-7"/></svg>
            Torna alla Home
        </a>

        <div class="glass-card rounded-3xl p-8 sm:p-12 max-w-4xl mx-auto">
            <div class="flex items-start gap-4 mb-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-500 flex items-center justify-center shrink-0 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30">
                    <svg class="w-8 h-8 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h1 class="text-4xl sm:text-5xl font-bold text-slate-900 dark:text-white">{{ $service['title'] }}</h1>
                    <p class="text-lg text-slate-600 dark:text-slate-400 mt-4 leading-relaxed">{{ $service['description'] }}</p>
                </div>
            </div>

            <div class="border-t border-slate-200 dark:border-zinc-700 pt-8">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Cosa Ottieni</h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach ($service['benefits'] as $benefit)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-white/50 dark:bg-zinc-800/50 border border-slate-200 dark:border-zinc-700">
                        <div class="w-10 h-10 rounded-lg bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium text-slate-700 dark:text-slate-300">{{ $benefit }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-slate-200 dark:border-zinc-700 text-center">
                <p class="text-slate-600 dark:text-slate-400 mb-6">Pronto a trasformare la tua idea in realtà?</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-10 py-4 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30">
                    Richiedi {{ $service['title'] }}
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
