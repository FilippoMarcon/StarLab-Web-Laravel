@extends('layouts.app')

@section('title', $service->title . ' | StarLab Servizi')
@section('og-title', $service->title . ' | StarLab')
@section('og-description', strip_tags($service->description))

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <a href="{{ route('servizi.index') }}" class="inline-flex items-center text-sm text-slate-400 hover:text-white transition-colors mb-8">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Torna ai servizi
        </a>

        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                @if ($service->icon)
                    <div class="w-14 h-14 rounded-2xl bg-indigo-600/20 flex items-center justify-center mb-6 text-3xl">
                        {{ $service->icon }}
                    </div>
                @endif
                <h1 class="text-3xl sm:text-5xl font-bold text-white mb-6">{{ $service->title }}</h1>
                <p class="text-lg text-slate-400 leading-relaxed mb-8">{{ $service->description }}</p>

                @if ($service->content)
                    <div class="prose prose-invert max-w-none text-slate-400 leading-relaxed">
                        {!! nl2br(e($service->content)) !!}
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                @if ($service->price_from)
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                        <p class="text-sm text-slate-400 mb-1">A partire da</p>
                        <p class="text-3xl font-bold text-white">€{{ number_format($service->price_from, 0, ',', '.') }}</p>
                    </div>
                @endif

                @if ($service->features)
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-sm font-bold text-white mb-4">Cosa include</h3>
                        <ul class="space-y-3">
                            @foreach ($service->features as $feature)
                                <li class="flex items-start gap-2 text-sm text-slate-400">
                                    <svg class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($service->delivery_time || $service->revisions || $service->file_formats)
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-sm font-bold text-white mb-4">Info</h3>
                        <ul class="space-y-3 text-sm text-slate-400">
                            @if ($service->delivery_time)
                                <li class="flex justify-between">
                                    <span>Tempi di consegna</span>
                                    <span class="text-slate-300">{{ $service->delivery_time }}</span>
                                </li>
                            @endif
                            @if ($service->revisions)
                                <li class="flex justify-between">
                                    <span>Revisioni</span>
                                    <span class="text-slate-300">{{ $service->revisions }}</span>
                                </li>
                            @endif
                            @if ($service->file_formats)
                                <li class="flex justify-between">
                                    <span>Formati file</span>
                                    <span class="text-slate-300 text-right">{{ $service->file_formats }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif

                <a href="{{ route('contatti') }}" class="block w-full text-center px-6 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">
                    Richiedi questo servizio
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Dubbi o domande?</h2>
        <p class="text-slate-400 mb-6">Ogni progetto ha esigenze diverse. Contattami per un preventivo personalizzato.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contatti') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">Contattami</a>
            <a href="{{ route('portfolio.index', ['category' => $service->slug]) }}" class="px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-200">Vedi progetti correlati</a>
        </div>
    </div>
</section>

<x-cta-section
    title="Pronto a iniziare?"
    subtitle="Raccontami la tua idea, ti rispondo entro 24h."
    buttonText="Richiedi preventivo gratuito"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
