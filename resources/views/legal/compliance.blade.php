@extends('layouts.app')

@section('title', 'Cumplimiento Legal, Trazabilidad LOPDP & 6 Módulos')

@push('styles')
<style>
.compliance-page {
    background-color: var(--bg-principal, #000000);
    color: var(--color-ash-text, #d1cece);
    min-height: 100vh;
    padding: 120px 20px 80px;
    font-family: var(--font-inter, sans-serif);
}
.compliance-container {
    max-width: 1040px;
    margin: 0 auto;
}
.compliance-top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
    flex-wrap: wrap;
    gap: 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding-bottom: 20px;
}
.compliance-back-btn {
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--color-fog-text, #9d9797);
    padding: 8px 16px;
    border-radius: 6px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: rgba(255, 255, 255, 0.03);
    text-decoration: none;
    transition: all 0.2s ease;
}
.compliance-back-btn:hover {
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.08);
}
.compliance-nav-pills {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.compliance-nav-pill {
    font-family: var(--font-mono, monospace);
    font-size: 10px;
    letter-spacing: 0.05em;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    color: var(--color-fog-text, #9d9797);
    border: 1px solid rgba(255, 255, 255, 0.08);
    background: rgba(255, 255, 255, 0.02);
    transition: all 0.2s ease;
}
.compliance-nav-pill:hover, .compliance-nav-pill.active {
    color: #3ad389;
    border-color: rgba(58, 211, 137, 0.4);
    background: rgba(58, 211, 137, 0.08);
}
.compliance-page-title {
    font-family: var(--font-condensed, 'Bebas Neue', sans-serif);
    font-size: clamp(32px, 5vw, 54px);
    color: #ffffff;
    letter-spacing: 0.02em;
    line-height: 1.05;
    margin: 0 0 12px 0;
}
.compliance-page-subtitle {
    font-size: 15px;
    line-height: 1.6;
    color: var(--color-fog-text, #9d9797);
    max-width: 820px;
    margin-bottom: 40px;
}
.compliance-modules-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-bottom: 50px;
}
@media (max-width: 768px) {
    .compliance-modules-grid {
        grid-template-columns: 1fr;
    }
}
.module-box {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 28px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s ease, border-color 0.2s ease;
}
.module-box:hover {
    transform: translateY(-2px);
    border-color: rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.03);
}
.module-tag {
    font-family: var(--font-mono, monospace);
    font-size: 10px;
    letter-spacing: 0.1em;
    font-weight: 700;
    margin-bottom: 8px;
    display: inline-block;
}
.module-title {
    font-family: var(--font-condensed, 'Bebas Neue', sans-serif);
    font-size: 24px;
    color: #ffffff;
    letter-spacing: 0.02em;
    margin: 0 0 12px 0;
}
.module-body {
    font-size: 13.5px;
    line-height: 1.65;
    color: #b7b3b3;
    margin-bottom: 20px;
}
.module-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: #3ad389;
    text-decoration: none;
    font-weight: 600;
    letter-spacing: 0.05em;
    transition: gap 0.2s ease;
}
.module-action:hover {
    gap: 12px;
    color: #55f3a7;
}
.production-box {
    background: linear-gradient(180deg, rgba(58, 211, 137, 0.05) 0%, rgba(0, 0, 0, 0.4) 100%);
    border: 1px solid rgba(58, 211, 137, 0.3);
    border-radius: 14px;
    padding: 32px;
    margin-top: 20px;
}
.production-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 12px;
}
.production-badge {
    background: rgba(58, 211, 137, 0.15);
    color: #3ad389;
    border: 1px solid rgba(58, 211, 137, 0.4);
    padding: 4px 10px;
    border-radius: 20px;
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.pulse-circle {
    width: 8px;
    height: 8px;
    background: #3ad389;
    border-radius: 50%;
    animation: pulseGlow 1.8s infinite;
}
@keyframes pulseGlow {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(1.3); }
}
.production-links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
}
.prod-link-card {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 16px;
    text-decoration: none;
    transition: all 0.2s ease;
    display: block;
}
.prod-link-card:hover {
    border-color: #3ad389;
    transform: translateY(-2px);
    background: rgba(58, 211, 137, 0.05);
}
.prod-link-label {
    font-family: var(--font-mono, monospace);
    font-size: 10px;
    color: var(--color-fog-text, #9d9797);
    margin-bottom: 6px;
}
.prod-link-name {
    font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}
.prod-link-url {
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: #3ad389;
    word-break: break-all;
}
</style>
@endpush

@section('content')
<main class="compliance-page">
    <div class="compliance-container">
        
        <!-- Barra de Navegación Legal Superior -->
        <div class="compliance-top-bar">
            <a href="{{ route('home') }}" class="compliance-back-btn">
                <i class="fa-solid fa-arrow-left"></i> Volver a la Web Principal
            </a>
            <div class="compliance-nav-pills">
                <a href="{{ route('legal.compliance') }}" class="compliance-nav-pill active">
                    <i class="fa-solid fa-shield-halved"></i> 6 Módulos
                </a>
                <a href="{{ route('legal.terminos') }}" class="compliance-nav-pill">
                    Términos MSA
                </a>
                <a href="{{ route('legal.privacidad') }}" class="compliance-nav-pill">
                    Privacidad & NDA
                </a>
                <a href="{{ route('legal.cookies') }}" class="compliance-nav-pill">
                    Cookies
                </a>
            </div>
        </div>

        <!-- Encabezado del Apartado -->
        <header>
            <div style="display:flex; align-items:center; gap:8px; font-family:var(--font-mono, monospace); font-size:11px; color:#3ad389; margin-bottom:12px; text-transform:uppercase; letter-spacing:0.08em;">
                <i class="fa-solid fa-shield-halved"></i> Marco de Gobernanza & Blindaje Legal
            </div>
            <h1 class="compliance-page-title">CUMPLIMIENTO LEGAL, TRAZABILIDAD & 6 MÓDULOS B2B</h1>
            <p class="compliance-page-subtitle">
                Arquitectura de blindaje jurídico y tratamiento de datos personales conforme a la <strong>Ley Orgánica de Protección de Datos Personales (LOPDP)</strong> y la <strong>Ley de Comercio Electrónico</strong> de la República del Ecuador.
            </p>
        </header>

        <!-- Rejilla de los 6 Módulos -->
        <div class="compliance-modules-grid">
            
            <!-- MÓDULO 1 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:#fd8925;">MÓDULO 01 · CONTRATOS & SERVICIOS</span>
                    <h2 class="module-title">Términos de Uso & Contrato Marco (MSA)</h2>
                    <p class="module-body">
                        Reglas formales de contratación B2B: naturaleza de la agencia, propiedad intelectual de entregables, esquema de anticipos con <strong>derecho de retracto legal de 5 días hábiles</strong> y cláusula resaltada de limitación de responsabilidad frente a caídas de terceros (AWS, Cloudflare, Render, OpenAI).
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.terminos') }}" class="module-action">
                        <span>Ver Documento MSA Completo</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- MÓDULO 2 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:var(--color-iris-violet, #9281f7);">MÓDULO 02 · PROTECCIÓN DE DATOS</span>
                    <h2 class="module-title">Privacidad LOPDP & Confidencialidad (NDA)</h2>
                    <p class="module-body">
                        Minimización de datos en cotizaciones, <strong>Acuerdo de Confidencialidad Comercial (NDA)</strong> que protege tus ideas y algoritmos compartidos en el diagnóstico de IA, ejercicio de derechos ARCO y baja inmediata escribiendo "BAJA" a nuestro WhatsApp oficial.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.privacidad') }}" class="module-action">
                        <span>Ver Política & NDA</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- MÓDULO 3 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:#3ad389;">MÓDULO 03 · GOBERNANZA WEB</span>
                    <h2 class="module-title">Política & Banner Granular de Cookies</h2>
                    <p class="module-body">
                        Consentimiento transparente con conmutadores separados para cookies técnicas esenciales, analítica de tráfico y atribución B2B, garantizando almacenamiento local en navegador y revocación en un clic sin fricción.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.cookies') }}" class="module-action">
                        <span>Gestionar Cookies</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- MÓDULO 4 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:#fd8925;">MÓDULO 04 · CONSENTIMIENTO ACTIVO</span>
                    <h2 class="module-title">Doble Casilla Separada en Formularios</h2>
                    <p class="module-body">
                        Cero casillas premarcadas ni consentimientos agregados. Integrado en el Diagnóstico Inteligente de Arquitectura con validación en cliente que exige marcar de forma individual tanto el Contrato MSA como la Política de Privacidad & NDA.
                    </p>
                </div>
                <div>
                    <a href="{{ route('home') }}#finder" class="module-action">
                        <span>Ver en Diagnóstico IA</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- MÓDULO 5 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:var(--color-iris-violet, #9281f7);">MÓDULO 05 · AUDITORÍA PROBATORIA</span>
                    <h2 class="module-title">Trazabilidad Inmutable (b2b_consent_logs)</h2>
                    <p class="module-body">
                        Registro forense probatorio en base de datos: guarda IP real, User-Agent, fecha/hora UTC y versión legal. Además, inyecta la referencia formal de trazabilidad legal en el mensaje cifrado de WhatsApp enviado a los ingenieros.
                    </p>
                </div>
                <div>
                    <span style="font-family:var(--font-mono, monospace); font-size:11px; color:#3ad389;">
                        <i class="fa-solid fa-circle-check"></i> Base de Datos Migrada & Activa
                    </span>
                </div>
            </article>

            <!-- MÓDULO 6 -->
            <article class="module-box">
                <div>
                    <span class="module-tag" style="color:#3ad389;">MÓDULO 06 · SEGURIDAD TÉCNICA</span>
                    <h2 class="module-title">Rate Limiting, WCAG 2.1 & Sanitización</h2>
                    <p class="module-body">
                        Protección contra abusos y scraping con Rate Limiting estricto (15 req/min) en endpoints de diagnóstico y logging, validación exhaustiva de inputs de texto, accesibilidad por teclado y cero exposición de credenciales en el frontend.
                    </p>
                </div>
                <div>
                    <span style="font-family:var(--font-mono, monospace); font-size:11px; color:#3ad389;">
                        <i class="fa-solid fa-lock"></i> Middleware Throttle Activo
                    </span>
                </div>
            </article>

        </div>

        <!-- Bloque de Verificación en Producción -->
        <div class="production-box">
            <div class="production-header">
                <div>
                    <span class="production-badge">
                        <span class="pulse-circle"></span> CLÚSTER CLOUD · STATUS: 200 OK LIVE
                    </span>
                    <h3 style="color:#ffffff; font-size:20px; margin:10px 0 4px 0; font-family:var(--font-condensed, 'Bebas Neue', sans-serif); letter-spacing:0.02em;">
                        VERIFICACIÓN EN PRODUCCIÓN
                    </h3>
                    <p style="font-size:13px; color:var(--color-fog-text, #9d9797); margin:0;">
                        Valida en vivo los 4 puntos de acceso legales desplegados en la infraestructura cloud de Render:
                    </p>
                </div>
            </div>

            <div class="production-links-grid">
                <a href="https://biocorexstack.onrender.com" target="_blank" rel="noopener" class="prod-link-card">
                    <div class="prod-link-label">PORTAL PRINCIPAL</div>
                    <div class="prod-link-name">Web Principal <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:11px;"></i></div>
                    <div class="prod-link-url">https://biocorexstack.onrender.com</div>
                </a>

                <a href="https://biocorexstack.onrender.com/terminos-msa" target="_blank" rel="noopener" class="prod-link-card">
                    <div class="prod-link-label">CONTRATO MARCO</div>
                    <div class="prod-link-name">Términos MSA <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:11px;"></i></div>
                    <div class="prod-link-url">/terminos-msa</div>
                </a>

                <a href="https://biocorexstack.onrender.com/privacidad" target="_blank" rel="noopener" class="prod-link-card">
                    <div class="prod-link-label">LOPDP & CONFIDENCIALIDAD</div>
                    <div class="prod-link-name">Privacidad & NDA <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:11px;"></i></div>
                    <div class="prod-link-url">/privacidad</div>
                </a>

                <a href="https://biocorexstack.onrender.com/cookies" target="_blank" rel="noopener" class="prod-link-card">
                    <div class="prod-link-label">CONSENTIMIENTO</div>
                    <div class="prod-link-name">Cookies <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:11px;"></i></div>
                    <div class="prod-link-url">/cookies</div>
                </a>
            </div>
        </div>

    </div>
</main>
@endsection
