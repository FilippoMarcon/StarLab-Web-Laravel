<!DOCTYPE html>
<html lang="it" class="{{ session('theme', 'dark') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StarLab Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 min-h-screen">
    <nav class="border-b border-slate-800 bg-zinc-950/80 backdrop-blur-xl sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.dashboard') }}" class="text-lg font-black text-white uppercase tracking-wider">
                        StarLab <span class="text-amber-500">Admin</span>
                    </a>
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-all">Dashboard</a>
                        <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-all">Preventivi</a>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-slate-300 transition-colors" target="_blank">Vai al Sito</a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-red-400 hover:text-red-300 hover:bg-red-900/20 rounded-lg transition-all">Esci</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-900/30 border border-emerald-800 rounded-xl text-emerald-300 text-sm">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
