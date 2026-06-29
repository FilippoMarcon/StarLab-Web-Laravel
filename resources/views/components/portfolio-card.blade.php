@props([
    'image' => '',
    'title' => '',
    'category' => '',
    'slug' => '',
])

<a href="{{ route('portfolio.show', $slug) }}"
   class="group block rounded-2xl overflow-hidden bg-slate-900 border border-slate-800 hover:border-indigo-600/50 transition-all duration-300 hover:-translate-y-1 shadow-lg shadow-black/20">
    <div class="aspect-[4/3] overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
             loading="lazy" />
    </div>
    <div class="p-5">
        <span class="text-xs font-bold text-indigo-400 uppercase tracking-wider">{{ $category }}</span>
        <h3 class="text-lg font-bold text-white mt-1 group-hover:text-indigo-300 transition-colors">{{ $title }}</h3>
    </div>
</a>
