@extends('admin.layouts.app')

@section('title', 'StarLab Admin | ' . ($testimonial ? 'Modifica Testimonianza' : 'Nuova Testimonianza'))

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.testimonials.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna alle testimonianze</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">{{ $testimonial ? 'Modifica: ' . $testimonial->name : 'Nuova Testimonianza' }}</h1>
</div>

<form method="POST" action="{{ $testimonial ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="max-w-2xl space-y-6">
    @csrf
    @if ($testimonial) @method('PUT') @endif

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Nome</label>
        <input type="text" name="name" value="{{ old('name', $testimonial->name ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Testo</label>
        <textarea name="text" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('text', $testimonial->text ?? '') }}</textarea>
        @error('text') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Valutazione (1-5)</label>
            <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('rating') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Progetto</label>
            <select name="project_id" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
                <option value="">Nessun progetto</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id', $testimonial->project_id ?? '') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </select>
            @error('project_id') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center gap-3">
            <input type="checkbox" name="active" id="active" value="1" {{ old('active', $testimonial->active ?? false) ? 'checked' : '' }}
                class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
            <label for="active" class="text-sm font-bold text-slate-300">Attivo</label>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Ordine</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('sort_order') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
            Salva
        </button>
        <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl transition-all text-center">
            Annulla
        </a>
    </div>
</form>
@endsection
