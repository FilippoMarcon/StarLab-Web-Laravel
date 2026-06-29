@props([
    'title' => '',
    'description' => '',
    'icon' => null,
    'price' => null,
    'slug' => '',
])

<a href="{{ $slug ? route('servizi.show', $slug) : '#' }}"
   class="group block p-6 sm:p-8 rounded-2xl bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300 hover:-translate-y-1 shadow-lg shadow-black/20">
    @if ($icon)
        <div class="w-12 h-12 rounded-xl bg-indigo-600/20 flex items-center justify-center mb-5 text-2xl">
            {{ $icon }}
        </div>
    @endif
    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-indigo-300 transition-colors">{{ $title }}</h3>
    <p class="text-slate-400 leading-relaxed mb-4">{{ $description }}</p>
    @if ($price)
        <p class="text-sm font-bold text-emerald-400">A partire da {{ $price }}</p>
    @endif
</a>
