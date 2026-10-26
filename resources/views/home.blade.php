@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    {{-- Navegación superior y barra de scroll --}}
    @include('partials.navbar')

    {{-- Escenario cinematográfico: Hero, Portal y Manifiesto interactivo --}}
    @include('partials.hero-scrollytelling')

    {{-- Live Workflow Canvas: Arquitectura en tiempo real --}}
    @include('partials.pipeline')

    {{-- Diagnóstico interactivo de Arquitectura e Inteligencia Artificial --}}
    @include('partials.finder')

    {{-- Metodología DoE y rigor experimental --}}
    @include('partials.methodology')

    {{-- Capacidades de ingeniería y servicios --}}
    @include('partials.services')

    {{-- Ecosistema Labs: Casos de éxito en producción (MiVeci & RStudio) --}}
    @include('partials.portfolio')

    {{-- CTA final, navegación de pie de página y botones sociales --}}
    @include('partials.footer')

    {{-- Botón Flotante de WhatsApp con pulso dinámico --}}
    <a class="float-btn float-whatsapp-btn" href="{{ $whatsappGlobal }}" target="_blank" rel="noopener" aria-label="Chatea con un Ingeniero en WhatsApp" title="¡Chatea con nosotros en WhatsApp!">
        <i class="fa-brands fa-whatsapp"></i>
        <span class="float-ping"></span>
        <span class="float-tooltip">¿Tienes un proyecto? ¡Hablemos por WhatsApp!</span>
    </a>
@endsection

@push('scripts')
    <script>
        window.VALIDATOR_DATABASE = @json($databaseValidation);
        window.MARQUEE_ITEMS = @json($partners);
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
