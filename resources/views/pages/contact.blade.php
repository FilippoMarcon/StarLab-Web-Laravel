@extends('layouts.app')

@section('title', 'StarLab | Contattaci')
@section('og-title', 'StarLab | Contattaci - Richiedi un Preventivo')
@section('og-description', 'Contatta StarLab per richiedere un preventivo personalizzato per i tuoi progetti di graphic design e sviluppo web.')

@section('content')
<section class="relative pt-32 pb-24 overflow-hidden dark:bg-zinc-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-black mb-6 uppercase tracking-widest bg-amber-50 border border-amber-200 text-amber-600 dark:bg-amber-900/30 dark:border-amber-700 dark:text-amber-500">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Richiedi Preventivo
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 uppercase tracking-tighter text-slate-900 dark:text-white">
                Parla con <span class="text-amber-500">Noi</span>
            </h1>
            <p class="max-w-2xl mx-auto text-lg font-medium text-slate-600 dark:text-zinc-400">
                Compila il form qui sotto per ricevere un preventivo personalizzato. Ti risponderemo in meno di 24 ore.
            </p>
        </div>

        @if (session('success'))
            <div class="max-w-2xl mx-auto mb-8 p-6 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-3xl text-center">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Richiesta Inviata!</h2>
                <p class="text-slate-600 dark:text-slate-400">{{ session('success') }}</p>
                @if (session('token'))
                    <div class="mt-4 p-3 bg-slate-100 dark:bg-slate-800 rounded-xl">
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Link per monitorare la richiesta:</p>
                        <div class="flex items-center gap-2">
                            <input type="text" readonly value="{{ route('preventivo.show', session('token')) }}"
                                class="flex-1 px-3 py-2 text-xs bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-lg text-slate-700 dark:text-slate-300 select-all"
                                onclick="this.select()">
                            <button onclick="navigator.clipboard.writeText(this.previousElementSibling.value);this.textContent='Copiato!';setTimeout(()=>this.textContent='Copia',2000)"
                                class="px-3 py-2 bg-amber-500 hover:bg-amber-400 text-white text-xs font-bold rounded-lg transition-all whitespace-nowrap">Copia</button>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="max-w-2xl mx-auto">
            <form method="POST" action="{{ route('quote.store') }}" class="glass-card p-10 rounded-3xl border border-slate-200 dark:border-slate-800 space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nome e Cognome *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Telefono (opzionale)</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tipo di Servizio *</label>
                    <select name="service_type" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all">
                        <option value="">Seleziona un servizio</option>
                        <option value="Logo Design" {{ old('service_type') === 'Logo Design' ? 'selected' : '' }}>Logo Design</option>
                        <option value="Thumbnail & Social" {{ old('service_type') === 'Thumbnail & Social' ? 'selected' : '' }}>Thumbnail &amp; Social</option>
                        <option value="Banner" {{ old('service_type') === 'Banner' ? 'selected' : '' }}>Banner</option>
                        <option value="Grafica Avanzata" {{ old('service_type') === 'Grafica Avanzata' ? 'selected' : '' }}>Grafica Avanzata</option>
                        <option value="Sviluppo Web" {{ old('service_type') === 'Sviluppo Web' ? 'selected' : '' }}>Sviluppo Web</option>
                        <option value="Bundle / Pack" {{ old('service_type') === 'Bundle / Pack' ? 'selected' : '' }}>Bundle / Pack</option>
                        <option value="Altro" {{ old('service_type') === 'Altro' ? 'selected' : '' }}>Altro</option>
                    </select>
                    @error('service_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Descrizione del Progetto *</label>
                    <textarea name="description" rows="5" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-amber-500 outline-none transition-all resize-y">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">References / Allegati (opzionale)</label>
                    <input type="file" name="files[]" multiple
                        class="w-full px-4 py-3 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-300 focus:ring-2 focus:ring-amber-500 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-amber-500 file:text-white file:font-bold file:text-sm hover:file:bg-amber-400 file:cursor-pointer file:transition-all">
                    <p class="text-xs text-slate-500 dark:text-slate-500 mt-1">Qualsiasi tipo di file. Max 25MB per file.</p>
                    @error('files.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                    class="w-full py-4 bg-amber-500 hover:bg-amber-400 text-white font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-amber-500/25 flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Invia Richiesta
                </button>
            </form>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-3xl mx-auto mt-12">
            <div class="p-8 rounded-3xl border text-center transition-all bg-white/50 border-slate-100 dark:bg-zinc-900/30 dark:border-zinc-800">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-amber-50 text-amber-600 dark:bg-zinc-800 dark:text-amber-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-slate-900 dark:text-white">Email</h3>
                <p class="text-sm font-medium text-slate-500 dark:text-zinc-400">starlabdesignstore@gmail.com</p>
            </div>
            <div class="p-8 rounded-3xl border text-center transition-all bg-white/50 border-slate-100 dark:bg-zinc-900/30 dark:border-zinc-800">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-emerald-50 text-emerald-600 dark:bg-zinc-800 dark:text-emerald-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-slate-900 dark:text-white">Tempo Risposta</h3>
                <p class="text-sm font-medium text-slate-500 dark:text-zinc-400">Meno di 24 ore lavorative</p>
            </div>
            <div class="p-8 rounded-3xl border text-center transition-all bg-white/50 border-slate-100 dark:bg-zinc-900/30 dark:border-zinc-800">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-blue-50 text-blue-600 dark:bg-zinc-800 dark:text-blue-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-slate-900 dark:text-white">Staff Dedicato</h3>
                <p class="text-sm font-medium text-slate-500 dark:text-zinc-400">PottoneNazionale &amp; Phill</p>
            </div>
        </div>

        <div class="mt-16 text-center">
            <div class="p-8 rounded-3xl border backdrop-blur-sm relative overflow-hidden transition-colors bg-white/50 border-slate-200 dark:bg-zinc-900/50 dark:border-zinc-800">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 via-yellow-500 to-amber-500"></div>
                <p class="italic text-lg relative z-10 font-medium text-slate-600 dark:text-zinc-400">
                    "Trasformiamo le tue idee in realt&agrave; digitale. Un messaggio alla volta."
                </p>
            </div>
        </div>

    </div>
</section>
@endsection
