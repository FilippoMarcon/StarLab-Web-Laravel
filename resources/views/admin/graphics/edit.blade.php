@extends('admin.layouts.app')

@section('title', 'StarLab Admin | Modifica Grafica')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.graphics.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna alle grafiche</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">Modifica: {{ $graphic->title }}</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <form method="POST" action="{{ route('admin.graphics.update', $graphic) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Titolo</label>
                <input type="text" name="title" value="{{ old('title', $graphic->title) }}" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Descrizione</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('description', $graphic->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">Prezzo Standard (&euro;)</label>
                    <input type="number" step="0.01" name="price_standard" value="{{ old('price_standard', $graphic->price_standard) }}" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-300 mb-2">Prezzo Premium (&euro;)</label>
                    <input type="number" step="0.01" name="price_premium" value="{{ old('price_premium', $graphic->price_premium) }}" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Nuova Immagine (lascia vuoto per mantenere quella attuale)</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-300 mb-2">Aggiungi File Sorgente</label>
                <input type="file" name="source_files[]" multiple
                    class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer">
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ $graphic->is_published ? 'checked' : '' }}
                    class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
                <label for="is_published" class="text-sm font-bold text-slate-300">Pubblicata</label>
            </div>
            <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
                Salva Modifiche
            </button>
        </form>
    </div>

    <div>
        <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl">
            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Anteprima</h3>
            <img src="{{ asset('storage/' . $graphic->image_watermarked) }}" alt="{{ $graphic->title }}" class="w-full rounded-xl mb-4">
            <p class="text-xs text-slate-500">Questa è l'anteprima con watermark visibile ai clienti.</p>
        </div>

        @if ($graphic->files->count() > 0)
            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl mt-4">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">File Sorgente ({{ $graphic->files->count() }})</h3>
                <ul class="space-y-2">
                    @foreach ($graphic->files as $file)
                        <li class="flex items-center justify-between gap-2 p-2 bg-slate-800/50 rounded-lg">
                            <span class="text-sm text-slate-300 truncate">{{ $file->filename }}</span>
                            <form method="POST" action="{{ route('admin.graphics.file.delete', $file) }}" onsubmit="return confirm('Eliminare questo file?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 text-xs font-bold">Elimina</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
