@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Nuova Grafica')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.graphics.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna alle grafiche</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">Nuova Grafica</h1>
</div>

<form method="POST" action="{{ route('admin.graphics.store') }}" enctype="multipart/form-data" class="max-w-2xl space-y-6">
    @csrf
    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Titolo</label>
        <input type="text" name="title" value="{{ old('title') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Descrizione</label>
        <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('description') }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Prezzo Standard (&euro;)</label>
            <input type="number" step="0.01" name="price_standard" value="{{ old('price_standard') }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Prezzo Premium (&euro;)</label>
            <input type="number" step="0.01" name="price_premium" value="{{ old('price_premium') }}" required
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Immagine (max 50MB)</label>
        <input type="file" name="image" accept="image/*" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer">
        @error('image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">File Sorgente (PSD, AI, SVG, ecc. - opzionale, max 500MB cad.)</label>
        <input type="file" name="source_files[]" multiple
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer">
    </div>

    <div class="flex items-center gap-3">
        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
            class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
        <label for="is_published" class="text-sm font-bold text-slate-300">Pubblica subito</label>
    </div>

    <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
        Carica Grafica
    </button>
</form>
@endsection
