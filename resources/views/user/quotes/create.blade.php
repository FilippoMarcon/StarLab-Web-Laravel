@extends('user.layouts.app')

@section('title', 'StarLab | Nuova Richiesta')

@section('content')
<div class="mb-8">
    <a href="{{ route('user.quotes.index') }}" class="text-amber-500 hover:text-amber-400 text-sm font-bold">&larr; Torna alle richieste</a>
    <h1 class="text-3xl font-black text-white uppercase tracking-tight mt-2">Nuova Richiesta</h1>
    <p class="text-slate-400 text-sm mt-1">Descrivici cosa ti serve e ti risponderemo in meno di 24 ore.</p>
</div>

<form method="POST" action="{{ route('user.quotes.store') }}" class="max-w-2xl space-y-6" enctype="multipart/form-data">
    @csrf

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Tipo di Servizio *</label>
        <select name="service_type" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
            <option value="">Seleziona un servizio</option>
            <option value="Logo Design">Logo Design</option>
            <option value="Thumbnail & Social">Thumbnail &amp; Social</option>
            <option value="Banner">Banner</option>
            <option value="Grafica Avanzata">Grafica Avanzata</option>
            <option value="Sviluppo Web">Sviluppo Web</option>
            <option value="Bundle / Pack">Bundle / Pack</option>
            <option value="Altro">Altro</option>
        </select>
        @error('service_type') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Telefono (opzionale)</label>
        <input type="text" name="phone" value="{{ old('phone') }}"
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">Descrizione del Progetto *</label>
        <textarea name="description" rows="6" required
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all resize-y">{{ old('description') }}</textarea>
        @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-bold text-slate-300 mb-2">References / Allegati (opzionale)</label>
        <input type="file" name="files[]" multiple
            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 focus:ring-2 focus:ring-amber-500 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:text-sm hover:file:bg-amber-400 file:cursor-pointer file:transition-all">
        <p class="text-xs text-slate-500 mt-1">Qualsiasi tipo di file. Max 25MB per file.</p>
        @error('files.*') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <button type="submit"
        class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25">
        Invia Richiesta
    </button>
</form>
@endsection
