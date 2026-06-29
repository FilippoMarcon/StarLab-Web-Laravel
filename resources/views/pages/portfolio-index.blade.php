@extends('layouts.app')

@section('title', 'Portfolio | StarLab')
@section('og-title', 'StarLab | Portfolio - I Nostri Progetti')
@section('og-description', 'Esplora i progetti di graphic design realizzati: logo, branding, social media design e molto altro.')

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Portfolio</span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mt-3">Progetti realizzati</h1>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Ogni progetto racconta una storia unica. Scopri come ho aiutato brand e creator a distinguersi.</p>
        </div>

        @if ($projects->isEmpty())
            <p class="text-center text-slate-500 py-20">Nessun progetto disponibile al momento.</p>
        @else
            <div id="portfolio-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <x-portfolio-card
                        image="{{ $project->cover_image ?? asset('images/StarLab-Logo.png') }}"
                        title="{{ $project->title }}"
                        category="{{ $project->category }}"
                        slug="{{ $project->slug }}"
                    />
                @endforeach
            </div>
        @endif
    </div>
</section>

<x-cta-section
    title="Ti serve un progetto simile?"
    subtitle="Raccontami la tua idea, realizzo qualcosa di unico per il tuo brand."
    buttonText="Richiedi preventivo"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
