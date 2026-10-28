<!-- ================= BARRA DE NAVEGACIÓN SUPERIOR FIJA ================= -->
<header class="top-nav" id="topNav">
    <a href="#masterStage" class="nav-logo" title="NeuroGrow AI Labs">
        <span class="nav-logo-dot"></span>
        <span>NEUROGROW</span>
    </a>

    <div class="nav-columns">
        <div class="nav-col">
            <div class="nav-col-title">Desarrollo & Cloud</div>
            <ul class="nav-col-links">
                <li><a href="#features">Webs & Apps (PWA)</a></li>
                <li><a href="#about">Bases de Datos SQL & NoSQL</a></li>
            </ul>
        </div>
        <div class="nav-col">
            <div class="nav-col-title">Inteligencia Artificial</div>
            <ul class="nav-col-links">
                <li><a href="{{ route('labs') }}">Soluciones IA Certificadas</a></li>
                <li><a href="#pipeline">Pipeline IA en Vivo</a></li>
            </ul>
        </div>
        <div class="nav-col">
            <div class="nav-col-title">Data & Estadística</div>
            <ul class="nav-col-links">
                <li><a href="#finder">Cotizador de Arquitectura</a></li>
                <li><a href="#about">RStudio & Diseño Experimental</a></li>
            </ul>
        </div>
    </div>

    <div class="nav-actions">
        <a href="{{ route('legal.compliance') }}" class="nav-cta nav-cta-ghost nav-cta-compliance" title="Marco de Cumplimiento Legal y Normativa LOPDP">
            <i class="fa-solid fa-shield-halved" style="font-size: 11px; color: #ffffff;" aria-hidden="true"></i>
            <span>CUMPLIMIENTO LEGAL</span>
        </a>
        <a href="#portfolio" class="nav-cta nav-cta-ghost" title="Acceder a los productos y laboratorios">
            <i class="fa-solid fa-flask" style="color: var(--color-iris-violet); font-size: 11px;"></i>
            <span>LABS</span>
        </a>
        <a href="{{ $whatsappConsultar }}" target="_blank" rel="noopener" class="nav-cta nav-cta-primary" title="Consultar por WhatsApp con un Ingeniero">
            <span>CONSULTAR</span>
            <span>↗</span>
        </a>
    </div>
</header>

<!-- ================= MERCURY OBSERVATORY SCROLL RAIL ================= -->
<nav class="scroll-rail" id="scrollRail" aria-label="Navegación de Secciones">
    <div class="rail-line"></div>
    <a href="#masterStage" class="rail-dot active" data-target="masterStage" title="01. Intro Scrollytelling">
        <span class="rail-tooltip">01. INTRO</span>
    </a>
    <a href="#pipeline" class="rail-dot" data-target="pipeline" title="02. Pipeline IA & Datos">
        <span class="rail-tooltip">02. PIPELINE IA</span>
    </a>
    <a href="#finder" class="rail-dot" data-target="finder" title="03. Diagnóstico">
        <span class="rail-tooltip">03. DIAGNÓSTICO</span>
    </a>
    <a href="#about" class="rail-dot" data-target="about" title="04. Metodología DoE">
        <span class="rail-tooltip">04. METODOLOGÍA</span>
    </a>
    <a href="#features" class="rail-dot" data-target="features" title="05. Servicios">
        <span class="rail-tooltip">05. SERVICIOS</span>
    </a>
    <a href="#portfolio" class="rail-dot" data-target="portfolio" title="06. Ecosistema Labs">
        <span class="rail-tooltip">06. ECOSISTEMA LABS</span>
    </a>
    <a href="#contact" class="rail-dot" data-target="contact" title="07. Contacto">
        <span class="rail-tooltip">07. CONTACTO</span>
    </a>
</nav>
