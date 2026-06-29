@props([
    'title' => 'Hai un progetto in mente?',
    'subtitle' => 'Raccontami la tua idea, ti ricontatto entro 24h con un preventivo gratuito.',
    'buttonText' => 'Richiedi preventivo',
    'buttonUrl' => '#',
])

<section class="py-20 sm:py-28">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-900/40 via-slate-900 to-emerald-900/20 border border-slate-800 p-10 sm:p-16 text-center">
            <div class="absolute inset-0 bg-grid-white/5 pointer-events-none"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">{{ $title }}</h2>
                <p class="text-lg text-slate-400 mb-8">{{ $subtitle }}</p>
                <a href="{{ $buttonUrl }}"
                   class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-indigo-600/25">
                    {{ $buttonText }}
                    <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
