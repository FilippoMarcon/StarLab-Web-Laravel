@extends('layouts.app')

@section('title', 'StarLab | Graphic Design per Creator e Gaming')
@section('og-title', 'StarLab | Graphic Design per Creator e Gaming')
@section('og-description', 'Logo, branding, social media design e overlay per creator e gaming. Trasforma la tua passione in un brand professionale.')
@section('og-image', asset('images/StarLab-Logo.png'))

@section('content')

<x-hero
    title="Il tuo brand merita un design che non passa inosservato."
    subtitle="Logo, overlay, branding e social media design per creator, streamer e gaming team che vogliono distinguersi. Niente template, niente generico. Solo progetti su misura."
    ctaPrimary="Richiedi preventivo gratuito"
    ctaPrimaryUrl="{{ route('contatti') }}"
    ctaSecondary="Vedi portfolio"
    ctaSecondaryUrl="{{ route('portfolio.index') }}"
    image="{{ asset('images/StarLab-Logo.png') }}"
/>

<!-- Trust Bar -->
<section class="py-12 border-y border-slate-800/50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <p class="text-3xl sm:text-4xl font-bold text-white">{{ $projectCount }}+</p>
                <p class="text-sm text-slate-400 mt-1">Progetti completati</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-bold text-white">{{ $serviceCount }}</p>
                <p class="text-sm text-slate-400 mt-1">Servizi disponibili</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-bold text-emerald-400">24h</p>
                <p class="text-sm text-slate-400 mt-1">Tempo medio risposta</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-bold text-indigo-400">∞</p>
                <p class="text-sm text-slate-400 mt-1">Revisioni incluse</p>
            </div>
        </div>
    </div>
</section>

<!-- Niche Positioning: Per chi lavoro -->
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Per chi lavoro</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Design pensato per creator e gaming</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Non faccio design "generico". Ogni progetto è studiato per parlare al tuo pubblico, che siano follower su Twitch, clienti su Etsy o giocatori su Discord.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300">
                <div class="w-14 h-14 rounded-2xl bg-purple-600/20 flex items-center justify-center mb-5 text-3xl">🎮</div>
                <h3 class="text-2xl font-bold text-white mb-3">Gaming & Streamer</h3>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Overlay per Twitch e YouTube
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Logo, emotes e badges personalizzati
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Branding per team e clan
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Banner e grafiche social
                    </li>
                </ul>
            </div>
            <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300">
                <div class="w-14 h-14 rounded-2xl bg-amber-600/20 flex items-center justify-center mb-5 text-3xl">✨</div>
                <h3 class="text-2xl font-bold text-white mb-3">Creator & Content Maker</h3>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Brand identity per il tuo canale
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Thumbnail e cover video
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Kit social completo (post, storie, cover)
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Merchandise e grafiche personalizzate
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Servizi -->
<section class="py-20 sm:py-28 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Servizi</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Cosa posso fare per te</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Ogni progetto è pensato su misura per il tuo brand, con attenzione ai dettagli e alla qualità che meriti.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <x-service-card
                    title="{{ $service->title }}"
                    description="{{ $service->excerpt }}"
                    icon="{{ $service->icon }}"
                    price="{{ $service->price_from ? 'da €' . number_format($service->price_from, 0, ',', '.') : 'Contattami' }}"
                    slug="{{ $service->slug }}"
                />
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('servizi.index') }}" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors">
                Vedi tutti i servizi &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Portfolio Preview -->
@if ($projects->isNotEmpty())
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Portfolio</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Lavori recenti</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Ogni progetto racconta una storia. Ecco alcuni dei lavori che ho realizzato per creator e brand.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <x-portfolio-card
                    image="{{ $project->cover_image ?? asset('images/StarLab-Logo.png') }}"
                    title="{{ $project->title }}"
                    category="{{ $project->category }}"
                    slug="{{ $project->slug }}"
                />
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-200">
                Vedi portfolio completo
                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Process -->
<section class="py-20 sm:py-28 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Come lavoro</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Dal brief alla consegna in 5 passi</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @php
                $steps = [
                    ['icon' => '💬', 'title' => 'Parlami della tua idea', 'desc' => 'Raccontami cosa ti serve, il tuo stile e cosa vuoi comunicare.'],
                    ['icon' => '✍️', 'title' => 'Brief e concept', 'desc' => 'Studio il progetto e propongo 2-3 direzioni creative tra cui scegliere.'],
                    ['icon' => '🎨', 'title' => 'Realizzo il design', 'desc' => 'Curo ogni dettaglio, dal font ai colori, per un risultato professionale.'],
                    ['icon' => '🔄', 'title' => 'Revisioni', 'desc' => 'Modifiche fino a che non sei soddisfatto al 100%.'],
                    ['icon' => '📦', 'title' => 'Consegna finale', 'desc' => 'Ricevi i file pronti all\'uso in tutti i formati necessari.'],
                ];
            @endphp
            @foreach ($steps as $i => $step)
                <div class="text-center p-6">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-600/20 flex items-center justify-center mx-auto mb-4 text-2xl">
                        {{ $step['icon'] }}
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-slate-400">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <p class="text-sm text-slate-500">Tempi medi: 3-7 giorni per un logo, 5-10 per un branding completo.</p>
        </div>
    </div>
</section>

<!-- Testimonials -->
@if ($testimonials->isNotEmpty())
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Testimonianze</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Cosa dicono i clienti</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach ($testimonials as $t)
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center gap-1 mb-3">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $t->rating ? 'text-amber-400' : 'text-slate-700' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed mb-4">"{{ $t->text }}"</p>
                    <p class="text-sm font-bold text-white">{{ $t->name }}</p>
                    @if ($t->project)
                        <p class="text-xs text-slate-500">{{ $t->project->title }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- About Short -->
<section class="py-20 sm:py-28 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Chi sono</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3 mb-6">Design che funziona, senza compromessi</h2>
            <p class="text-slate-400 leading-relaxed mb-8 max-w-2xl mx-auto">
                Non mi piace il design "generico". Ogni progetto che realizzo parte da un ascolto attento delle tue esigenze 
                per creare qualcosa che rappresenti davvero chi sei e cosa fai. Che tu sia un creator che vuole un logo 
                 o un gaming team che ha bisogno di un'identità visiva completa, il mio obiettivo è lo stesso: 
                darti un design che funzioni, che comunichi e che duri nel tempo.
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-200">
                    Scopri di più
                </a>
                <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">
                    Vedi portfolio
                </a>
            </div>
        </div>
    </div>
</section>

<x-cta-section
    title="Pronto a far decollare il tuo brand?"
    subtitle="Raccontami la tua idea. Ti rispondo entro 24h con un preventivo gratuito e senza impegno."
    buttonText="Richiedi preventivo gratuito"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
