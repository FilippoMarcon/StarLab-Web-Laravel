@extends('layouts.app')

@section('title', 'StarLab | 404 - Pagina non trovata')
@section('og-title', 'StarLab | 404 - Pagina non trovata')
@section('og-description', 'La pagina che stai cercando non è stata trovata.')

@section('content')
<section class="relative min-h-screen flex items-center justify-center overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-[12rem] sm:text-[16rem] lg:text-[20rem] font-black text-slate-200 dark:text-zinc-800 leading-none select-none tracking-tighter">404</h1>
        <div class="-mt-16 sm:-mt-24 mb-8">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 dark:text-white">Houston, abbiamo un <span class="text-amber-500 dark:text-amber-400">problema!</span></h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-lg mx-auto text-lg leading-relaxed">La pagina che stai cercando sembra aver preso un'altra strada. Forse è stata spostata, rinominata o non è mai esistita.</p>
        </div>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Torna alla Base
        </a>
    </div>
</section>
@endsection
