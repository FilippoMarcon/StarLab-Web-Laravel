@extends('layouts.app')

@section('title', $post->title . ' | StarLab Blog')
@section('meta_description', $post->meta_description ?? strip_tags($post->excerpt ?? $post->content))
@section('og-title', $post->meta_title ?? ($post->title . ' | StarLab Blog'))
@section('og-description', $post->meta_description ?? strip_tags($post->excerpt))
@section('og-image', $post->image ?? asset('images/StarLab-Logo.png'))

@section('content')

<article class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-sm text-slate-400 hover:text-white transition-colors mb-8">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Torna al blog
        </a>

        @if ($post->published_at)
            <p class="text-sm text-slate-500 mb-3">{{ $post->published_at->format('d F Y') }} &middot; {{ $post->reading_time }}</p>
        @endif

        <h1 class="text-3xl sm:text-5xl font-bold text-white mb-8 leading-tight">{{ $post->title }}</h1>

        @if ($post->image)
            <div class="rounded-2xl overflow-hidden border border-slate-800 mb-10">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full" />
            </div>
        @endif

        <div class="prose prose-invert prose-lg max-w-none text-slate-300 leading-relaxed space-y-4">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</article>

@if ($related->isNotEmpty())
<section class="py-20 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-8 text-center">Articoli correlati</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($related as $r)
                <a href="{{ route('blog.show', $r->slug) }}" class="group block rounded-2xl overflow-hidden bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300">
                    @if ($r->image)
                        <div class="aspect-[16/9] overflow-hidden">
                            <img src="{{ $r->image }}" alt="{{ $r->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                        </div>
                    @endif
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-white group-hover:text-indigo-300 transition-colors">{{ $r->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<x-cta-section
    title="Ti serve aiuto con il tuo brand?"
    subtitle="Prenota una consulenza gratuita, ti aiuto a capire cosa serve al tuo progetto."
    buttonText="Richiedi consulenza"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
