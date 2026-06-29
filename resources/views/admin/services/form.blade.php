@extends('admin.layouts.app')

@section('title', 'StarLab Admin | ' . ($service ? 'Modifica Servizio' : 'Nuovo Servizio'))

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.services.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna ai servizi</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">{{ $service ? 'Modifica: ' . $service->title : 'Nuovo Servizio' }}</h1>
</div>

<form method="POST" action="{{ $service ? route('admin.services.update', $service) : route('admin.services.store') }}" class="max-w-2xl space-y-6">
    @csrf
    @if ($service) @method('PUT') @endif

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Titolo</label>
        <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Descrizione</label>
        <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('description', $service->description ?? '') }}</textarea>
        @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Contenuto</label>
        <textarea name="content" rows="6" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('content', $service->content ?? '') }}</textarea>
        @error('content') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Prezzo Da (&euro;)</label>
            <input type="number" step="0.01" name="price_from" value="{{ old('price_from', $service->price_from ?? '') }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('price_from') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Icona (classe CSS)</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('icon') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Caratteristiche <span class="text-slate-500 font-normal">(una per riga)</span></label>
        <textarea name="features" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('features', $service->features ?? '') }}</textarea>
        @error('features') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Tempi Consegna</label>
            <input type="text" name="delivery_time" value="{{ old('delivery_time', $service->delivery_time ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('delivery_time') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Revisioni</label>
            <input type="text" name="revisions" value="{{ old('revisions', $service->revisions ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('revisions') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Formati File</label>
            <input type="text" name="file_formats" value="{{ old('file_formats', $service->file_formats ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('file_formats') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center gap-3">
            <input type="checkbox" name="active" id="active" value="1" {{ old('active', $service->active ?? false) ? 'checked' : '' }}
                class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
            <label for="active" class="text-sm font-bold text-slate-300">Attivo</label>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Ordine</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('sort_order') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
            Salva
        </button>
        <a href="{{ route('admin.services.index') }}" class="px-6 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl transition-all text-center">
            Annulla
        </a>
    </div>
</form>
@endsection
