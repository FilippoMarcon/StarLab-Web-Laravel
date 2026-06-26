@extends('layouts.app')

@section('title', 'StarLab | Listino Prezzi')
@section('og-title', 'StarLab | Listino Prezzi')
@section('og-description', 'Scopri i prezzi dei servizi StarLab. Scegli tra servizi singoli o bundle premium per la tua crescita digitale.')

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 dark:text-white mb-6 uppercase tracking-tighter">
                    Listino <span class="text-amber-500 drop-shadow-[0_0_15px_rgba(245,158,11,0.5)]">Prezzi</span>
                </h1>
                <p class="text-slate-600 dark:text-slate-400 text-xl max-w-2xl mx-auto mb-10">
                    Scegli il servizio perfetto per la tua crescita digitale. Qualit&agrave; garantita e tempi record.
                </p>

                <div class="flex items-center justify-center gap-4">
                    <span class="standard-label text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white transition-colors duration-300">Standard</span>
                    <button onclick="togglePrices()" id="toggleBtn" class="relative w-16 h-8 rounded-full transition-colors duration-300 bg-slate-300 dark:bg-slate-700">
                        <div id="toggleDot" class="absolute top-1 w-6 h-6 bg-white rounded-full shadow-lg transition-all duration-300" style="left: 4px;"></div>
                    </button>
                    <div class="flex items-center gap-2">
                        <span class="premium-label text-sm font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 transition-colors duration-300">Premium</span>
                        <svg class="crown-icon w-4 h-4 text-slate-400 dark:text-slate-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>
                <p id="premiumNotice" class="text-amber-600 dark:text-amber-400 text-xs mt-4 font-bold uppercase tracking-widest transition-all duration-300" style="display:none; opacity:0; transform:translateY(-8px)">
                    * Priorit&agrave; Assoluta: Il tuo progetto scavalca la coda e riceve attenzione immediata.
                </p>
            </div>

            <div id="pricingContainer">
                <div class="mb-24">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-10 flex items-center gap-3">
                        <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        Servizi Singoli
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        <div class="pricing-card glass-card p-8 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 group flex flex-col">
                            <div class="flex-1 flex flex-col pb-6">
                                <div class="mb-6 p-3 bg-amber-500/10 w-fit rounded-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Thumbnail &amp; Social</h3>
                                <div class="flex items-baseline gap-1 mb-6">
                                    <span class="price-value text-3xl font-black text-slate-900 dark:text-white" data-standard="10" data-premium="15">&euro;10</span>
                                    <span class="text-slate-400 dark:text-slate-500 text-sm">/unit&agrave;</span>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        YouTube Thumbnails
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Annunci &amp; Social Graphic
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Revisioni Illimitate
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        File Sorgente (+&euro;5)
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-4 bg-slate-100 dark:bg-slate-900 hover:bg-amber-500 text-slate-800 dark:text-white hover:text-white rounded-xl font-bold transition-all border border-slate-300 dark:border-slate-800 hover:border-amber-500 mt-auto">Ordina Ora</a>
                        </div>

                        <div class="pricing-card glass-card p-8 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 group flex flex-col">
                            <div class="flex-1 flex flex-col pb-6">
                                <div class="mb-6 p-3 bg-amber-500/10 w-fit rounded-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Logo Design</h3>
                                <div class="flex items-baseline gap-1 mb-6">
                                    <span class="price-value text-3xl font-black text-slate-900 dark:text-white" data-standard="25" data-premium="40">&euro;25</span>
                                    <span class="text-slate-400 dark:text-slate-500 text-sm">/unit&agrave;</span>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Vettoriale (SVG/AI)
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        3 Concept Iniziali
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Uso Commerciale
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-4 bg-slate-100 dark:bg-slate-900 hover:bg-amber-500 text-slate-800 dark:text-white hover:text-white rounded-xl font-bold transition-all border border-slate-300 dark:border-slate-800 hover:border-amber-500 mt-auto">Ordina Ora</a>
                        </div>

                        <div class="pricing-card glass-card p-8 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 group flex flex-col">
                            <div class="flex-1 flex flex-col pb-6">
                                <div class="mb-6 p-3 bg-amber-500/10 w-fit rounded-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Banner</h3>
                                <div class="flex items-baseline gap-1 mb-6">
                                    <span class="price-value text-3xl font-black text-slate-900 dark:text-white" data-standard="20" data-premium="30">&euro;20</span>
                                    <span class="text-slate-400 dark:text-slate-500 text-sm">/unit&agrave;</span>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Canali YouTube &amp; Social
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Server Banner
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Stile Personalizzato
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-4 bg-slate-100 dark:bg-slate-900 hover:bg-amber-500 text-slate-800 dark:text-white hover:text-white rounded-xl font-bold transition-all border border-slate-300 dark:border-slate-800 hover:border-amber-500 mt-auto">Ordina Ora</a>
                        </div>

                        <div class="pricing-card glass-card p-8 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 group flex flex-col">
                            <div class="flex-1 flex flex-col pb-6">
                                <div class="mb-6 p-3 bg-amber-500/10 w-fit rounded-2xl group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Grafica Avanzata</h3>
                                <div class="flex items-baseline gap-1 mb-6">
                                    <span class="price-value text-3xl font-black text-slate-900 dark:text-white" data-standard="30" data-premium="45">&euro;30</span>
                                    <span class="text-slate-400 dark:text-slate-500 text-sm">/unit&agrave;</span>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Effetti Particellari
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Render 3D Personaggio
                                    </li>
                                    <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                        <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Banner Minecraft &amp; Advanced
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-4 bg-slate-100 dark:bg-slate-900 hover:bg-amber-500 text-slate-800 dark:text-white hover:text-white rounded-xl font-bold transition-all border border-slate-300 dark:border-slate-800 hover:border-amber-500 mt-auto">Ordina Ora</a>
                        </div>

                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-10 flex items-center gap-3">
                        <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        Bundle &amp; Pack
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <div class="pricing-card glass-card p-10 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 relative text-center flex flex-col">
                            <div class="flex-1">
                                <div class="mb-8">
                                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-2 uppercase tracking-tight">Starter Pack</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm">Ideale per chi inizia</p>
                                </div>
                                <div class="flex items-baseline gap-1 mb-8 justify-center">
                                    <span class="price-value text-5xl font-black text-slate-900 dark:text-white" data-standard="40" data-premium="60">&euro;40</span>
                                    <span class="price-standard-cross text-xs font-bold line-through opacity-50 text-slate-500 dark:text-slate-400" data-standard="40" style="display:none">&euro;40</span>
                                </div>
                                <ul class="space-y-4 mb-10 text-left">
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Logo Design
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Banner
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        1 Thumbnail/Social Omaggio
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-5 rounded-2xl font-black uppercase tracking-widest transition-all bg-white dark:bg-slate-800 text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-300 dark:border-slate-700 flex items-center justify-center gap-3 mt-auto">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                                Acquista Pack
                            </a>
                        </div>

                        <div class="pricing-card glass-card p-10 rounded-3xl border-2 border-amber-500 dark:border-amber-500 bg-amber-50/50 dark:bg-amber-500/5 shadow-2xl shadow-amber-500/10 scale-105 z-10 relative text-center flex flex-col">
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-amber-500 text-white text-[10px] font-black uppercase tracking-widest rounded-full">Pi&ugrave; Popolare</div>
                            <div class="flex-1">
                                <div class="mb-8">
                                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-2 uppercase tracking-tight">Creator Bundle</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm">Il pi&ugrave; scelto dai Pro</p>
                                </div>
                                <div class="flex items-baseline gap-1 mb-8 justify-center">
                                    <span class="price-value text-5xl font-black text-slate-900 dark:text-white" data-standard="75" data-premium="110">&euro;75</span>
                                    <span class="price-standard-cross text-xs font-bold line-through opacity-50 text-slate-500 dark:text-slate-400" data-standard="75" style="display:none">&euro;75</span>
                                </div>
                                <ul class="space-y-4 mb-10 text-left">
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Logo Design
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Banner
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        5 Thumbnail &amp; Social
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Supporto Prioritario
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-5 rounded-2xl font-black uppercase tracking-widest transition-all bg-amber-500 hover:bg-amber-400 text-white shadow-xl shadow-amber-500/30 flex items-center justify-center gap-3 mt-auto">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                                Acquista Pack
                            </a>
                        </div>

                        <div class="pricing-card glass-card p-10 rounded-3xl border border-slate-200 dark:border-slate-800 hover:border-amber-500/50 transition-all duration-300 relative text-center flex flex-col">
                            <div class="flex-1">
                                <div class="mb-8">
                                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-2 uppercase tracking-tight">Minecraft Network</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm">Per server Minecraft</p>
                                </div>
                                <div class="flex items-baseline gap-1 mb-8 justify-center">
                                    <span class="price-value text-5xl font-black text-slate-900 dark:text-white" data-standard="65" data-premium="95">&euro;65</span>
                                    <span class="price-standard-cross text-xs font-bold line-through opacity-50 text-slate-500 dark:text-slate-400" data-standard="65" style="display:none">&euro;65</span>
                                </div>
                                <ul class="space-y-4 mb-10 text-left">
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Logo Server
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Banner MC Italia
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Icona Server
                                    </li>
                                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                                        <div class="bg-amber-500/20 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        Grafica Annunci
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="w-full block text-center py-5 rounded-2xl font-black uppercase tracking-widest transition-all bg-white dark:bg-slate-800 text-slate-900 dark:text-white hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-300 dark:border-slate-700 flex items-center justify-center gap-3 mt-auto">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                                Acquista Pack
                            </a>
                        </div>

                    </div>
                </div>

                <div class="mt-24 p-12 bg-white/50 dark:bg-slate-900/50 rounded-3xl border border-slate-200 dark:border-slate-800 text-center">
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Serve qualcosa di diverso?</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-xl mx-auto">
                        Realizziamo preventivi personalizzati per progetti complessi o collaborazioni a lungo termine.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-10 py-5 bg-transparent border-2 border-slate-300 dark:border-slate-700 hover:border-amber-500 dark:hover:border-amber-500 text-slate-700 dark:text-slate-300 hover:text-amber-500 dark:hover:text-amber-500 rounded-2xl font-bold transition-all">
                        Richiedi Preventivo
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.price-value {
    transition: opacity .25s ease, transform .25s ease;
}
.price-standard-cross {
    transition: opacity .25s ease, transform .25s ease;
}
</style>
<script>
function togglePrices() {
    var container = document.getElementById('pricingContainer');
    var isPremium = container.classList.toggle('premium-active');

    var btn = document.getElementById('toggleBtn');
    var dot = document.getElementById('toggleDot');
    var standardLabel = document.querySelector('.standard-label');
    var premiumLabel = document.querySelector('.premium-label');
    var crownIcon = document.querySelector('.crown-icon');
    var notice = document.getElementById('premiumNotice');

    if (isPremium) {
        btn.classList.remove('bg-slate-300', 'dark:bg-slate-700');
        btn.classList.add('bg-amber-500');
        dot.style.left = '34px';
        standardLabel.classList.remove('text-slate-900', 'dark:text-white');
        standardLabel.classList.add('text-slate-400', 'dark:text-slate-500');
        premiumLabel.classList.remove('text-slate-400', 'dark:text-slate-500');
        premiumLabel.classList.add('text-amber-600', 'dark:text-amber-400');
        crownIcon.classList.remove('text-slate-400', 'dark:text-slate-500');
        crownIcon.classList.add('text-amber-500');
        notice.style.display = 'block';
        void notice.offsetHeight;
        notice.style.opacity = '1';
        notice.style.transform = 'translateY(0)';
    } else {
        btn.classList.remove('bg-amber-500');
        btn.classList.add('bg-slate-300', 'dark:bg-slate-700');
        dot.style.left = '4px';
        standardLabel.classList.remove('text-slate-400', 'dark:text-slate-500');
        standardLabel.classList.add('text-slate-900', 'dark:text-white');
        premiumLabel.classList.remove('text-amber-600', 'dark:text-amber-400');
        premiumLabel.classList.add('text-slate-400', 'dark:text-slate-500');
        crownIcon.classList.remove('text-amber-500');
        crownIcon.classList.add('text-slate-400', 'dark:text-slate-500');
        notice.style.opacity = '0';
        notice.style.transform = 'translateY(-8px)';
        setTimeout(function() { notice.style.display = 'none'; }, 300);
    }

    document.querySelectorAll('.price-value').forEach(function(el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(-8px)';
        setTimeout(function() {
            el.textContent = '\u20AC' + (isPremium ? el.dataset.premium : el.dataset.standard);
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }, 250);
    });

    document.querySelectorAll('.price-standard-cross').forEach(function(el) {
        if (isPremium) {
            el.style.display = 'inline';
            el.style.opacity = '0';
            el.style.transform = 'translateX(-12px)';
            setTimeout(function() {
                el.textContent = '\u20AC' + el.dataset.standard;
                el.style.opacity = '1';
                el.style.transform = 'translateX(0)';
            }, 50);
        } else {
            el.style.opacity = '0';
            el.style.transform = 'translateX(-12px)';
            setTimeout(function() {
                el.style.display = 'none';
            }, 250);
        }
    });

    document.querySelectorAll('.pricing-card').forEach(function(card) {
        if (isPremium) {
            card.classList.add('ring-1', 'ring-amber-500/30', 'shadow-lg', 'shadow-amber-500/20');
        } else {
            card.classList.remove('ring-1', 'ring-amber-500/30', 'shadow-lg', 'shadow-amber-500/20');
        }
    });
}
</script>
@endsection
