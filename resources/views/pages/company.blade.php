@extends('layouts.app')

@section('title', 'StarLab | Chi Siamo')
@section('og-title', 'StarLab | Chi Siamo')
@section('og-description', 'Scopri il team di StarLab. Esperti in innovazione, design e sviluppo web.')

@section('content')
<div class="pt-32 pb-20 min-h-screen transition-colors duration-300 dark:bg-zinc-950">
  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-24 animate-in slide-in-from-bottom-5 duration-700">
      <h1 class="text-4xl md:text-6xl font-black mb-6 uppercase tracking-tighter dark:text-white text-slate-900">
        Chi <span class="text-yellow-500">Siamo</span>
      </h1>
      <p class="font-medium max-w-3xl mx-auto text-xl leading-relaxed dark:text-zinc-400 text-slate-600">
        Siamo un team di esperti appassionati di design e tecnologia, dedicati a trasformare le tue idee in realtà digitali innovative.
      </p>
    </div>

    <div class="glass-card rounded-3xl p-8 md:p-12 mb-24 border dark:border-indigo-500/20 dark:bg-zinc-900/50 border-indigo-500/20">
      <div class="text-center max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl font-black text-yellow-500 mb-4 uppercase tracking-tighter">La Nostra Missione</h2>
        <p class="font-medium dark:text-zinc-400 text-slate-600">
          Il nostro obiettivo è fornire eccellenza digitale attraverso quattro pilastri fondamentali.
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
        <div class="flex gap-4 p-6 rounded-2xl border transition-colors shadow-sm dark:bg-zinc-800/50 dark:border-zinc-700 dark:hover:border-indigo-500 bg-white border-slate-200 hover:border-indigo-400">
          <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 dark:bg-zinc-700 dark:text-indigo-400 bg-indigo-50 text-indigo-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
          </div>
          <div>
            <h3 class="font-bold text-lg mb-1 dark:text-white text-slate-900">Innovazione</h3>
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Sviluppiamo soluzioni digitali all'avanguardia che superano le aspettative dei nostri clienti.</p>
          </div>
        </div>

        <div class="flex gap-4 p-6 rounded-2xl border transition-colors shadow-sm dark:bg-zinc-800/50 dark:border-zinc-700 dark:hover:border-blue-500 bg-white border-slate-200 hover:border-blue-400">
          <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 dark:bg-zinc-700 dark:text-blue-400 bg-blue-50 text-blue-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div>
            <h3 class="font-bold text-lg mb-1 dark:text-white text-slate-900">Esperienza</h3>
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Creiamo interfacce utente intuitive e coinvolgenti che trasformano il modo in cui le persone interagiscono con la tecnologia.</p>
          </div>
        </div>

        <div class="flex gap-4 p-6 rounded-2xl border transition-colors shadow-sm dark:bg-zinc-800/50 dark:border-zinc-700 dark:hover:border-purple-500 bg-white border-slate-200 hover:border-purple-400">
          <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 dark:bg-zinc-700 dark:text-purple-400 bg-purple-50 text-purple-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
          </div>
          <div>
            <h3 class="font-bold text-lg mb-1 dark:text-white text-slate-900">Supporto</h3>
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Offriamo un'assistenza continua e personalizzata per garantire il successo a lungo termine dei tuoi progetti.</p>
          </div>
        </div>

        <div class="flex gap-4 p-6 rounded-2xl border transition-colors shadow-sm dark:bg-zinc-800/50 dark:border-zinc-700 dark:hover:border-cyan-500 bg-white border-slate-200 hover:border-cyan-400">
          <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 dark:bg-zinc-700 dark:text-cyan-400 bg-cyan-50 text-cyan-600">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 17a1 1 0 0 1 1 1c0 1.5-.6 2.4-1.8 2.8-1.3.5-2.7.2-3.7-.6"/><path d="M18 17a1 1 0 0 0 1 1c1.5 0 2.4-.6 2.8-1.8.5-1.3.2-2.7-.6-3.7"/><path d="M20 3c.5.5 1 1.5 1 3 0 2-1 4-3 6"/><path d="M4 3c-.5.5-1 1.5-1 3 0 2 1 4 3 6"/><path d="M8 17v-3c0-2.2 1.8-4 4-4s4 1.8 4 4v3"/><path d="M3 12c0 1.5.5 3 2 4"/><path d="M21 12c0 1.5-.5 3-2 4"/></svg>
          </div>
          <div>
            <h3 class="font-bold text-lg mb-1 dark:text-white text-slate-900">Partnership</h3>
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Siamo il tuo partner di fiducia per la trasformazione digitale del tuo business.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-24">
      <h2 class="text-3xl md:text-5xl font-black text-center mb-4 uppercase tracking-tighter dark:text-white text-slate-900">Il Nostro Dream Team</h2>
      <p class="font-medium text-center max-w-2xl mx-auto mb-16 dark:text-zinc-400 text-slate-600">
        Un gruppo affiatato di professionisti con competenze diverse e complementari, uniti dalla passione per l'innovazione digitale.
      </p>

      <div class="mb-12 glass-card rounded-3xl p-8 border shadow-xl dark:bg-zinc-900/50 dark:border-pink-500/20 dark:shadow-pink-500/5 border-pink-500/20 shadow-pink-500/5">
        <div class="text-center mb-8">
          <h3 class="text-2xl font-black text-pink-600 mb-2 uppercase tracking-tight">StarGraphics</h3>
          <p class="font-medium text-sm dark:text-zinc-500 text-slate-500">Dove la creatività incontra la tecnologia</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 justify-center max-w-2xl mx-auto">

          <div class="glass p-6 rounded-2xl text-center transition-colors dark:hover:bg-zinc-800 hover:bg-pink-50">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-pink-500 shadow-[0_0_15px_rgba(236,72,153,0.2)]">
              <img src="{{ asset('images/company/pottonenazionale.jpg') }}" alt="Pottone" class="w-full h-full object-cover" />
            </div>
            <h4 class="font-bold text-lg dark:text-white text-slate-900">PottoneNazionale</h4>
            <p class="text-pink-600 text-sm font-black uppercase tracking-wider mb-4">Creative Director</p>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Visionario del design con un occhio per i dettagli unici.</p>
          </div>

          <div class="glass p-6 rounded-2xl text-center transition-colors dark:hover:bg-zinc-800 hover:bg-pink-50">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-pink-500 shadow-[0_0_15px_rgba(236,72,153,0.2)]">
              <img src="{{ asset('images/company/phill.jpg') }}" alt="Phill" class="w-full h-full object-cover" />
            </div>
            <h4 class="font-bold text-lg dark:text-white text-slate-900">Phill</h4>
            <p class="text-pink-600 text-sm font-black uppercase tracking-wider mb-4">Graphic Designer</p>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Specialista in UI Design e identità visiva.</p>
          </div>

        </div>
      </div>

      <div class="mb-12 glass-card rounded-3xl p-8 border shadow-xl dark:bg-zinc-900/50 dark:border-blue-500/20 dark:shadow-blue-500/5 border-blue-500/20 shadow-blue-500/5">
        <div class="text-center mb-8">
          <h3 class="text-2xl font-black text-blue-600 mb-2 uppercase tracking-tight">StarWeb</h3>
          <p class="font-medium text-sm dark:text-zinc-500 text-slate-500">Innovazione digitale al servizio del tuo business</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 justify-center max-w-2xl mx-auto">

          <div class="glass p-6 rounded-2xl text-center transition-colors dark:hover:bg-zinc-800 hover:bg-blue-50">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-blue-500 shadow-[0_0_15px_rgba(59,130,246,0.2)]">
              <img src="{{ asset('images/company/phill.jpg') }}" alt="Phill" class="w-full h-full object-cover" />
            </div>
            <h4 class="font-bold text-lg dark:text-white text-slate-900">Phill</h4>
            <p class="text-blue-600 text-sm font-black uppercase tracking-wider mb-4">Frontend Developer</p>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Specializzato in React, Vue e architetture scalabili.</p>
          </div>

          <div class="glass p-6 rounded-2xl text-center transition-colors dark:hover:bg-zinc-800 hover:bg-blue-50">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-blue-500 shadow-[0_0_15px_rgba(59,130,246,0.2)]">
              <img src="{{ asset('images/company/matt.jpg') }}" alt="Matt" class="w-full h-full object-cover" />
            </div>
            <h4 class="font-bold text-lg dark:text-white text-slate-900">Matt</h4>
            <p class="text-blue-600 text-sm font-black uppercase tracking-wider mb-4">Full Stack Developer</p>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Esperto in Backend, API e gestione sistemi complessi.</p>
          </div>

        </div>
      </div>

      <div class="glass-card rounded-3xl p-8 border shadow-xl dark:bg-zinc-900/50 dark:border-yellow-500/20 dark:shadow-yellow-500/5 border-yellow-500/20 shadow-yellow-500/5">
        <div class="text-center mb-8">
          <h3 class="text-2xl font-black text-yellow-500 mb-2 uppercase tracking-tight">Helpers</h3>
          <p class="font-medium text-sm dark:text-zinc-500 text-slate-500">Il supporto fondamentale dietro ai nostri progetti</p>
        </div>
        <div class="flex justify-center max-w-2xl mx-auto">

          <div class="glass p-6 rounded-2xl text-center transition-colors dark:hover:bg-zinc-800 hover:bg-yellow-50 max-w-[300px] w-full">
            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4 border-2 border-yellow-500 shadow-[0_0_15px_rgba(234,179,8,0.2)]">
              <img src="{{ asset('images/company/v0id.jpg') }}" alt="v0id" class="w-full h-full object-cover" />
            </div>
            <h4 class="font-bold text-lg dark:text-white text-slate-900">v0id</h4>
            <p class="text-yellow-500 text-sm font-black uppercase tracking-wider mb-4">Helper</p>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Ci aiuta a capire se la direzione del design è quella giusta o se va perfezionata.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="mb-12">
      <h2 class="text-3xl font-black text-center mb-12 uppercase tracking-tighter dark:text-white text-slate-900">I Nostri Valori</h2>
      <div class="grid md:grid-cols-3 gap-8">

        <div class="group glass-card p-8 rounded-2xl text-center border shadow-sm transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-indigo-500/10 dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-indigo-500/50 border-slate-200 hover:border-indigo-300">
          <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12 dark:bg-zinc-800 dark:text-indigo-400 dark:border-zinc-700 bg-indigo-50 text-indigo-600 border border-indigo-100">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-4 transition-colors group-hover:text-indigo-500 dark:text-white text-slate-900">Innovazione</h3>
          <p class="text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">Ricerca continua di soluzioni innovative per soddisfare le esigenze dei nostri clienti.</p>
        </div>

        <div class="group glass-card p-8 rounded-2xl text-center border shadow-sm transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-purple-500/10 dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-purple-500/50 border-slate-200 hover:border-purple-300">
          <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-12 dark:bg-zinc-800 dark:text-purple-400 dark:border-zinc-700 bg-purple-50 text-purple-600 border border-purple-100">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-4 transition-colors group-hover:text-purple-500 dark:text-white text-slate-900">Collaborazione</h3>
          <p class="text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">Lavoriamo insieme ai nostri clienti per raggiungere obiettivi comuni.</p>
        </div>

        <div class="group glass-card p-8 rounded-2xl text-center border shadow-sm transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-pink-500/10 dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-pink-500/50 border-slate-200 hover:border-pink-300">
          <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12 dark:bg-zinc-800 dark:text-pink-400 dark:border-zinc-700 bg-pink-50 text-pink-600 border border-pink-100">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-4 transition-colors group-hover:text-pink-500 dark:text-white text-slate-900">Qualità</h3>
          <p class="text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">Ci impegniamo a fornire soluzioni di alta qualità che superano le aspettative.</p>
        </div>

      </div>
    </div>

  </div>
</div>
@endsection
