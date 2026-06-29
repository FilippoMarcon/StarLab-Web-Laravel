@extends('layouts.app')

@section('title', 'About | StarLab | Graphic Design per Creator')
@section('og-title', 'StarLab | Chi Sono - Graphic Designer per Creator e Gaming')
@section('og-description', 'Graphic designer specializzato in logo, overlay, branding per creator, streamer e gaming team. Design che funziona, senza compromessi.')

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">About</span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mt-3">Ciao, sono un graphic designer</h1>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto text-lg">Creo identità visive per creator, streamer e brand che vogliono essere riconoscibili. Niente template, niente design generico. Solo progetti su misura, progettati per funzionare.</p>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 items-start">
            <div class="lg:col-span-3 space-y-8">
                <div>
                    <h2 class="text-xl font-bold text-white mb-3">Perch&eacute; lavoro con creator e gaming</h2>
                    <p class="text-slate-400 leading-relaxed">
                        Perch&eacute; so quanto sia importante avere un'identit&agrave; visiva che ti rappresenti davvero. 
                        Che tu sia uno streamer su Twitch, un content creator su YouTube o un gaming team su Discord, 
                        il tuo pubblico riconosce la differenza tra un design fatto con cura e uno fatto in fretta.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-white mb-3">Come lavoro</h2>
                    <p class="text-slate-400 leading-relaxed">
                        Ogni progetto parte da una chiacchierata. Mi racconti cosa ti serve, chi &egrave; il tuo pubblico, 
                        che stile ti piace. Da l&igrave; sviluppo 2-3 concept tra cui scegliere, e lavoriamo insieme 
                        per rifinire fino al risultato perfetto. Non mi fermo finch&eacute; non sei soddisfatto al 100%.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-white mb-3">Cosa ottieni</h2>
                    <p class="text-slate-400 leading-relaxed">
                        File pronti all'uso in tutti i formati necessari, organizzati e consegnati in modo professionale. 
                        Ogni progetto include revisioni illimitate fino al tuo via libera. Niente stress, niente sorprese.
                    </p>
                </div>

                <div class="pt-4">
                    <a href="{{ route('contatti') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200">
                        Parliamo del tuo progetto
                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                    <h3 class="text-sm font-bold text-white mb-4">In numeri</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-2xl font-bold text-white">{{ $projectCount }}+</p>
                            <p class="text-xs text-slate-500">Progetti completati</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-emerald-400">&lt; 24h</p>
                            <p class="text-xs text-slate-500">Tempo medio di risposta</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-indigo-400">&infin;</p>
                            <p class="text-xs text-slate-500">Revisioni incluse</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                    <h3 class="text-sm font-bold text-white mb-4">Strumenti che uso</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-300">Adobe Illustrator</span>
                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-300">Adobe Photoshop</span>
                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-300">Figma</span>
                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-300">After Effects</span>
                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-300">Blender</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($testimonials->isNotEmpty())
<section class="py-20 bg-slate-900/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <h2 class="text-2xl font-bold text-white mb-10 text-center">Cosa dicono i clienti</h2>
        <div class="space-y-6">
            @foreach ($testimonials as $t)
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center gap-1 mb-3">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $t->rating ? 'text-amber-400' : 'text-slate-700' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-slate-300">"{{ $t->text }}"</p>
                    <p class="text-sm font-bold text-white mt-3">{{ $t->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<x-cta-section
    title="Ti va di lavorare insieme?"
    subtitle="Raccontami la tua idea. Ti preparo un preventivo su misura, senza impegno."
    buttonText="Contattami"
    buttonUrl="{{ route('contatti') }}"
/>

@endsection
