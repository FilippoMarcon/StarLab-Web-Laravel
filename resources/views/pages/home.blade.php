@extends('layouts.app')

@section('title', 'StarLab | Innovazione Digitale - Web & Graphic Design')
@section('og-title', 'StarLab | Agenzia Digitale - Web & Graphic Design')
@section('og-description', 'Trasformiamo le tue idee in realtà digitali. Sviluppo web, graphic design, branding e molto altro.')

@section('content')
{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center pt-20 overflow-hidden transition-colors duration-300 dark:bg-zinc-950 bg-[#fcfbf8]">
  <div class="absolute inset-0 z-0">
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-yellow-400/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-indigo-200/5 rounded-full blur-[120px]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#e2e8f0_1px,transparent_1px),linear-gradient(to_bottom,#e2e8f0_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-[0.5]"></div>
  </div>
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center w-full z-10">
    <div class="space-y-10 text-center lg:text-left">
      <div class="space-y-6">
        <h1 class="text-6xl lg:text-8xl font-black tracking-tighter leading-[0.85] uppercase dark:text-white text-slate-900">
          StarLab
          <span class="block text-yellow-500">Design</span>
        </h1>
        <p class="text-xl max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed dark:text-zinc-400 text-slate-600">
          Elevating brands through strategic digital experiences. We blend <span class="dark:text-white text-slate-900 font-bold">technical precision</span> with <span class="dark:text-white text-slate-900 font-bold">creative vision</span> to build the next generation of digital products.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start">
        <a href="{{ route('contact') }}" class="group px-10 py-5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-bold transition-all shadow-xl shadow-slate-900/10 flex items-center justify-center gap-3 cursor-pointer">
          Start Project
          <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </a>
        <a href="{{ route('portfolio') }}" class="px-10 py-5 rounded-xl font-bold transition-all flex items-center justify-center gap-3 shadow-sm cursor-pointer dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:text-white dark:border-zinc-700 dark:hover:border-zinc-600 bg-white hover:bg-slate-50 border border-slate-200 text-slate-900 hover:border-slate-300">
          Our Work
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </a>
      </div>
      <div class="pt-10 flex items-center justify-center lg:justify-start gap-10 border-t dark:border-zinc-800 border-slate-200">
        <div>
          <div class="text-3xl font-bold dark:text-white text-slate-900">50+</div>
          <div class="text-[10px] uppercase tracking-[0.2em] font-black dark:text-zinc-500 text-slate-500">Projects</div>
        </div>
        <div class="w-px h-10 dark:bg-zinc-800 bg-slate-200"></div>
        <div>
          <div class="text-3xl font-bold dark:text-white text-slate-900">24/7</div>
          <div class="text-[10px] uppercase tracking-[0.2em] font-black dark:text-zinc-500 text-slate-500">Support</div>
        </div>
      </div>
    </div>
    <div class="relative flex justify-center lg:justify-end group">
      <div class="relative w-full max-w-[500px] aspect-square flex items-center justify-center">
        <div class="absolute inset-0 bg-yellow-400/20 blur-[120px] rounded-full opacity-50 group-hover:opacity-100 transition-opacity duration-1000"></div>
        <div class="relative z-10 transition-all duration-1000 ease-[cubic-bezier(0.23,1,0.32,1)] group-hover:scale-110 group-hover:rotate-3">
          <img src="{{ asset('images/StarLab-Logo.png') }}" alt="StarLab Logo" class="w-48 h-48 lg:w-72 lg:h-72 object-contain drop-shadow-[0_0_30px_rgba(250,204,21,0.3)]" loading="eager" width="288" height="288" />
        </div>
        <div class="absolute top-0 right-0 w-24 h-24 border-t border-r border-yellow-400/40 rounded-tr-[40px] transition-all duration-1000 group-hover:translate-x-2 group-hover:-translate-y-2"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 border-b border-l border-yellow-400/40 rounded-bl-[40px] transition-all duration-1000 group-hover:-translate-x-2 group-hover:translate-y-2"></div>
        <div class="absolute inset-[-20px] rounded-full pointer-events-none opacity-50 dark:border-zinc-800 border-slate-200"></div>
        <div class="absolute inset-[-60px] rounded-full pointer-events-none opacity-30 dark:border-zinc-800/50 border-slate-200/50"></div>
      </div>
    </div>
  </div>
</section>

{{-- Services Section --}}
<section class="py-24 transition-colors duration-300 dark:bg-zinc-900/50 bg-white/50" id="services">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-5xl font-black mb-4 uppercase tracking-tighter dark:text-white text-slate-900">I Nostri <span class="text-yellow-500">Servizi</span></h2>
      <div class="w-24 h-1 bg-yellow-400/30 mx-auto rounded-full"></div>
    </div>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="group glass-card p-10 rounded-3xl relative overflow-hidden transition-colors dark:bg-zinc-800/50">
        <div class="absolute top-0 right-0 w-64 h-64 bg-pink-600/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2 group-hover:bg-pink-600/20 transition-all"></div>
        <div class="relative z-10">
          <div class="w-14 h-14 bg-pink-500/20 rounded-2xl flex items-center justify-center mb-6 text-pink-500 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
          </div>
          <h3 class="text-2xl font-bold mb-3 dark:text-white text-slate-900">StarGraphics</h3>
          <p class="mb-8 leading-relaxed dark:text-zinc-400 text-slate-600">Design grafico professionale per ogni esigenza. Creiamo loghi, branding, materiali promozionali e interfacce utente che catturano l'attenzione.</p>
          <a href="{{ route('stargraphics') }}" class="w-full block text-center py-4 rounded-xl bg-gradient-to-r from-pink-600 to-purple-600 text-white font-semibold group-hover:shadow-[0_0_20px_rgba(219,39,119,0.4)] transition-all cursor-pointer">
            Scopri di più
            <svg class="w-4 h-4 inline ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
      <div class="group glass-card p-10 rounded-3xl relative overflow-hidden transition-colors dark:bg-zinc-800/50">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-600/20 transition-all"></div>
        <div class="relative z-10">
          <div class="w-14 h-14 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-6 text-blue-500 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
          </div>
          <h3 class="text-2xl font-bold mb-3 dark:text-white text-slate-900">StarWeb</h3>
          <p class="mb-8 leading-relaxed dark:text-zinc-400 text-slate-600">Sviluppo web su misura per il tuo business. Creiamo siti web moderni e siti statici ad alte prestazioni ottimizzati per la velocità e la conversione.</p>
          <a href="{{ route('starweb') }}" class="w-full block text-center py-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold group-hover:shadow-[0_0_20px_rgba(79,70,229,0.4)] transition-all cursor-pointer">
            Scopri di più
            <svg class="w-4 h-4 inline ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Features Section --}}
<section class="py-24 relative transition-colors duration-300 dark:bg-zinc-950">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-5xl font-black text-center mb-16 uppercase tracking-tighter dark:text-white text-slate-900">Perché Scegliere <span class="text-yellow-500">Noi?</span></h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="group glass-card p-8 rounded-2xl text-center hover:-translate-y-2 transition-all duration-300 border dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-yellow-500/50 bg-white/50 border-slate-200 hover:bg-white hover:border-yellow-400/50">
        <div class="mx-auto w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-yellow-400/10 group-hover:bg-yellow-400/20 transition-colors">
          <svg class="w-8 h-8 text-yellow-500 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
        </div>
        <h3 class="text-xl font-bold mb-3 group-hover:text-yellow-600 transition-colors dark:text-white text-slate-900">Design Unico</h3>
        <p class="text-sm leading-relaxed group-hover:text-slate-700 transition-colors dark:text-zinc-400 text-slate-600">Interfacce moderne e intuitive che catturano l'attenzione e migliorano l'esperienza utente.</p>
      </div>
      <div class="group glass-card p-8 rounded-2xl text-center hover:-translate-y-2 transition-all duration-300 border dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-blue-500/50 bg-white/50 border-slate-200 hover:bg-white hover:border-blue-500/50">
        <div class="mx-auto w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors">
          <svg class="w-8 h-8 text-blue-500 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <h3 class="text-xl font-bold mb-3 group-hover:text-blue-600 transition-colors dark:text-white text-slate-900">Totalmente Responsive</h3>
        <p class="text-sm leading-relaxed group-hover:text-slate-700 transition-colors dark:text-zinc-400 text-slate-600">Adattabilità perfetta su tutti i dispositivi: desktop, tablet e mobile.</p>
      </div>
      <div class="group glass-card p-8 rounded-2xl text-center hover:-translate-y-2 transition-all duration-300 border dark:bg-zinc-900/50 dark:border-zinc-800 dark:hover:border-pink-500/50 bg-white/50 border-slate-200 hover:bg-white hover:border-pink-500/50">
        <div class="mx-auto w-16 h-16 mb-6 flex items-center justify-center rounded-2xl bg-pink-500/10 group-hover:bg-pink-500/20 transition-colors">
          <svg class="w-8 h-8 text-pink-500 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="text-xl font-bold mb-3 group-hover:text-pink-600 transition-colors dark:text-white text-slate-900">Soddisfazione Garantita</h3>
        <p class="text-sm leading-relaxed group-hover:text-slate-700 transition-colors dark:text-zinc-400 text-slate-600">Ci impegniamo a superare le aspettative dei clienti con soluzioni su misura e supporto continuo.</p>
      </div>
    </div>
  </div>
</section>

{{-- Testimonials Section --}}
<section class="py-24 border-y overflow-hidden transition-colors duration-300 dark:bg-zinc-900/50 dark:border-zinc-800 bg-white/50 border-slate-100">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl md:text-6xl font-black text-center mb-16 uppercase tracking-tighter dark:text-white text-slate-900">Cosa Dicono i <span class="text-yellow-500">Nostri Clienti</span></h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="glass-card p-8 rounded-3xl relative group border transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl dark:bg-zinc-900/70 dark:border-zinc-800 dark:hover:border-indigo-500/30 bg-white/70 border-slate-200 hover:border-indigo-200">
        <svg class="absolute top-6 right-6 w-10 h-10 group-hover:scale-110 group-hover:text-indigo-500/20 transition-all duration-300 dark:text-zinc-700 text-slate-100" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151C7.563 6.068 6 8.789 6 11h4v10H0z"/></svg>
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="{{ asset('images/reviews/koryzero.jpg') }}" alt="KoryZero" loading="lazy" width="64" height="64" class="w-16 h-16 rounded-full border-2 border-indigo-500/30 object-cover relative z-10" onerror="this.style.display='none'" />
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center text-white font-bold text-sm relative z-10" style="display:none" data-fallback>KZ</div>
          </div>
          <div>
            <h4 class="font-bold group-hover:text-indigo-500 transition-colors dark:text-white text-slate-900">KoryZero</h4>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Founder, Heryon Network</p>
          </div>
        </div>
        <div class="flex gap-1 mb-4 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          @endfor
        </div>
        <div class="mb-6">
          <p class="text-[10px] uppercase tracking-widest text-indigo-500 font-black mb-1">Progetto:</p>
          <p class="font-black text-sm tracking-tight leading-tight dark:text-white/90 text-slate-800">Creazione di Grafiche per Heryon Minecraft Network</p>
        </div>
        <div class="pl-4 border-l-4 border-emerald-500/50 italic text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">"Grafiche ottime, sono piaciute a tutto lo staff team."</div>
      </div>
      <div class="glass-card p-8 rounded-3xl relative group border transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl dark:bg-zinc-900/70 dark:border-zinc-800 dark:hover:border-indigo-500/30 bg-white/70 border-slate-200 hover:border-indigo-200">
        <svg class="absolute top-6 right-6 w-10 h-10 group-hover:scale-110 group-hover:text-indigo-500/20 transition-all duration-300 dark:text-zinc-700 text-slate-100" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151C7.563 6.068 6 8.789 6 11h4v10H0z"/></svg>
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="{{ asset('images/reviews/vangels.jpg') }}" alt="MonkeyMC - vAngels_" loading="lazy" width="64" height="64" class="w-16 h-16 rounded-full border-2 border-indigo-500/30 object-cover relative z-10" onerror="this.style.display='none'" />
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-sm relative z-10" style="display:none" data-fallback>MV</div>
          </div>
          <div>
            <h4 class="font-bold group-hover:text-indigo-500 transition-colors dark:text-white text-slate-900">MonkeyMC - vAngels_</h4>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Network Owner</p>
          </div>
        </div>
        <div class="flex gap-1 mb-4 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          @endfor
        </div>
        <div class="mb-6">
          <p class="text-[10px] uppercase tracking-widest text-indigo-500 font-black mb-1">Progetto:</p>
          <p class="font-black text-sm tracking-tight leading-tight dark:text-white/90 text-slate-800">Grafica per MC Italia</p>
        </div>
        <div class="pl-4 border-l-4 border-emerald-500/50 italic text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">"Ho richiesto il prodotto il giorno 25/02 e mi è stata consegnata il 26/02 per un emergenza del network, lavoro perfetto, efficiente e i grafici molto disponibili, estremamente consigliato"</div>
      </div>
      <div class="glass-card p-8 rounded-3xl relative group border transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl dark:bg-zinc-900/70 dark:border-zinc-800 dark:hover:border-indigo-500/30 bg-white/70 border-slate-200 hover:border-indigo-200">
        <svg class="absolute top-6 right-6 w-10 h-10 group-hover:scale-110 group-hover:text-indigo-500/20 transition-all duration-300 dark:text-zinc-700 text-slate-100" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151C7.563 6.068 6 8.789 6 11h4v10H0z"/></svg>
        <div class="flex items-center gap-4 mb-6">
          <div class="relative">
            <img src="{{ asset('images/reviews/andreaserafini.jpg') }}" alt="AndrixTheMonkey" loading="lazy" width="64" height="64" class="w-16 h-16 rounded-full border-2 border-indigo-500/30 object-cover relative z-10" onerror="this.style.display='none'" />
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-sm relative z-10" style="display:none" data-fallback>AM</div>
          </div>
          <div>
            <h4 class="font-bold group-hover:text-indigo-500 transition-colors dark:text-white text-slate-900">AndrixTheMonkey</h4>
            <p class="text-xs font-medium dark:text-zinc-500 text-slate-500">Content Creator</p>
          </div>
        </div>
        <div class="flex gap-1 mb-4 text-yellow-400">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          @endfor
        </div>
        <div class="mb-6">
          <p class="text-[10px] uppercase tracking-widest text-indigo-500 font-black mb-1">Progetto:</p>
          <p class="font-black text-sm tracking-tight leading-tight dark:text-white/90 text-slate-800">Grafica per Minecraft</p>
        </div>
        <div class="pl-4 border-l-4 border-emerald-500/50 italic text-sm font-medium leading-relaxed dark:text-zinc-400 text-slate-600">"Sono riusciti a rappresentare esattamente quello che avevo in testa, senza fare modifiche, sono stati anche super veloci nella consegna (circa 24h). Consiglio vivamente, super professionali"</div>
      </div>
    </div>
  </div>
</section>

{{-- News Section --}}
<section class="py-24 relative transition-colors duration-300 dark:bg-zinc-950">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
      <div>
        <h2 class="text-3xl md:text-6xl font-black mb-4 uppercase tracking-tighter dark:text-white text-slate-900">Ultime <span class="text-yellow-500 drop-shadow-[0_0_15px_rgba(250,204,21,0.5)]">News</span></h2>
        <div class="w-20 h-1 bg-yellow-500 rounded-full"></div>
      </div>
      <a href="{{ route('news') }}" class="text-blue-600 hover:text-blue-500 font-medium flex items-center gap-2 transition-colors cursor-pointer">
        Vedi tutti gli articoli
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="group glass-card rounded-2xl overflow-hidden flex flex-col h-full hover:shadow-[0_10px_40px_-15px_rgba(79,70,229,0.3)] transition-colors dark:bg-zinc-900/50">
        <div class="relative h-48 overflow-hidden">
          <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-all z-10"></div>
          <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" alt="StarLab è finalmente Online!" loading="lazy" width="400" height="225" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute top-4 left-4 z-20">
            <span class="px-3 py-1 backdrop-blur-md text-xs font-semibold rounded-full flex items-center gap-1 border dark:bg-zinc-800/90 dark:text-white dark:border-zinc-700 bg-white/90 text-slate-900 border-slate-200">
              <svg class="w-2.5 h-2.5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
              Annuncio
            </span>
          </div>
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <div class="flex items-center gap-2 text-xs mb-3 dark:text-zinc-500 text-slate-500">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span>14 Mar 2026</span>
          </div>
          <h3 class="text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors dark:text-white text-slate-900">StarLab è finalmente Online!</h3>
          <p class="text-sm leading-relaxed mb-6 flex-1 dark:text-zinc-400 text-slate-600">Il nostro nuovo hub digitale è finalmente attivo. Esplora i nostri servizi di StarWeb e StarGraphics attraverso un'interfaccia moderna e veloce.</p>
          <a href="{{ route('news') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-500 transition-colors mt-auto cursor-pointer">
            Leggi di più <span class="ml-1 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all">&rarr;</span>
          </a>
        </div>
      </div>
      <div class="group glass-card rounded-2xl overflow-hidden flex flex-col h-full hover:shadow-[0_10px_40px_-15px_rgba(79,70,229,0.3)] transition-colors dark:bg-zinc-900/50">
        <div class="relative h-48 overflow-hidden">
          <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-all z-10"></div>
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop" alt="Siamo ufficialmente Riaperti" loading="lazy" width="400" height="225" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
          <div class="absolute top-4 left-4 z-20">
            <span class="px-3 py-1 backdrop-blur-md text-xs font-semibold rounded-full flex items-center gap-1 border dark:bg-zinc-800/90 dark:text-white dark:border-zinc-700 bg-white/90 text-slate-900 border-slate-200">
              <svg class="w-2.5 h-2.5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
              StarLab
            </span>
          </div>
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <div class="flex items-center gap-2 text-xs mb-3 dark:text-zinc-500 text-slate-500">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span>13 Mar 2026</span>
          </div>
          <h3 class="text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors dark:text-white text-slate-900">Siamo ufficialmente Riaperti</h3>
          <p class="text-sm leading-relaxed mb-6 flex-1 dark:text-zinc-400 text-slate-600">StarLab riapre le porte! Il nostro team è di nuovo operativo al 100% e pronto a trasformare le tue idee in realtà digitale.</p>
          <a href="{{ route('news') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-500 transition-colors mt-auto cursor-pointer">
            Leggi di più <span class="ml-1 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all">&rarr;</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Stats Section --}}
