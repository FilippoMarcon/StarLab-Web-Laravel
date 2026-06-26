@extends('layouts.app')

@section('title', 'StarLab | StarGraphics - Graphic Design Professionale')
@section('og-title', 'StarGraphics | Graphic Design Professionale')
@section('og-description', 'Branding, UI/UX design e social media. Diamo forma alle tue idee con design che catturano, ispirano e convertono.')

@section('content')
<div class="pt-32 pb-20 min-h-screen transition-colors duration-300 dark:bg-zinc-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
        <div class="relative glass-card p-8 sm:p-12 rounded-3xl overflow-hidden border border-pink-500/20">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-pink-600/20 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
            <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-pink-900/30 dark:bg-pink-900/30 border border-pink-500/30 text-xs text-pink-400 font-bold mb-6">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20.25c-4.97 0-9-3.75-9-8.25s4.03-8.25 9-8.25 9 3.75 9 8.25-4.03 8.25-9 8.25z"/><circle cx="8.5" cy="10.5" r="1.5" fill="currentColor"/><circle cx="15.5" cy="10.5" r="1.5" fill="currentColor"/><circle cx="12" cy="7" r="1.5" fill="currentColor"/><circle cx="8.5" cy="15" r="1.5" fill="currentColor"/><circle cx="15.5" cy="15" r="1.5" fill="currentColor"/></svg>
                        Divisione Creativa
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 dark:text-white mb-6">
                        Star<span class="text-pink-500">Graphics</span>
                    </h1>
                    <p class="text-xl text-slate-600 dark:text-slate-300 leading-relaxed mb-8">
                        Diamo forma alle tue idee con design che catturano, ispirano e convertono. Dall'identità del brand alle grafiche per i social.
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex px-8 py-4 bg-pink-600 hover:bg-pink-500 text-white rounded-xl font-bold transition-all duration-300 shadow-lg shadow-pink-600/30">
                            Richiedi Progetto Grafico
                        </a>
                    </div>
                </div>
                <div class="relative flex justify-center items-center">
                    <div class="relative w-64 h-64 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-full animate-pulse blur-xl opacity-50 absolute"></div>
                    <div class="glass w-64 h-64 rounded-2xl rotate-12 flex items-center justify-center border border-white/20 dark:border-white/20 z-10 backdrop-blur-md">
                        <svg class="w-20 h-20 text-white drop-shadow-[0_0_15px_rgba(255,255,255,0.5)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/><path d="M11 7.343l1.657-1.657"/></svg>
                    </div>
                    <div class="glass w-64 h-64 rounded-2xl -rotate-6 absolute border border-white/10 dark:border-white/10 z-0"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="glass-card p-8 rounded-2xl hover:bg-pink-500/5 dark:hover:bg-pink-500/10 transition-colors duration-300 border-l-4 border-pink-500">
                <svg class="text-pink-400 mb-4 w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20.25c-4.97 0-9-3.75-9-8.25s4.03-8.25 9-8.25 9 3.75 9 8.25-4.03 8.25-9 8.25z"/><circle cx="8.5" cy="10.5" r="1.5" fill="currentColor"/><circle cx="15.5" cy="10.5" r="1.5" fill="currentColor"/><circle cx="12" cy="7" r="1.5" fill="currentColor"/><circle cx="8.5" cy="15" r="1.5" fill="currentColor"/><circle cx="15.5" cy="15" r="1.5" fill="currentColor"/></svg>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Brand Identity</h3>
                <p class="text-slate-500 dark:text-slate-400">Loghi, palette colori, tipografia e linee guida per rendere il tuo marchio riconoscibile ovunque.</p>
            </div>
            <div class="glass-card p-8 rounded-2xl hover:bg-purple-500/5 dark:hover:bg-purple-500/10 transition-colors duration-300 border-l-4 border-purple-500">
                <svg class="text-purple-400 mb-4 w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">UI/UX Design</h3>
                <p class="text-slate-500 dark:text-slate-400">Progettazione di interfacce web e mobile intuitive, belle da vedere e facili da usare.</p>
            </div>
            <div class="glass-card p-8 rounded-2xl hover:bg-orange-500/5 dark:hover:bg-orange-500/10 transition-colors duration-300 border-l-4 border-orange-500">
                <svg class="text-orange-400 mb-4 w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5" fill="currentColor"/><path d="M21 15l-5-5L5 21"/></svg>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Social Media</h3>
                <p class="text-slate-500 dark:text-slate-400">Post, storie, banner e miniature YouTube ottimizzate per aumentare l'engagement.</p>
            </div>
        </div>
    </div>

    <div class="mt-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white mb-8">Ultimi lavori grafici</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-4 h-64 md:h-80">
            <div class="col-span-2 row-span-2 rounded-2xl overflow-hidden relative group">
                <img src="https://images.unsplash.com/photo-1626785774573-4b799314346d?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Brand Book" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center font-bold text-white text-lg">Brand Book</div>
            </div>
            <div class="rounded-2xl overflow-hidden relative group">
                <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Design 3D" />
            </div>
            <div class="rounded-2xl overflow-hidden relative group">
                <img src="https://images.unsplash.com/photo-1634152962476-4b8a00e1915c?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Typography" />
            </div>
            <div class="col-span-2 rounded-2xl overflow-hidden relative group">
                <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Social Kit" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center font-bold text-white text-lg">Social Kit</div>
            </div>
        </div>
    </div>
</div>
@endsection