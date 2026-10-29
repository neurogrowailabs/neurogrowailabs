<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'NeuroGrow AI Labs') — {{ $siteName ?? 'NeuroGrow AI Labs' }}</title>

    <!-- SEO & Metadatos Principales -->
    <meta name="description" content="NeuroGrow AI Labs — Estudio de Ingeniería Full-Stack, Inteligencia Artificial Certificada (Google Gemini) y Ciencia de Datos con RStudio & DoE.">
    <meta name="keywords" content="NeuroGrow AI Labs, NeuroGrow, Software Labs, Inteligencia Artificial, Google Gemini, Full-Stack, Laravel 11, RStudio, Diseño de Experimentos, Firebase, Ecuador">
    <meta name="author" content="NeuroGrow AI Labs">
    <meta name="theme-color" content="#000000">

    <!-- Open Graph / WhatsApp / Instagram / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="NeuroGrow AI Labs | Software, IA y Ciencia de Datos">
    <meta property="og:description" content="Ingeniería Full-Stack, Inteligencia Artificial Certificada (Google Gemini) y Ciencia de Datos con rigor estadístico en RStudio.">
    <meta property="og:image" content="{{ asset('favicon.ico') }}">
    <meta property="og:site_name" content="NeuroGrow AI Labs">

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="NeuroGrow AI Labs | Software, IA y Ciencia de Datos">
    <meta name="twitter:description" content="Ingeniería Full-Stack, Inteligencia Artificial Certificada y Ciencia de Datos con RStudio.">
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}">

    <!-- Favicon (SVG Moderno + Fallback ICO) -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Datos Estructurados Schema.org (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ProfessionalService",
      "name": "NeuroGrow AI Labs",
      "alternateName": "NeuroGrow",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('favicon.svg') }}",
      "telephone": "+593963279376",
      "description": "Estudio de ingeniería de software Full-Stack, arquitecturas Cloud, Inteligencia Artificial Certificada (Google Gemini) y Ciencia de Datos con RStudio & DoE.",
      "address": {
        "@@type": "PostalAddress",
        "addressCountry": "EC"
      },
      "sameAs": [
        "https://github.com/neurogrowailabs",
        "https://instagram.com/neurogrow.ailabs"
      ],
      "priceRange": "$$"
    }
    </script>

    <!-- Preload Tipografía Escultórica Dala (PPNeueMontreal) -->
    <link rel="preload" href="{{ asset('fonts/PPNeueMontreal-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/PPNeueMontreal-Light.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/PPNeueMontreal-SemiBold.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Google Fonts: Inter + Playfair Display (Scrollytelling) + Bebas Neue / Barlow Condensed + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:ital,wght@1,400;1,600&display=swap" rel="stylesheet">

    <!-- CSS Arquitectura & Tokens con Cache-Busting -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Three.js 3D Engine & Dala Brain -->
    <script src="{{ asset('js/three.min.js') }}"></script>
    <script src="{{ asset('js/dala-brain.js') }}?v={{ file_exists(public_path('js/dala-brain.js')) ? filemtime(public_path('js/dala-brain.js')) : time() }}" defer></script>

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    @stack('styles')
</head>
<body>
    {{-- Canvas 3D de Alto Rendimiento en el Vacío Absoluto (#000000) --}}
    <canvas id="dala3dCanvas" style="position: fixed; inset: 0; width: 100vw; height: 100vh; z-index: 0; pointer-events: none;"></canvas>

    @yield('content')

    @include('partials.cookie-banner')

    @stack('scripts')
</body>
</html>
