@extends('layouts.app')

@section('title', 'Contatti | StarLab')
@section('og-title', 'StarLab | Contattami - Richiedi un Preventivo')
@section('og-description', 'Richiedi un preventivo gratuito per il tuo progetto di graphic design. Logo, branding, social media design e molto altro.')

@section('content')

<section class="pt-32 pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <div class="text-center mb-16">
            <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Contatti</span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mt-3">Richiedi il tuo preventivo gratuito</h1>
            <p class="text-slate-400 mt-4 max-w-xl mx-auto">Raccontami la tua idea. Ti rispondo io entro 24h con un preventivo chiaro, senza impegno. Niente chiamate, niente pressioni.</p>
        </div>

        @if (session('success'))
            <div class="mb-8 p-4 rounded-xl bg-emerald-900/40 border border-emerald-700 text-emerald-300 text-sm font-bold">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contatti.send') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-300 mb-2">Nome *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none" />
                    @error('name') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-300 mb-2">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none" />
                    @error('email') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="project_type" class="block text-sm font-bold text-slate-300 mb-2">Tipo di progetto *</label>
                <select id="project_type" name="project_type" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none">
                    <option value="" class="bg-slate-900">Seleziona...</option>
                    <option value="logo-design" class="bg-slate-900" @selected(old('project_type') === 'logo-design')>Logo Design</option>
                    <option value="branding" class="bg-slate-900" @selected(old('project_type') === 'branding')>Branding Completo</option>
                    <option value="social-media" class="bg-slate-900" @selected(old('project_type') === 'social-media')>Social Media Design</option>
                    <option value="print" class="bg-slate-900" @selected(old('project_type') === 'print')>Print Design</option>
                    <option value="web" class="bg-slate-900" @selected(old('project_type') === 'web')>Sviluppo Web</option>
                    <option value="other" class="bg-slate-900" @selected(old('project_type') === 'other')>Altro</option>
                </select>
                @error('project_type') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-slate-300 mb-2">Descrivi il progetto *</label>
                <textarea id="description" name="description" rows="5" required
                          class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none"
                          placeholder="Raccontami la tua idea, i colori che preferisci, lo stile che immagini...">{{ old('description') }}</textarea>
                @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label for="budget" class="block text-sm font-bold text-slate-300 mb-2">Budget indicativo</label>
                    <select id="budget" name="budget"
                            class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none">
                        <option value="" class="bg-slate-900">Non specificato</option>
                        <option value="<50" class="bg-slate-900" @selected(old('budget') === '<50')>Meno di €50</option>
                        <option value="50-100" class="bg-slate-900" @selected(old('budget') === '50-100')>€50 - €100</option>
                        <option value="100-200" class="bg-slate-900" @selected(old('budget') === '100-200')>€100 - €200</option>
                        <option value="200-500" class="bg-slate-900" @selected(old('budget') === '200-500')>€200 - €500</option>
                        <option value=">500" class="bg-slate-900" @selected(old('budget') === '>500')>Più di €500</option>
                    </select>
                </div>
                <div>
                    <label for="deadline" class="block text-sm font-bold text-slate-300 mb-2">Deadline desiderata</label>
                    <input type="text" id="deadline" name="deadline" value="{{ old('deadline') }}"
                           class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors outline-none"
                           placeholder="es. Tra 2 settimane" />
                </div>
            </div>

            <button type="submit"
                    class="w-full px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-indigo-600/25">
                Invia richiesta
                <svg class="w-5 h-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>

            <p class="text-center text-xs text-slate-500">Riceverai una risposta entro 24h. Nessun impegno, nessun pagamento anticipato.</p>
        </form>
    </div>
</section>

<div class="border-t border-slate-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h2 class="text-xl font-bold text-white mb-4">Preferisci scrivermi direttamente?</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="mailto:starlabdesignstore@gmail.com" class="inline-flex items-center px-6 py-3 border border-slate-700 hover:border-slate-500 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-200">
                starlabdesignstore@gmail.com
            </a>
        </div>
    </div>
</div>

@endsection