<section class="py-24 relative overflow-hidden transition-colors duration-300 dark:bg-zinc-950">
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full blur-3xl pointer-events-none dark:bg-indigo-900/30 bg-indigo-900/20"></div>
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-6xl font-black mb-4 uppercase tracking-tighter dark:text-white text-slate-900">Analisi Dati <span class="text-yellow-500">Utenti</span></h2>
      <p class="font-medium max-w-2xl mx-auto dark:text-zinc-400 text-slate-600">Utilizziamo strumenti avanzati di analisi per monitorare il comportamento in tempo reale.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="glass-card p-6 rounded-2xl border-t-2 border-emerald-500/50 dark:bg-zinc-900/50 dark:border-zinc-800 bg-white/50 border-slate-200">
        <div class="flex justify-between items-start mb-4">
          <div>
            <p class="text-[10px] font-black uppercase tracking-widest dark:text-zinc-500 text-slate-500">Utenti Online</p>
            <h3 class="text-4xl font-black mt-1 flex items-center gap-2 dark:text-white text-slate-900">
              <span id="online-users-count">0</span>
              <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
              </span>
            </h3>
          </div>
          <div class="p-2 rounded-lg dark:bg-zinc-800 dark:text-emerald-400 bg-emerald-50 text-emerald-600">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
          </div>
        </div>
        <div id="user-trend-chart" class="h-16 flex items-end gap-1"></div>
        <p class="text-xs text-emerald-400 flex items-center gap-1 mt-2 font-medium">
          <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> Live dal server Discord StarLab
        </p>
      </div>
      <div class="glass-card p-6 rounded-2xl col-span-1 md:col-span-1 lg:col-span-1 border-t-2 border-amber-500/50 dark:bg-zinc-900/50 dark:border-zinc-800 bg-white/50 border-slate-200">
        <div class="flex justify-between items-start mb-4">
          <div>
            <p class="text-[10px] font-black uppercase tracking-widest dark:text-zinc-500 text-slate-500">Progetti Ultimati</p>
            <h3 class="text-4xl font-black mt-1 dark:text-white text-slate-900">
              <span id="projects-count">0</span>+
            </h3>
          </div>
          <div class="p-2 rounded-lg dark:bg-zinc-800 dark:text-amber-400 bg-amber-50 text-amber-600">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
          </div>
        </div>
        <div id="traffic-chart" class="h-16 flex items-end gap-1"></div>
        <p class="text-xs mt-2 dark:text-zinc-500 text-slate-500">Lavori consegnati con successo</p>
      </div>
      <div class="glass-card p-6 rounded-2xl border-t-2 border-blue-500/50 dark:bg-zinc-900/50 dark:border-zinc-800 bg-white/50 border-slate-200">
        <div class="flex justify-between items-start mb-4">
          <div>
            <p class="text-[10px] font-black uppercase tracking-widest dark:text-zinc-500 text-slate-500">Tempo Consegna</p>
            <h3 class="text-4xl font-black mt-1 flex items-baseline gap-1 dark:text-white text-slate-900">~<span id="delivery-count">0</span>h</h3>
          </div>
          <div class="p-2 rounded-lg dark:bg-zinc-800 dark:text-blue-400 bg-blue-50 text-blue-600">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
        </div>
        <div class="w-full rounded-full h-2 mt-8 overflow-hidden dark:bg-zinc-800 bg-slate-800">
          <div id="delivery-bar" class="bg-blue-500 h-2 rounded-full" style="width:0%"></div>
        </div>
        <p class="text-xs mt-4 dark:text-zinc-500 text-slate-500">Media creazione grafica</p>
      </div>
      <div class="glass-card p-6 rounded-2xl border-t-2 border-indigo-500/50 dark:bg-zinc-900/50 dark:border-zinc-800 bg-white/50 border-slate-200">
        <div class="flex justify-between items-start mb-1">
          <div>
            <p class="text-[10px] font-black uppercase tracking-widest dark:text-zinc-500 text-slate-500">Soddisfazione</p>
            <h3 class="text-4xl font-black mt-1 dark:text-white text-slate-900"><span id="satisfaction-count">0</span>%</h3>
          </div>
          <div class="p-2 rounded-lg dark:bg-zinc-800 dark:text-indigo-400 bg-indigo-50 text-indigo-600">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
          </div>
        </div>
        <div class="h-24 flex items-center justify-center -mt-2">
          <svg class="w-20 h-20 -rotate-90" viewBox="0 0 36 36">
            <path class="dark:stroke-zinc-800 stroke-slate-200" fill="none" stroke-width="3" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
            <path id="satisfaction-ring" class="stroke-indigo-500" fill="none" stroke-width="3" stroke-linecap="round" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" stroke-dasharray="0, 100"/>
          </svg>
        </div>
        <p class="text-xs text-center dark:text-zinc-500 text-slate-500">Basato su feedback utenti</p>
      </div>
    </div>
  </div>
