@extends('layouts.app')

@section('title', $project->title . ' | StarLab Portfolio')
@section('og-title', $project->title . ' | StarLab Portfolio')
@section('og-description', str(strip_tags($project->description))->limit(160))
@section('og-image', $project->cover_image ?? asset('images/StarLab-Logo.png'))

@section('content')

<section class="pt-32 pb-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center text-sm text-slate-400 hover:text-white transition-colors mb-8">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Torna al portfolio
        </a>

        <div class="mb-8">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">{{ $project->category }}</span>
            <h1 class="text-3xl sm:text-5xl font-bold text-white mt-3">{{ $project->title }}</h1>
            @if ($project->client_name)
                <p class="text-slate-400 mt-2">Cliente: <span class="text-white">{{ $project->client_name }}</span></p>
            @endif
        </div>

        @if ($project->cover_image)
            <div class="rounded-2xl overflow-hidden border border-slate-800 mb-12">
                <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="w-full" />
            </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-10">
                @if ($project->description)
                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Il progetto</h2>
                        <p class="text-slate-400 leading-relaxed">{{ $project->description }}</p>
                    </div>
                @endif

                @if ($project->problem)
                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Il problema</h2>
                        <p class="text-slate-400 leading-relaxed">{{ $project->problem }}</p>
                    </div>
                @endif

                @if ($project->solution)
                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">La soluzione</h2>
                        <p class="text-slate-400 leading-relaxed">{{ $project->solution }}</p>
                    </div>
                @endif

                @if ($project->concept)
                    <div>
                        <h2 class="text-xl font-bold text-white mb-3">Il concept</h2>
                        <p class="text-slate-400 leading-relaxed">{{ $project->concept }}</p>
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                    <h3 class="text-sm font-bold text-white mb-4">Dettagli progetto</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between">
                            <span class="text-slate-500">Categoria</span>
                            <span class="text-slate-300">{{ $project->category }}</span>
                        </li>
                        @if ($project->client_name)
                            <li class="flex justify-between">
                                <span class="text-slate-500">Cliente</span>
                                <span class="text-slate-300">{{ $project->client_name }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <a href="{{ route('contatti') }}" class="block w-full text-center px-6 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">Richiedi progetto simile</a>
            </div>
        </div>

        @if ($project->images->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-white mb-8">Galleria</h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach ($project->images as $img)
                        <div class="rounded-xl overflow-hidden border border-slate-800">
                            <img src="{{ $img->image_path }}" alt="{{ $img->alt_text ?? $project->title }}" class="w-full" loading="lazy" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($project->testimonial)
            <div class="mt-16 p-8 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="flex items-center gap-1 mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $project->testimonial->rating ? 'text-amber-400' : 'text-slate-700' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-slate-300 italic">"{{ $project->testimonial->text }}"</p>
                <p class="text-sm font-bold text-white mt-3">{{ $project->testimonial->name }}</p>
            </div>
        @endif
    </div>
</section>

@if ($related->isNotEmpty())
<section class="py-20 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-8 text-center">Progetti correlati</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($related as $r)
                <x-portfolio-card
                    image="{{ $r->cover_image ?? asset('images/StarLab-Logo.png') }}"
                    title="{{ $r->title }}"
                    category="{{ $r->category }}"
                    slug="{{ $r->slug }}"
                />
            @endforeach
        </div>
    </div>
</section>
@endif

<x-cta-section
    title="Hai un progetto in mente?"
    subtitle="Parliamone. Ti rispondo entro 24h con un preventivo su misura."
    buttonText="Richiedi preventivo"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
