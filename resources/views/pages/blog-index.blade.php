@extends('layouts.app')

@section('title', 'Blog | StarLab')
@section('og-title', 'StarLab | Blog - Graphic Design e Branding')
@section('og-description', 'Scopri articoli su graphic design, branding, logo design e strategie visive per il tuo brand.')

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Blog</span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mt-3">Articoli e approfondimenti</h1>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Consigli, guide e riflessioni sul mondo del graphic design e del branding.</p>
        </div>

        @if ($posts->isEmpty())
            <p class="text-center text-slate-500 py-20">Nessun articolo disponibile al momento. Torna presto!</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach ($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group block rounded-2xl overflow-hidden bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300 hover:-translate-y-1 shadow-lg shadow-black/20">
                        @if ($post->image)
                            <div class="aspect-[16/9] overflow-hidden">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                            </div>
                        @else
                            <div class="aspect-[16/9] bg-slate-800 flex items-center justify-center">
                                <span class="text-4xl text-slate-700">📝</span>
                            </div>
                        @endif
                        <div class="p-5">
                            @if ($post->published_at)
                                <p class="text-xs text-slate-500 mb-2">{{ $post->published_at->format('d M Y') }} &middot; {{ $post->reading_time }}</p>
                            @endif
                            <h2 class="text-lg font-bold text-white group-hover:text-indigo-300 transition-colors">{{ $post->title }}</h2>
                            <p class="text-sm text-slate-400 mt-2 line-clamp-2">{{ $post->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            @if ($posts->hasPages())
                <nav class="flex justify-center gap-2">
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <a href="{{ $posts->url($i) }}" class="px-4 py-2 text-sm rounded-xl font-bold transition-all duration-200 {{ $posts->currentPage() === $i ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-400 hover:bg-slate-700' }}">
                            {{ $i }}
                        </a>
                    @endfor
                </nav>
            @endif
        @endif
    </div>
</section>

<x-cta-section
    title="Hai un progetto in mente?"
    subtitle="Parliamone. Ti rispondo entro 24h con un preventivo gratuito."
    buttonText="Contattami"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
