<!DOCTYPE html>
<html lang="it" class="{{ session('theme', 'dark') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/StarLab-Logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/StarLab-Logo.png') }}" />
    <title>@yield('title', 'StarLab')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 min-h-screen">
    <nav class="border-b border-slate-800 bg-zinc-950/80 backdrop-blur-xl sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('user.dashboard') }}" class="text-lg font-black text-white uppercase tracking-wider">
                        StarLab <span class="text-amber-500">Dashboard</span>
                    </a>
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-all">Dashboard</a>
                        <a href="{{ route('user.quotes.index') }}" class="px-4 py-2 text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-all">Le Mie Richieste</a>
                        <a href="{{ route('user.quotes.create') }}" class="px-4 py-2 text-sm font-bold text-slate-300 hover:text-white hover:bg-slate-800 rounded-lg transition-all">Nuova Richiesta</a>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <button id="notif-bell" class="relative text-slate-500 hover:text-slate-300 transition-colors" title="Notifiche">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            <span id="notif-badge" class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center hidden" style="font-size:9px">0</span>
                        </button>
                        <div id="notif-dropdown" class="absolute right-0 top-full mt-2 w-80 bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl shadow-black/50 hidden z-50 overflow-hidden">
                            <div class="p-3 border-b border-slate-800">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Notifiche</p>
                            </div>
                            <div id="notif-list" class="max-h-64 overflow-y-auto">
                                <p class="text-sm text-slate-500 text-center py-6" id="notif-empty">Nessuna notifica.</p>
                            </div>
                        </div>
                    </div>
                    <span class="text-sm text-slate-500 hidden sm:inline">{{ auth()->user()->name }}</span>
                    <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-slate-300 transition-colors" target="_blank">Sito</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-red-400 hover:text-red-300 hover:bg-red-900/20 rounded-lg transition-all">Esci</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2"></div>

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-900/30 border border-emerald-800 rounded-xl text-emerald-300 text-sm">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <script>
    var prevTotal = 0;

    function showToast(message, type) {
        var container = document.getElementById('toast-container');
        var colors = type === 'error' ? 'bg-red-900/80 border-red-700 text-red-200' : (type === 'info' ? 'bg-sky-900/80 border-sky-700 text-sky-200' : 'bg-emerald-900/80 border-emerald-700 text-emerald-200');
        var toast = document.createElement('div');
        toast.className = 'px-4 py-3 rounded-xl border text-sm font-bold shadow-2xl animate-slide-up ' + colors;
        toast.textContent = message;
        container.appendChild(toast);
        setTimeout(function() { toast.remove(); }, 5000);
    }

    function pingActivity() {
        navigator.sendBeacon('{{ route('api.ping') }}', '');
    }

    function renderNotifications(data) {
        var list = document.getElementById('notif-list');
        if (data.total === 0) {
            list.innerHTML = '<p class="text-sm text-slate-500 text-center py-6">Nessuna notifica.</p>';
            return;
        }
        var html = '';
        data.items.forEach(function(item) {
            var dot = item.type === 'staff_reply' ? 'bg-sky-500' : 'bg-amber-500';
            html += '<a href="' + item.url + '" class="flex items-start gap-3 px-4 py-3 hover:bg-slate-800/50 transition-colors border-b border-slate-800/50 last:border-0">';
            html += '<span class="w-2 h-2 rounded-full ' + dot + ' mt-1.5 shrink-0"></span>';
            html += '<div class="min-w-0"><p class="text-sm text-slate-200">' + item.text + '</p><p class="text-xs text-slate-500 mt-0.5">' + item.time + '</p></div>';
            html += '</a>';
        });
        list.innerHTML = html;
    }

    function checkNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '{{ route('api.user.notifications') }}', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var badge = document.getElementById('notif-badge');
                if (data.total > 0) {
                    badge.textContent = data.total;
                    badge.classList.remove('hidden');
                    if (data.total > prevTotal && prevTotal > 0) {
                        var first = data.items[0];
                        showToast(first.text, 'info');
                    }
                } else {
                    badge.classList.add('hidden');
                }
                prevTotal = data.total;
            }
        };
        xhr.send();
    }

    document.addEventListener('DOMContentLoaded', function() {
        var bell = document.getElementById('notif-bell');
        var dropdown = document.getElementById('notif-dropdown');
        bell.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = !dropdown.classList.contains('hidden');
            dropdown.classList.toggle('hidden');
            if (!isOpen) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ route('api.user.notifications') }}', true);
                xhr.onload = function() {
                    if (xhr.status === 200) { renderNotifications(JSON.parse(xhr.responseText)); }
                };
                xhr.send();
            }
        });
        document.addEventListener('click', function() { dropdown.classList.add('hidden'); });
        pingActivity();
        checkNotifications();
        setInterval(pingActivity, 120000);
        setInterval(checkNotifications, 30000);
    });
    </script>

    <style>
    @keyframes slide-up { from { opacity:0; transform: translateY(10px); } to { opacity:1; transform: translateY(0); } }
    .animate-slide-up { animation: slide-up 0.3s ease-out; }
    </style>
</body>
</html>
