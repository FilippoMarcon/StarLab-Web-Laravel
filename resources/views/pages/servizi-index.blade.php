@extends('layouts.app')

@section('title', 'Servizi | StarLab')
@section('og-title', 'StarLab | Servizi di Graphic Design')
@section('og-description', 'Logo design, branding, social media design e print design. Scopri tutti i servizi di graphic design professionale.')

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Servizi</span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mt-3">Cosa offro</h1>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Servizi di graphic design professionale per brand, creator e aziende. Ogni progetto è personalizzato.</p>
        </div>

        @if ($services->isEmpty())
            <p class="text-center text-slate-500 py-20">Nessun servizio disponibile al momento.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
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
        @endif
    </div>
</section>

<section class="py-20 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Non trovi il servizio che cerchi?</h2>
        <p class="text-slate-400 mb-8">Ogni progetto è unico. Contattami e parliamo della tua idea, realizzo qualcosa su misura per te.</p>
        <a href="{{ route('contatti') }}" class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">
            Parlami del tuo progetto
            <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

<x-cta-section
    title="Pronto a iniziare?"
    subtitle="Richiedi un preventivo gratuito e senza impegno. Ti rispondo entro 24h."
    buttonText="Richiedi preventivo"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
