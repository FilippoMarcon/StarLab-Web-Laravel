<nav id="navbar" class="fixed z-50 inset-x-0 mx-auto flex items-center justify-between transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)] top-6 w-[95%] max-w-7xl py-4 px-6 rounded-2xl bg-transparent border-transparent">
  <div id="nav-left" class="flex items-center gap-12 flex-shrink-0 transition-all duration-700">
      <div class="flex items-center gap-3 group cursor-pointer" onclick="window.location='{{ route('home') }}'">
        <div class="relative group-hover:scale-110 transition-transform duration-500 will-change-transform transform-gpu">
          <img src="{{ asset('images/StarLab-Logo.png') }}" alt="StarLab Logo" class="w-10 h-10 object-contain relative z-10 drop-shadow-[0_0_15px_rgba(250,204,21,0.4)]" width="40" height="40" />
        </div>
        <span class="text-xl font-bold tracking-tight hidden sm:block dark:text-white text-slate-900">StarLab</span>
      </div>
      <div class="hidden lg:flex items-center gap-8">
        @foreach ([['label' => 'Home', 'route' => 'home'], ['label' => 'Servizi', 'route' => 'servizi.index'], ['label' => 'Portfolio', 'route' => 'portfolio.index'], ['label' => 'Blog', 'route' => 'blog.index'], ['label' => 'Contatti', 'route' => 'contatti']] as $item)
          <a href="{{ route($item['route']) }}" class="nav-link text-sm font-medium transition-all duration-300 relative group py-2 cursor-pointer {{ request()->routeIs($item['route']) ? 'active' : '' }}">
            {{ $item['label'] }}
            <span class="absolute bottom-0 left-0 h-0.5 bg-yellow-400 transition-all duration-300 {{ request()->routeIs($item['route']) ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
        @endforeach
      </div>
    </div>

    <div id="nav-right" class="hidden md:flex items-center gap-6 flex-shrink-0 transition-all duration-700">
      <div class="hidden lg:flex gap-4 text-xs font-semibold text-slate-500 dark:text-zinc-400">
        <a href="{{ route('starweb') }}" class="hover:text-yellow-500 transition-colors duration-300 cursor-pointer {{ request()->routeIs('starweb') ? 'text-yellow-500' : '' }}">StarWeb</a>
        <span class="text-slate-300 dark:text-zinc-600">|</span>
        <a href="{{ route('stargraphics') }}" class="hover:text-pink-600 transition-colors duration-300 cursor-pointer {{ request()->routeIs('stargraphics') ? 'text-pink-600' : '' }}">StarGraphics</a>
      </div>
      <button onclick="toggleDarkMode()" class="p-2 rounded-lg transition-colors cursor-pointer dark:hover:bg-zinc-800 hover:bg-slate-100 dark:text-yellow-400 text-slate-600" aria-label="Toggle Dark Mode" id="dark-toggle">
      </button>
      <div class="flex items-center gap-3">
        <a href="{{ route('about') }}" class="px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 border cursor-pointer dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:text-zinc-200 dark:border-zinc-700 dark:hover:border-zinc-600 bg-white hover:bg-slate-50 text-slate-700 border-slate-200 hover:border-slate-300 hover:shadow-sm">About</a>
        @auth
          @if (in_array(Auth::user()->role, ['staff', 'admin']))
            <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 border cursor-pointer dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:text-zinc-200 dark:border-zinc-700 dark:hover:border-zinc-600 bg-white hover:bg-slate-50 text-slate-700 border-slate-200 hover:border-slate-300 hover:shadow-sm">Admin</a>
          @endif
          <a href="{{ route('user.dashboard') }}" class="px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 cursor-pointer dark:bg-amber-500 dark:hover:bg-amber-400 dark:text-white bg-amber-500 hover:bg-amber-400 text-white">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-300 border cursor-pointer dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:text-zinc-400 dark:border-zinc-700 dark:hover:border-zinc-600 bg-white hover:bg-slate-50 text-slate-600 border-slate-200 hover:border-slate-300">Esci</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 border cursor-pointer dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:text-zinc-200 dark:border-zinc-700 dark:hover:border-zinc-600 bg-white hover:bg-slate-50 text-slate-700 border-slate-200 hover:border-slate-300 hover:shadow-sm">Accedi</a>
          <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-semibold rounded-lg transition-all duration-300 cursor-pointer dark:bg-amber-500 dark:hover:bg-amber-400 dark:text-white bg-amber-500 hover:bg-amber-400 text-white">Registrati</a>
        @endauth
      </div>
    </div>

    <div class="flex items-center gap-2 lg:hidden">
      <button onclick="toggleDarkMode()" class="p-2 rounded-lg transition-colors cursor-pointer dark:hover:bg-zinc-800 hover:bg-slate-100 dark:text-yellow-400 text-slate-600" aria-label="Toggle Dark Mode" id="dark-toggle-mobile">
      </button>
      <button id="menu-toggle" class="p-2 rounded-lg transition-colors cursor-pointer dark:hover:bg-zinc-800 hover:bg-slate-100 dark:text-white text-slate-900" aria-label="Toggle Menu">
        <svg id="menu-open-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
  </nav>

