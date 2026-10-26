<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BioCoreXStack Software Labs') — {{ $siteName ?? 'BioCoreXStack' }}</title>

    <!-- SEO & Metadatos Principales -->
    <meta name="description" content="BioCoreXStack Software Labs — Estudio de Ingeniería Full-Stack, Inteligencia Artificial Certificada (Google Gemini) y Ciencia de Datos con RStudio & DoE.">
    <meta name="keywords" content="BioCoreXStack, Software Labs, Inteligencia Artificial, Google Gemini, Full-Stack, Laravel 11, RStudio, Diseño de Experimentos, Firebase, Ecuador">
    <meta name="author" content="BioCoreXStack Software Labs">
    <meta name="theme-color" content="#000000">

    <!-- Open Graph / WhatsApp / Instagram / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="BioCoreXStack | Software, IA y Ciencia de Datos">
    <meta property="og:description" content="Ingeniería Full-Stack, Inteligencia Artificial Certificada (Google Gemini) y Ciencia de Datos con rigor estadístico en RStudio.">
    <meta property="og:image" content="{{ asset('favicon.ico') }}">
    <meta property="og:site_name" content="BioCoreXStack Software Labs">

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="BioCoreXStack | Software, IA y Ciencia de Datos">
    <meta name="twitter:description" content="Ingeniería Full-Stack, Inteligencia Artificial Certificada y Ciencia de Datos con RStudio.">
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Inter + Playfair Display (Scrollytelling) + Bebas Neue / Barlow Condensed + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Bebas+Neue&family=Inter:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:ital,wght@1,400;1,600&display=swap" rel="stylesheet">

    <!-- CSS Arquitectura & Tokens -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    @stack('styles')
</head>
<body>

    @yield('content')

    @stack('scripts')
</body>
</html>
