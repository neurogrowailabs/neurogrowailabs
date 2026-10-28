<div class="legal-top-nav">
    <div class="legal-nav-left">
        <a href="{{ route('home') }}" class="legal-back-btn" aria-label="Volver a la portada de NeuroGrow AI Labs">
            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> <span>Volver al Inicio</span>
        </a>
        <nav class="legal-nav-pills" aria-label="Navegación entre documentos legales">
            <a href="{{ route('legal.compliance') }}" class="legal-nav-pill {{ request()->routeIs('legal.compliance') ? 'active' : '' }}">
                <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> <span>Gobernanza & Cumplimiento</span>
            </a>
            <a href="{{ route('legal.terminos') }}" class="legal-nav-pill {{ request()->routeIs('legal.terminos') ? 'active' : '' }}">
                <i class="fa-solid fa-file-contract" aria-hidden="true"></i> <span>Términos MSA</span>
            </a>
            <a href="{{ route('legal.privacidad') }}" class="legal-nav-pill {{ request()->routeIs('legal.privacidad') ? 'active' : '' }}">
                <i class="fa-solid fa-user-shield" aria-hidden="true"></i> <span>Privacidad & NDA</span>
            </a>
            <a href="{{ route('legal.cookies') }}" class="legal-nav-pill {{ request()->routeIs('legal.cookies') ? 'active' : '' }}">
                <i class="fa-solid fa-cookie-bite" aria-hidden="true"></i> <span>Cookies</span>
            </a>
        </nav>
    </div>
    <div class="legal-nav-right">
        <button type="button" onclick="window.print()" class="legal-action-btn" aria-label="Imprimir o guardar este documento en PDF">
            <i class="fa-solid fa-print" aria-hidden="true"></i> <span>Imprimir / PDF</span>
        </button>
    </div>
</div>
