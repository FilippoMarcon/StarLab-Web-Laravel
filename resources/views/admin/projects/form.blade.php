@extends('admin.layouts.app')

@section('title', 'StarLab Admin | ' . ($project ? 'Modifica Progetto' : 'Nuovo Progetto'))

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.projects.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna ai progetti</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">{{ $project ? 'Modifica: ' . $project->title : 'Nuovo Progetto' }}</h1>
</div>

<form method="POST" action="{{ $project ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data" class="max-w-2xl space-y-6">
    @csrf
    @if ($project) @method('PUT') @endif

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Titolo</label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Categoria</label>
        <input type="text" name="category" value="{{ old('category', $project->category ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('category') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Descrizione</label>
        <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('description', $project->description ?? '') }}</textarea>
        @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Problema</label>
        <textarea name="problem" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('problem', $project->problem ?? '') }}</textarea>
        @error('problem') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Soluzione</label>
        <textarea name="solution" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('solution', $project->solution ?? '') }}</textarea>
        @error('solution') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Concept</label>
        <textarea name="concept" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('concept', $project->concept ?? '') }}</textarea>
        @error('concept') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Nome Cliente</label>
        <input type="text" name="client_name" value="{{ old('client_name', $project->client_name ?? '') }}"
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('client_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Immagine Copertina</label>
        <input type="file" name="cover_image" accept="image/*"
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer hover:file:bg-amber-400 transition-all">
        @error('cover_image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        @if ($project && $project->cover_image)
            <div class="mt-3">
                <img src="{{ $project->cover_image }}" alt="" class="w-48 rounded-xl border border-slate-700">
                <p class="text-xs text-slate-500 mt-1">Copertina attuale. Carica un nuovo file per sostituirla.</p>
            </div>
        @endif
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Galleria Immagini</label>
        <input type="file" name="gallery_images[]" multiple accept="image/*"
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer hover:file:bg-amber-400 transition-all">
        <p class="text-xs text-slate-500 mt-1">Puoi selezionare più immagini.</p>
        @if ($project && $project->images->isNotEmpty())
            <div class="mt-3 grid grid-cols-3 gap-3">
                @foreach ($project->images as $img)
                    <div class="relative group">
                        <img src="{{ $img->image_path }}" alt="{{ $img->alt_text }}" class="w-full h-24 object-cover rounded-xl border border-slate-700">
                        <a href="{{ route('admin.projects.image.destroy', $img) }}" onclick="return confirm('Eliminare questa immagine?')"
                           class="absolute top-1 right-1 w-6 h-6 bg-red-600/80 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                            &times;
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center gap-3">
            <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $project->featured ?? false) ? 'checked' : '' }}
                class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
            <label for="featured" class="text-sm font-bold text-slate-300">In Evidenza</label>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Ordine</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('sort_order') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
            Salva
        </button>
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl transition-all text-center">
            Annulla
        </a>
    </div>
</form>
@endsection
