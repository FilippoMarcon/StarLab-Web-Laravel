@props([
    'title' => '',
    'subtitle' => '',
    'ctaPrimary' => null,
    'ctaPrimaryUrl' => '#',
    'ctaSecondary' => null,
    'ctaSecondaryUrl' => '#',
    'image' => null,
])

<section class="relative min-h-[90vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-transparent to-emerald-900/10 pointer-events-none"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative z-10">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    {{ $title }}
                </h1>
                @if ($subtitle)
                    <p class="text-lg sm:text-xl text-slate-400 leading-relaxed mb-8 max-w-xl">
                        {{ $subtitle }}
                    </p>
                @endif
                <div class="flex flex-wrap gap-4">
                    @if ($ctaPrimary)
                        <a href="{{ $ctaPrimaryUrl }}"
                           class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-indigo-600/25">
                            {{ $ctaPrimary }}
                            <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    @endif
                    @if ($ctaSecondary)
                        <a href="{{ $ctaSecondaryUrl }}"
                           class="inline-flex items-center px-8 py-4 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-200 hover:-translate-y-0.5">
                            {{ $ctaSecondary }}
                        </a>
                    @endif
                </div>
            </div>
            @if ($image)
                <div class="relative lg:block">
                    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600/20 to-emerald-600/20 rounded-3xl blur-3xl"></div>
                    <img src="{{ $image }}" alt="" class="relative w-full rounded-2xl shadow-2xl" loading="eager" />
                </div>
            @endif
        </div>
    </div>
</section>
