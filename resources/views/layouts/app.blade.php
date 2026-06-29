<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="StarLab - Agenzia Digitale specializzata in Sviluppo Web (StarWeb) e Graphic Design (StarGraphics). Trasformiamo le tue idee in realtà digitali." />
    <meta name="keywords" content="StarLab, Web Design, Sviluppo Web, Graphic Design, Branding, UI/UX, Agenzia Digitale, Frontend Development" />
    <meta name="author" content="StarLab Team" />
    <meta name="theme-color" content="#facc15" />
    <link rel="icon" type="image/png" href="{{ asset('images/StarLab-Logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/StarLab-Logo.png') }}" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('og-title', 'StarLab | Agenzia Digitale - Web & Graphic Design')" />
    <meta property="og:description" content="@yield('og-description', 'Trasformiamo le tue idee in realtà digitali. Sviluppo web, e-commerce, branding e design grafico professionale.')" />
    <meta property="og:image" content="{{ asset('images/StarLab-Logo.png') }}" />
    <meta property="og:site_name" content="StarLab" />
    <meta property="og:locale" content="it_IT" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="{{ url()->current() }}" />
    <meta name="twitter:title" content="@yield('og-title', 'StarLab | Agenzia Digitale - Web & Graphic Design')" />
    <meta name="twitter:description" content="@yield('og-description', 'Trasformiamo le tue idee in realtà digitali.')" />
    <meta name="twitter:image" content="{{ asset('images/StarLab-Logo.png') }}" />

    <title>@yield('title', 'StarLab | Innovazione Digitale')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script>
        if (localStorage.getItem('starlab-dark') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[var(--bg-primary)] text-[var(--text-primary)] selection:bg-indigo-600 selection:text-white transition-colors duration-300 font-sans">
    <x-scroll-progress-bar />
    <x-custom-cursor />
    <x-preloader />

    <x-navbar />

    <main>
        <div class="page-transition">
            @yield('content')
        </div>
    </main>

    <x-footer />
    <x-ai-chat />
    <x-cookie-banner />
</body>
</html>
