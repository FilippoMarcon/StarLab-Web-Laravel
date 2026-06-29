@extends('admin.layouts.app')

@section('title', 'StarLab Admin | ' . ($post ? 'Modifica Articolo' : 'Nuovo Articolo'))

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.posts.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna agli articoli</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">{{ $post ? 'Modifica: ' . $post->title : 'Nuovo Articolo' }}</h1>
</div>

<form method="POST" action="{{ $post ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" class="max-w-2xl space-y-6">
    @csrf
    @if ($post) @method('PUT') @endif

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Titolo</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Contenuto</label>
        <textarea name="content" rows="12" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Immagine di copertina</label>
        <input type="file" name="image" accept="image/*"
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-amber-500 file:text-white file:font-bold file:cursor-pointer hover:file:bg-amber-400 transition-all">
        @error('image') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        @if ($post && $post->image)
            <div class="mt-3">
                <img src="{{ $post->image }}" alt="" class="w-48 rounded-xl border border-slate-700">
                <p class="text-xs text-slate-500 mt-1">Immagine attuale. Carica un nuovo file per sostituirla.</p>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('meta_title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-300 mb-2">Pubblicato il</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">
            @error('published_at') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Meta Description</label>
        <textarea name="meta_description" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition-all">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
        @error('meta_description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3">
        <input type="checkbox" name="active" id="active" value="1" {{ old('active', $post->active ?? false) ? 'checked' : '' }}
            class="w-5 h-5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-500">
        <label for="active" class="text-sm font-bold text-slate-300">Attivo</label>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
            Salva
        </button>
        <a href="{{ route('admin.posts.index') }}" class="px-6 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold rounded-xl transition-all text-center">
            Annulla
        </a>
    </div>
</form>
@endsection