<div id="mobile-menu" class="hidden lg:hidden fixed inset-x-0 z-40 p-6 flex flex-col gap-3 shadow-xl transition-all duration-300 dark:bg-zinc-900/95 dark:border dark:border-zinc-800 bg-white/95 backdrop-blur-xl border border-slate-200 max-h-[calc(100vh-100px)] overflow-y-auto" style="margin-left: 1rem; margin-right: 1rem; border-radius: 1rem;">
  @foreach ([['label' => 'Home', 'href' => route('home')], ['label' => 'Servizi', 'href' => route('servizi.index')], ['label' => 'Portfolio', 'href' => route('portfolio.index')], ['label' => 'Blog', 'href' => route('blog.index')], ['label' => 'Contatti', 'href' => route('contatti')]] as $item)
    <a href="{{ $item['href'] }}" class="mobile-nav-item text-left text-base font-medium py-2.5 border-b cursor-pointer dark:text-zinc-400 dark:border-zinc-800 text-slate-500 border-slate-100">{{ $item['label'] }}</a>
  @endforeach
  <div class="grid grid-cols-2 gap-3 py-3">
    <a href="{{ route('starweb') }}" class="p-3 rounded-xl text-center text-xs font-bold cursor-pointer dark:bg-zinc-800 dark:border dark:border-zinc-700 dark:text-blue-400 bg-slate-50 border border-blue-200 text-blue-600">StarWeb</a>
    <a href="{{ route('stargraphics') }}" class="p-3 rounded-xl text-center text-xs font-bold cursor-pointer dark:bg-zinc-800 dark:border dark:border-zinc-700 dark:text-pink-400 bg-slate-50 border border-pink-200 text-pink-600">StarGraphics</a>
  </div>
  <a href="{{ route('about') }}" class="text-center py-3 rounded-xl font-semibold text-base border cursor-pointer dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 bg-slate-100 text-slate-900 border-slate-200">About</a>
  @auth
    <a href="{{ route('user.dashboard') }}" class="text-center py-3 rounded-xl font-semibold text-base cursor-pointer dark:bg-amber-500 dark:text-white bg-amber-500 text-white">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full text-center py-3 rounded-xl font-semibold text-base border cursor-pointer dark:bg-zinc-800 dark:text-zinc-400 dark:border-zinc-700 bg-slate-100 text-slate-600 border-slate-200">Esci</button>
    </form>
  @else
    <a href="{{ route('login') }}" class="text-center py-3 rounded-xl font-semibold text-base border cursor-pointer dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 bg-slate-100 text-slate-900 border-slate-200">Accedi</a>
    <a href="{{ route('register') }}" class="text-center py-3 rounded-xl font-semibold text-base cursor-pointer dark:bg-amber-500 dark:text-white bg-amber-500 text-white">Registrati</a>
  @endauth
</div>

<style>
.nav-link { color: #64748b; }
.dark .nav-link { color: #a1a1aa; }
.nav-link:hover { color: #0f172a; }
.dark .nav-link:hover { color: #fff; }
.nav-link.active { color: #0f172a; }
.dark .nav-link.active { color: #fff; }

#navbar.scrolled {
  top: 0.5rem !important;
  padding-top: 0.75rem !important;
  padding-bottom: 0.75rem !important;
  backdrop-filter: blur(24px) !important;
  -webkit-backdrop-filter: blur(24px) !important;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
  background: rgba(255, 255, 255, 0.85) !important;
  border: 1px solid rgba(226, 232, 240, 0.8) !important;
}
.dark #navbar.scrolled {
  background: rgba(24, 24, 27, 0.9) !important;
  border-color: rgba(63, 63, 70, 0.8) !important;
}
#mobile-menu {
  top: 88px;
}
#navbar.scrolled ~ #mobile-menu {
  top: 80px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var navbar = document.getElementById('navbar');
  var menuToggle = document.getElementById('menu-toggle');
  var mobileMenu = document.getElementById('mobile-menu');
  var menuOpenIcon = document.getElementById('menu-open-icon');
  var menuCloseIcon = document.getElementById('menu-close-icon');

  var updateIcons = function() {
    var isDark = document.documentElement.classList.contains('dark');
    var toggles = ['dark-toggle', 'dark-toggle-mobile'];
    toggles.forEach(function(id) {
      var el = document.getElementById(id);
      if (el) el.innerHTML = isDark
        ? '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
        : '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>';
    });
  };
  updateIcons();

  window.addEventListener('scroll', function() {
    if (window.scrollY > 20) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }, { passive: true });

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      menuOpenIcon.classList.toggle('hidden');
      menuCloseIcon.classList.toggle('hidden');
    });
    mobileMenu.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        menuOpenIcon.classList.remove('hidden');
        menuCloseIcon.classList.add('hidden');
      });
    });
  }
});

window.toggleDarkMode = function() {
  var html = document.documentElement;
  html.classList.toggle('dark');
  localStorage.setItem('starlab-dark', html.classList.contains('dark'));
  var isDark = html.classList.contains('dark');
  ['dark-toggle', 'dark-toggle-mobile'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.innerHTML = isDark
      ? '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
      : '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>';
  });
};
</script>