</section>

{{-- FAQ Section --}}
<section class="py-24 transition-colors duration-300 dark:bg-zinc-900/30 bg-white/30">
  <div class="max-w-3xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12 dark:text-white text-slate-900">Domande Frequenti</h2>
    <div class="space-y-4" id="faq-container">
      <div class="glass-card rounded-xl overflow-hidden transition-all duration-300">
        <button class="faq-btn w-full p-5 flex justify-between items-center text-left cursor-pointer" data-index="0">
          <span class="font-medium dark:text-white text-slate-900">Quali sono i tempi di consegna?</span>
          <svg class="faq-chevron w-5 h-5 dark:text-zinc-400 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-answer transition-all duration-300 overflow-hidden max-h-0">
          <div class="p-5 pt-0 border-t dark:border-zinc-700 border-slate-200">
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">I tempi variano in base alla complessità del progetto. Solitamente per una grafica richiediamo 3-5 giorni lavorativi, mentre per un sito web dalle 2 alle 4 settimane.</p>
          </div>
        </div>
      </div>
      <div class="glass-card rounded-xl overflow-hidden transition-all duration-300">
        <button class="faq-btn w-full p-5 flex justify-between items-center text-left cursor-pointer" data-index="1">
          <span class="font-medium dark:text-white text-slate-900">Offrite supporto post-vendita?</span>
          <svg class="faq-chevron w-5 h-5 dark:text-zinc-400 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-answer transition-all duration-300 overflow-hidden max-h-0">
          <div class="p-5 pt-0 border-t dark:border-zinc-700 border-slate-200">
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Assolutamente sì. Tutti i nostri pacchetti web includono 30 giorni di assistenza gratuita per bugfix e piccole modifiche.</p>
          </div>
        </div>
      </div>
      <div class="glass-card rounded-xl overflow-hidden transition-all duration-300">
        <button class="faq-btn w-full p-5 flex justify-between items-center text-left cursor-pointer" data-index="2">
          <span class="font-medium dark:text-white text-slate-900">Posso vedere esempi di lavori precedenti?</span>
          <svg class="faq-chevron w-5 h-5 dark:text-zinc-400 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-answer transition-all duration-300 overflow-hidden max-h-0">
          <div class="p-5 pt-0 border-t dark:border-zinc-700 border-slate-200">
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Certo! Puoi visitare la nostra sezione <a href="{{ route('portfolio') }}" class="text-yellow-500 font-semibold hover:underline">Portfolio</a> o contattarci direttamente per vedere case study specifici per il tuo settore.</p>
          </div>
        </div>
      </div>
      <div class="glass-card rounded-xl overflow-hidden transition-all duration-300">
        <button class="faq-btn w-full p-5 flex justify-between items-center text-left cursor-pointer" data-index="3">
          <span class="font-medium dark:text-white text-slate-900">Come posso iniziare un progetto con voi?</span>
          <svg class="faq-chevron w-5 h-5 dark:text-zinc-400 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-answer transition-all duration-300 overflow-hidden max-h-0">
          <div class="p-5 pt-0 border-t dark:border-zinc-700 border-slate-200">
            <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Il modo più rapido è unirsi al nostro server Discord e aprire un ticket nella sezione "Supporto". Un membro del nostro team ti assisterà immediatamente per definire i dettagli del progetto.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var faqBtns = document.querySelectorAll('.faq-btn');
  var openIndex = -1;
  faqBtns.forEach(function(btn, idx) {
    btn.addEventListener('click', function() {
      var answer = this.nextElementSibling;
      var chevron = this.querySelector('.faq-chevron');
      if (openIndex === idx) {
        answer.style.maxHeight = '0';
        chevron.classList.remove('rotate-180');
        openIndex = -1;
      } else {
        faqBtns.forEach(function(b, i) {
          var a = b.nextElementSibling;
          var c = b.querySelector('.faq-chevron');
          a.style.maxHeight = '0';
          c.classList.remove('rotate-180');
        });
        answer.style.maxHeight = answer.scrollHeight + 'px';
        chevron.classList.add('rotate-180');
        openIndex = idx;
      }
    });
  });

  function animateCountUp(el, end, duration, suffix) {
    var start = 0;
    var startTime = null;
    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / (duration || 2000), 1);
      var eased = 1 - Math.pow(1 - progress, 4);
      var current = Math.floor(eased * end);
      if (el) el.textContent = current + (suffix || '');
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        animateCountUp(document.getElementById('projects-count'), 50, 2500, '+');
        animateCountUp(document.getElementById('delivery-count'), 72, 1500, '');
        animateCountUp(document.getElementById('satisfaction-count'), 92, 2000, '');

        var db = document.getElementById('delivery-bar');
        if (db) { db.style.transition = 'width 1.5s ease'; setTimeout(function() { db.style.width = '85%'; }, 500); }

        var sr = document.getElementById('satisfaction-ring');
        if (sr) { sr.style.transition = 'stroke-dasharray 1.5s ease'; setTimeout(function() { sr.setAttribute('stroke-dasharray', '92, 100'); }, 500); }

        observer.disconnect();
      }
    });
  }, { threshold: 0.1 });
  var statsSection = document.querySelector('.py-24.relative.overflow-hidden');
  if (statsSection) observer.observe(statsSection);

  var trChart = document.getElementById('traffic-chart');
  if (trChart) {
    var data = [400, 300, 550, 450, 700, 800, 600];
    var max = Math.max.apply(null, data);
    data.forEach(function(v) {
      var bar = document.createElement('div');
      bar.className = 'flex-1 rounded-t-sm dark:bg-amber-400/70 bg-amber-400';
      bar.style.height = (v / max * 64) + 'px';
      trChart.appendChild(bar);
    });
  }

  var utChart = document.getElementById('user-trend-chart');
  if (utChart) {
    var utData = [120, 350, 280, 450, 890];
    var utMax = Math.max.apply(null, utData);
    utData.forEach(function(v) {
      var bar = document.createElement('div');
      var h = v / utMax * 64;
      bar.className = 'flex-1 rounded-t-sm dark:bg-emerald-400/70 bg-emerald-400';
      bar.style.height = h + 'px';
      utChart.appendChild(bar);
    });
  }

  fetch('https://discord.com/api/guilds/1202342464547983430/widget.json')
    .then(function(r) { return r.json(); })
    .then(function(d) {
      var el = document.getElementById('online-users-count');
      if (el && d.presence_count != null) el.textContent = d.presence_count;
    })
    .catch(function() {
      var el = document.getElementById('online-users-count');
      if (el) el.textContent = '0';
    });
});
</script>
@endsection
