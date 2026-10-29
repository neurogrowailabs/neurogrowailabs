<!-- ================= DALA TRANSPARENT NAVIGATION BAR ================= -->
<header class="dala-nav" id="topNav">
    <div class="dala-nav-inner">
        {{-- Logo: Isotipo triangular geométrico + Wordmark --}}
        <a href="#heroSection" class="dala-nav-logo" title="NeuroGrow AI Labs">
            <span class="dala-nav-logo-glyph"></span>
            <span class="dala-nav-logo-text">NEUROGROW</span>
        </a>

        {{-- Enlaces de Navegación Fantasma en Mayúsculas (Tracking 0.025em) --}}
        <nav class="dala-nav-links" aria-label="Navegación principal">
            <a href="#pipeline" class="dala-nav-link">PIPELINE</a>
            <a href="#finder" class="dala-nav-link">DIAGNÓSTICO</a>
            <a href="#about" class="dala-nav-link">METODOLOGÍA</a>
            <a href="#features" class="dala-nav-link">SERVICIOS</a>
            <a href="#portfolio" class="dala-nav-link">LABS</a>
            <a href="{{ route('legal.compliance') }}" class="dala-nav-link">LEGAL</a>
        </nav>

        {{-- Botón de Acción Principal: Píldora Violeta Eléctrico (#8052ff) --}}
        <div class="dala-nav-actions">
            <a href="{{ $whatsappConsultar }}" target="_blank" rel="noopener" class="dala-nav-cta" title="Consultar por WhatsApp con un Ingeniero">
                <span>CONSULTAR</span>
                <span class="dala-nav-arrow">↗</span>
            </a>
        </div>
    </div>
</header>
