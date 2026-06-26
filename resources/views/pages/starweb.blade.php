@extends('layouts.app')

@section('title', 'StarLab | StarWeb - Sviluppo Web Professionale')
@section('og-title', 'StarWeb | Sviluppo Web Professionale')
@section('og-description', 'Sviluppiamo soluzioni web che combinano estetica futuristica e funzionalità robuste. Siti web, landing page, performance e molto altro.')

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 dark:bg-amber-400/20 border border-amber-400/30 text-xs text-amber-600 dark:text-amber-400 font-bold mb-6">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    Divisione Sviluppo
                </div>
                <h1 class="text-5xl sm:text-7xl font-extrabold text-slate-900 dark:text-white mb-6">
                    Star<span class="text-amber-500 dark:text-amber-400">Web</span>
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 leading-relaxed mb-8">
                    Sviluppiamo soluzioni web che combinano estetica futuristica e funzionalità robuste.
                    Il tuo business merita una presenza online che lasci il segno.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30">
                    Richiedi Preventivo Web
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
            <div class="relative max-w-md mx-auto">
                <div class="bg-slate-800 dark:bg-slate-900 rounded-xl border border-slate-300 dark:border-slate-700 p-4 shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div class="flex gap-2 mb-4">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="space-y-3 font-mono text-sm">
                        <div class="flex gap-2">
                            <span class="text-purple-400">const</span>
                            <span class="text-blue-400">future</span>
                            <span class="text-white">=</span>
                            <span class="text-yellow-300">new</span>
                            <span class="text-green-400">StarWeb</span><span class="text-white">();</span>
                        </div>
                        <div class="pl-4">
                            <span class="text-blue-400">future</span><span class="text-white">.</span><span class="text-yellow-300">create</span><span class="text-white">({</span>
                        </div>
                        <div class="pl-8 flex gap-2">
                            <span class="text-white">quality:</span>
                            <span class="text-orange-400">'Maximum'</span><span class="text-white">,</span>
                        </div>
                        <div class="pl-8 flex gap-2">
                            <span class="text-white">speed:</span>
                            <span class="text-orange-400">'Lightning'</span>
                        </div>
                        <div class="pl-4 text-white">});</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white/50 dark:bg-zinc-900/50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-12 text-center">Stack Tecnologico & Servizi</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card rounded-2xl p-8 border-t border-white/5 hover:border-amber-400/50 transition-all duration-500 hover:-translate-y-1">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800/50 rounded-2xl flex items-center justify-center mb-6 hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Siti Web Moderni</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Landing page ad alta conversione e siti vetrina che raccontano la tua storia.</p>
            </div>
            <div class="glass-card rounded-2xl p-8 border-t border-white/5 hover:border-amber-400/50 transition-all duration-500 hover:-translate-y-1">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800/50 rounded-2xl flex items-center justify-center mb-6 hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-amber-500 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Performance Extreme</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Ottimizzazione Core Web Vitals per garantire caricamenti istantanei e SEO migliore.</p>
            </div>
            <div class="glass-card rounded-2xl p-8 border-t border-white/5 hover:border-amber-400/50 transition-all duration-500 hover:-translate-y-1">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800/50 rounded-2xl flex items-center justify-center mb-6 hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-purple-500 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Mobile First</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Design responsive che si adatta perfettamente a qualsiasi dispositivo.</p>
            </div>
            <div class="glass-card rounded-2xl p-8 border-t border-white/5 hover:border-amber-400/50 transition-all duration-500 hover:-translate-y-1">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800/50 rounded-2xl flex items-center justify-center mb-6 hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-emerald-500 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Siti Statici</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Siti web veloci e sicuri che non richiedono manutenzione complessa, ideali per la tua presenza online.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 dark:bg-zinc-950 overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-slate-500 dark:text-slate-500 mb-8 uppercase tracking-widest text-sm font-semibold">Technologies we use</p>
        <div class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-70 hover:opacity-100 grayscale hover:grayscale-0 transition-all duration-500">
            <span class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-cyan-400" viewBox="0 0 24 24" fill="currentColor"><path d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-6.69c-1.6-1.113-3.717-1.627-6.39-1.627-2.722 0-5.018.543-6.651 1.512-1.087.644-1.63 1.633-1.63 2.973 0 .699.205 1.346.57 1.869.366.524.87.97 1.442 1.312.225.135.356.37.356.616 0 .246-.131.481-.356.616-.574.342-1.077.788-1.443 1.312-.365.524-.57 1.171-.57 1.87 0 1.34.543 2.329 1.63 2.973 1.633.97 3.93 1.512 6.652 1.512 2.673 0 4.789-.514 6.39-1.627 1.086-.644 1.63-1.633 1.63-2.973 0-.699-.205-1.346-.57-1.869-.366-.524-.87-.97-1.442-1.312-.225-.135-.356-.37-.356-.616 0-.246.131-.481.356-.616.574-.342 1.077-.788 1.443-1.312.365-.524.57-1.171.57-1.87 0-1.34-.544-2.329-1.63-2.973z"/></svg>
                React
            </span>
            <span class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M18.665 21.978C16.758 23.255 14.465 24 12 24 5.377 24 0 18.623 0 12S5.377 0 12 0s12 5.377 12 12c0 3.583-1.574 6.801-4.067 9.001L9.219 7.2H7.2v9.6h2.4V9.601l6.817 8.79c.507-.456.951-.987 1.307-1.576L10.8 7.2h2.4z"/></svg>
                Next.js
            </span>
            <span class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-400" viewBox="0 0 24 24" fill="currentColor"><path d="M1.125 0C.502 0 0 .502 0 1.125v21.75C0 23.498.502 24 1.125 24h21.75c.623 0 1.125-.502 1.125-1.125V1.125C24 .502 23.498 0 22.875 0zm9.603 6.484h-5.58v11.04h2.136v-4.62h3.444c1.873 0 3.12-1.44 3.12-3.21 0-1.77-1.247-3.21-3.12-3.21zm-.3 4.68H7.524V8.904h2.904c.677 0 1.116.484 1.116 1.14 0 .667-.44 1.13-1.116 1.13zm6.688.776c-1.378 0-2.594.648-3.158 1.704l1.714 1.092c.355-.603.89-.906 1.444-.906.956 0 1.484.688 1.484 1.724v.14c-.462-.29-1.034-.474-1.667-.474-1.544 0-2.743.947-2.743 2.478 0 1.52 1.2 2.478 2.743 2.478.776 0 1.463-.28 1.993-.786h.043v.678h1.844v-3.394c0-1.98-1.496-2.924-2.697-2.924zm-.334 4.134c.42 0 .806.15 1.1.398-.29.344-.666.564-1.1.564-.548 0-.964-.38-.964-.496 0-.442.462-.466.964-.466z"/></svg>
                TypeScript
            </span>
            <span class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-cyan-300" viewBox="0 0 24 24" fill="currentColor"><path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.018 15.027 11.4 18 11.4c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C7.666 17.218 9.027 18.6 12 18.6c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.336 13.382 8.976 12 6 12z"/></svg>
                Tailwind
            </span>
            <span class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M11.998 24c-1.056 0-2.048-.188-2.975-.564a7.686 7.686 0 0 1-2.423-1.569 7.416 7.416 0 0 1-1.612-2.38 7.182 7.182 0 0 1-.598-2.886c0-.792.128-1.568.384-2.328a6.88 6.88 0 0 1 1.07-2.044 6.417 6.417 0 0 1 1.597-1.548 6.18 6.18 0 0 1 1.951-.926c.728-.198 1.456-.297 2.184-.297.716 0 1.408.095 2.076.285.668.19 1.278.466 1.828.828.55.362 1.02.796 1.409 1.302.39.506.676 1.067.86 1.684.184.617.276 1.273.276 1.968v2.148c0 .704-.088 1.342-.264 1.914a4.64 4.64 0 0 1-.762 1.494 3.63 3.63 0 0 1-1.199 1.002c-.466.25-.988.375-1.566.375-.596 0-1.13-.183-1.602-.55-.473-.367-.81-.882-1.01-1.546a15.97 15.97 0 0 1-.082 1.338h-2.22c-.028-.18-.047-.464-.058-.852a6.1 6.1 0 0 1-.012-.588c0-.264.01-.558.029-.882.02-.324.043-.642.07-.954.028-.312.05-.586.07-.822.02-.236.035-.408.046-.516h2.086c-.018.132-.04.336-.065.612-.025.276-.046.558-.064.846-.018.288-.015.554.01.798.025.244.056.426.094.546.098.308.272.55.522.726.25.176.532.264.846.264.502 0 .89-.196 1.164-.588.274-.392.44-.904.498-1.536.028-.316.042-.656.042-1.02 0-.792-.152-1.466-.456-2.022-.304-.556-.727-.974-1.27-1.254-.542-.28-1.15-.42-1.823-.42-.984 0-1.804.272-2.46.816-.656.544-1.1 1.276-1.332 2.196l-1.984-.456c.2-.836.562-1.592 1.086-2.27.524-.678 1.158-1.23 1.902-1.656a5.42 5.42 0 0 1 2.544-.75c.52 0 1.042.068 1.566.204.524.136 1.02.334 1.488.594.468.26.892.58 1.272.96.38.38.688.804.924 1.272.236.468.406.976.51 1.524.104.548.156 1.128.156 1.74v.36c0 .592-.052 1.148-.156 1.668-.104.52-.26 1-.468 1.44-.208.44-.476.83-.804 1.17-.328.34-.716.614-1.164.822a3.703 3.703 0 0 1-1.524.324c-.748 0-1.422-.14-2.022-.42a4.325 4.325 0 0 1-1.56-1.164c-.436-.5-.78-1.086-1.032-1.758-.252-.672-.378-1.404-.378-2.196 0-.772.126-1.5.378-2.184.252-.684.6-1.282 1.044-1.794a4.71 4.71 0 0 1 1.584-1.158c.6-.284 1.242-.426 1.926-.426.56 0 1.078.09 1.554.27.476.18.9.432 1.272.756.372.324.676.71.912 1.158.236.448.398.932.486 1.452h-2.244a1.7 1.7 0 0 0-.378-.642 1.58 1.58 0 0 0-.618-.408 2.38 2.38 0 0 0-.738-.138c-.588 0-1.07.186-1.446.558-.376.372-.644.848-.804 1.428a7.93 7.93 0 0 0-.276 1.944z"/></svg>
                Node.js
            </span>
        </div>
    </div>
</section>

<section class="py-24 bg-white/50 dark:bg-zinc-900/50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl sm:text-5xl font-bold text-slate-900 dark:text-white">Pronto a Iniziare il Tuo Progetto Web?</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-6 text-lg">Raccontaci la tua idea e la trasformeremo in una presenza online straordinaria.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 mt-8 px-10 py-4 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-amber-200/50 dark:shadow-amber-900/30">
                Contattaci Ora
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
