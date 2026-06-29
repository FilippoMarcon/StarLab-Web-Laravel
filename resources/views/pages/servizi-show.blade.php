@extends('layouts.app')

@section('title', $service->title . ' | StarLab | Graphic Design per Creator')
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
                    <div class="text-slate-400 leading-relaxed space-y-4">
                        @foreach (explode("\n", $service->content) as $line)
                            @if (trim($line))
                                <p>{{ $line }}</p>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- FAQ -->
                <div class="mt-12 space-y-4">
                    <h2 class="text-xl font-bold text-white mb-6">Domande frequenti</h2>

                    @php
                        $faqs = [
                            ['q' => 'Quanto tempo ci vuole?', 'a' => 'In media 3-7 giorni per un logo, 5-10 per un branding completo. Se hai urgenza, contattami e valutiamo insieme.'],
                            ['q' => 'Cosa ricevo alla consegna?', 'a' => 'Tutti i file necessari in formato PNG, SVG, PDF, AI. Organizzati e pronti all\'uso per web, social e stampa.'],
                            ['q' => 'Quante revisioni posso fare?', 'a' => 'Revisioni illimitate fino al tuo via libera. Il mio obiettivo è che tu sia soddisfatto al 100%.'],
                            ['q' => 'Lavori anche con creator e streamer?', 'a' => 'Sì, è la mia nicchia principale. Creo overlay, emotes, badge, banner e branding completi per Twitch, YouTube e Discord.'],
                            ['q' => 'Come funziona il pagamento?', 'a' => 'Acconto del 50% per iniziare, saldo alla consegna. Pagamento tramite PayPal.'],
                        ];
                    @endphp

                    @foreach ($faqs as $faq)
                        <details class="group p-5 rounded-2xl bg-slate-900 border border-slate-800 open:border-indigo-600/50 transition-all">
                            <summary class="flex items-center justify-between cursor-pointer text-white font-bold text-sm">
                                {{ $faq['q'] }}
                                <svg class="w-4 h-4 text-slate-500 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </summary>
                            <p class="mt-3 text-sm text-slate-400 leading-relaxed">{{ $faq['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                @if ($service->price_from)
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                        <p class="text-sm text-slate-400 mb-1">Investimento</p>
                        <p class="text-3xl font-bold text-white">da €{{ number_format($service->price_from, 0, ',', '.') }}</p>
                        <p class="text-xs text-slate-500 mt-2">Preventivo gratuito, pagamento 50/50</p>
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
                        <h3 class="text-sm font-bold text-white mb-4">Info rapide</h3>
                        <ul class="space-y-3 text-sm text-slate-400">
                            @if ($service->delivery_time)
                                <li class="flex justify-between">
                                    <span>Consegna</span>
                                    <span class="text-slate-300 font-bold">{{ $service->delivery_time }}</span>
                                </li>
                            @endif
                            @if ($service->revisions)
                                <li class="flex justify-between">
                                    <span>Revisioni</span>
                                    <span class="text-slate-300 font-bold">{{ $service->revisions }}</span>
                                </li>
                            @endif
                            @if ($service->file_formats)
                                <li class="flex justify-between">
                                    <span>Formati</span>
                                    <span class="text-slate-300 text-right text-xs">{{ $service->file_formats }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif

                <a href="{{ route('contatti') }}" class="block w-full text-center px-6 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/25">
                    Richiedi {{ strtolower($service->title) }}
                </a>
            </div>
        </div>
    </div>
</section>

<x-cta-section
    title="Hai un progetto in mente?"
    subtitle="Parliamone senza impegno. Ti rispondo entro 24h con un preventivo chiaro."
    buttonText="Richiedi preventivo gratuito"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
