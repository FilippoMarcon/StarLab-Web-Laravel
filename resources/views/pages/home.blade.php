@extends('layouts.app')

@section('title', 'StarLab | Graphic Design & Sviluppo Web Professionale')
@section('og-title', 'StarLab | Graphic Design & Sviluppo Web')
@section('og-description', 'Logo design, branding, social media design e sviluppo web. Trasforma la tua idea in un progetto professionale.')
@section('og-image', asset('images/StarLab-Logo.png'))

@section('content')

<x-hero
    title="Design che trasforma idee in risultati."
    subtitle="Logo, branding, social media design e sviluppo web per creator e brand che vogliono distinguersi."
    ctaPrimary="Richiedi preventivo"
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
                <p class="text-sm text-slate-400 mt-1">Servizi offerti</p>
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

<!-- Services Preview -->
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Servizi</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Cosa posso fare per te</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Ogni progetto è pensato su misura per il tuo brand, con attenzione ai dettagli e alla qualità.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <x-service-card
                    title="{{ $service->title }}"
                    description="{{ $service->excerpt }}"
                    icon="{{ $service->icon }}"
                    price="{{ $service->price_from ? '€' . number_format($service->price_from, 0, ',', '.') : 'Contattami' }}"
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
<section class="py-20 sm:py-28 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Portfolio</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Lavori recenti</h2>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Ogni progetto racconta una storia. Ecco alcuni dei lavori che ho realizzato.</p>
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
                Esplora portfolio completo
                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Process -->
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Come funziona</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3">Il mio processo di lavoro</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @php
                $steps = [
                    ['icon' => '📝', 'title' => 'Richiesta', 'desc' => 'Raccontami la tua idea e le tue esigenze.'],
                    ['icon' => '💡', 'title' => 'Concept', 'desc' => 'Studio e propongo soluzioni creative su misura.'],
                    ['icon' => '🎨', 'title' => 'Design', 'desc' => 'Realizzo il progetto con cura e attenzione.'],
                    ['icon' => '🔄', 'title' => 'Revisioni', 'desc' => 'Modifiche fino a che non sei soddisfatto.'],
                    ['icon' => '🚀', 'title' => 'Consegna', 'desc' => 'Ricevi i file finali pronti all\'uso.'],
                ];
            @endphp
            @foreach ($steps as $i => $step)
                <div class="text-center p-6">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-600/20 flex items-center justify-center mx-auto mb-4 text-2xl">
                        {{ $step['icon'] }}
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-slate-400">{{ $step['desc'] }}</p>
                    @if ($i < count($steps) - 1)
                        <div class="hidden lg:block w-px h-8 bg-slate-800 mx-auto mt-4"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
@if ($testimonials->isNotEmpty())
<section class="py-20 sm:py-28 bg-slate-900/30">
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
<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Chi sono</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3 mb-6">Trasformo idee in progetti che funzionano</h2>
            <p class="text-slate-400 leading-relaxed mb-8">
                Ogni progetto inizia con un ascolto attento delle tue esigenze. Il mio obiettivo è creare design 
                che non solo siano belli, ma che comunichino il valore del tuo brand e generino risultati concreti.
            </p>
            <a href="{{ route('about') }}" class="inline-flex items-center text-sm font-bold text-indigo-400 hover:text-indigo-300 transition-colors">
                Scopri di più su di me &rarr;
            </a>
        </div>
    </div>
</section>

<x-cta-section
    title="Pronto a iniziare?"
    subtitle="Raccontami la tua idea, ti ricontatto entro 24h con un preventivo gratuito e senza impegno."
    buttonText="Richiedi preventivo gratuito"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
