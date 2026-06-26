<div id="cookie-banner" class="fixed bottom-4 left-4 z-[9998] max-w-sm hidden">
    <div class="glass-card rounded-2xl p-5 shadow-xl">
        <div class="flex items-start justify-between mb-3">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21.598 11.064a5.582 5.582 0 00-6.227-7.637 5.582 5.582 0 00-9.347 4.696A5.582 5.582 0 003.39 13.16a5.582 5.582 0 006.228 7.637 5.582 5.582 0 009.347-4.696 5.582 5.582 0 002.633-5.037z"/></svg>
                <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-200">Cookie Policy</span>
            </div>
            <button id="cookie-close" class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300 transition-colors" aria-label="Close">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
            Utilizziamo cookie per migliorare la tua esperienza. Continuando a navigare accetti la nostra
            <a href="{{ route('home') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Cookie Policy</a>.
        </p>
        <button id="cookie-accept" class="w-full py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium transition-colors">
            Accetta
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var banner = document.getElementById('cookie-banner');
        var acceptBtn = document.getElementById('cookie-accept');
        var closeBtn = document.getElementById('cookie-close');

        if (localStorage.getItem('starlab-cookie-consent') !== 'true') {
            banner.classList.remove('hidden');
        }

        function acceptCookies() {
            localStorage.setItem('starlab-cookie-consent', 'true');
            banner.classList.add('hidden');
        }

        acceptBtn.addEventListener('click', acceptCookies);
        closeBtn.addEventListener('click', function () {
            banner.classList.add('hidden');
        });
    });
</script>
