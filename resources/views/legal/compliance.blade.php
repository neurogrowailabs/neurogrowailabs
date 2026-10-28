@extends('layouts.app')

@section('title', 'Gobernanza & Marco de Cumplimiento Legal — NeuroGrow AI Labs')

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
.compliance-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding-bottom: 32px;
    margin-bottom: 40px;
}
.compliance-page-title {
    font-family: var(--font-condensed, 'Bebas Neue', sans-serif);
    font-size: clamp(34px, 5.5vw, 56px);
    color: #ffffff;
    letter-spacing: 0.02em;
    line-height: 1.05;
    margin: 0 0 14px 0;
}
.compliance-page-subtitle {
    font-size: 15px;
    line-height: 1.65;
    color: var(--color-fog-text, #9d9797);
    max-width: 860px;
    margin: 0;
}
.compliance-meta-bar {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 18px;
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: var(--color-fog-text, #9d9797);
}
.compliance-meta-bar span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.compliance-pillars-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-bottom: 50px;
}
@media (max-width: 768px) {
    .compliance-pillars-grid {
        grid-template-columns: 1fr;
    }
}
.pillar-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 28px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
}
.pillar-card:hover {
    transform: translateY(-3px);
    border-color: rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.04);
}
.pillar-badge {
    font-family: var(--font-mono, monospace);
    font-size: 10px;
    letter-spacing: 0.1em;
    font-weight: 700;
    margin-bottom: 10px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
}
.pillar-title {
    font-family: var(--font-condensed, 'Bebas Neue', sans-serif);
    font-size: 25px;
    color: #ffffff;
    letter-spacing: 0.02em;
    margin: 0 0 12px 0;
    line-height: 1.15;
}
.pillar-desc {
    font-size: 13.5px;
    line-height: 1.65;
    color: #b7b3b3;
    margin-bottom: 24px;
}
.pillar-action-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: #3ad389;
    text-decoration: none;
    font-weight: 600;
    letter-spacing: 0.04em;
    padding: 8px 14px;
    border-radius: 6px;
    background: rgba(58, 211, 137, 0.08);
    border: 1px solid rgba(58, 211, 137, 0.25);
    transition: all 0.2s ease;
}
.pillar-action-link:hover {
    gap: 12px;
    color: #ffffff;
    background: rgba(58, 211, 137, 0.2);
    border-color: #3ad389;
}
.compliance-contact-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 28px 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 30px;
}
.compliance-contact-info h3 {
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    margin: 0 0 6px 0;
}
.compliance-contact-info p {
    font-size: 13.5px;
    color: var(--color-fog-text, #9d9797);
    margin: 0;
    line-height: 1.5;
}
.compliance-contact-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}
</style>
@endpush

@section('content')
<main class="compliance-page">
    <div class="compliance-container">

        <!-- Barra de Navegación Unificada de Todo el Centro Legal -->
        @include('partials.legal-nav')

        <!-- Encabezado del Marco de Gobernanza -->
        <header class="compliance-header">
            <h1 class="compliance-page-title">GOBERNANZA, PRIVACIDAD & MARCO DE CUMPLIMIENTO LEGAL</h1>
            <p class="compliance-page-subtitle">
                Arquitectura jurídica y tratamiento de datos personales conforme a la <strong>Ley Orgánica de Protección de Datos Personales (LOPDP)</strong> y la <strong>Ley de Comercio Electrónico</strong> de la República del Ecuador. Conoce a continuación los pilares normativos aplicables a cada desarrollo de software, modelo de IA y servicio contratado.
            </p>
            <div class="compliance-meta-bar">
                <span><i class="fa-solid fa-scale-balanced" aria-hidden="true" style="color: #3ad389;"></i> Jurisdicción: República del Ecuador</span>
                <span><i class="fa-solid fa-file-shield" aria-hidden="true" style="color: var(--color-iris-violet);"></i> Versión: {{ $legalVersion }}</span>
                <span><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Actualización: {{ $lastUpdated }}</span>
            </div>
        </header>

        <!-- Rejilla de los 6 Pilares de Cumplimiento -->
        <div class="compliance-pillars-grid">

            <!-- PILAR 1: Contrato Marco MSA -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: #fd8925;">
                        <i class="fa-solid fa-file-contract"></i> Pilar 01 · Contratación & Servicios
                    </span>
                    <h2 class="pillar-title">Términos de Uso & Contrato Marco (MSA)</h2>
                    <p class="pillar-desc">
                        Establece las reglas de prestación de servicios de software e ingeniería a medida: titularidad de código entregable al cliente, 50% de anticipo, <strong>derecho de retracto legal de 5 días hábiles</strong> y la cláusula formal de limitación de responsabilidad financiera ante caídas de proveedores de nube externos (AWS, Google Cloud, Cloudflare, Render, OpenAI).
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.terminos') }}" class="pillar-action-link" aria-label="Leer Contrato Marco de Servicios MSA completo">
                        <span>Leer Contrato MSA Completo</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

            <!-- PILAR 2: Privacidad & NDA -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: var(--color-iris-violet, #9281f7);">
                        <i class="fa-solid fa-user-shield"></i> Pilar 02 · Privacidad LOPDP & NDA
                    </span>
                    <h2 class="pillar-title">Política de Privacidad & Confidencialidad Comercial</h2>
                    <p class="pillar-desc">
                        Regula el tratamiento de datos personales bajo la LOPDP ecuatoriana: principio de minimización de datos en solicitudes de cotización, <strong>Acuerdo de Confidencialidad Comercial (NDA mutuo y unilateral)</strong> que blinda tus ideas de negocio, modelos y requerimientos compartidos, y ejercicio de derechos ARCO con baja automática vía WhatsApp.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.privacidad') }}" class="pillar-action-link" aria-label="Leer Política de Privacidad y Acuerdo de Confidencialidad">
                        <span>Leer Política de Privacidad & NDA</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

            <!-- PILAR 3: Cookies -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: #3ad389;">
                        <i class="fa-solid fa-cookie-bite"></i> Pilar 03 · Gobernanza Web
                    </span>
                    <h2 class="pillar-title">Política & Gestión Granular de Cookies</h2>
                    <p class="pillar-desc">
                        Garantiza transparencia total sobre el almacenamiento local en tu navegador: clasificación estricta entre cookies técnicas indispensables para el funcionamiento web y cookies analíticas de rendimiento. Permite al usuario activar, desactivar o revocar sus preferencias en cualquier momento sin fricción.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.cookies') }}" class="pillar-action-link" aria-label="Gestionar y configurar cookies">
                        <span>Gestionar y Configurar Cookies</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

            <!-- PILAR 4: Protocolo de Consentimiento -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: #fd8925;">
                        <i class="fa-solid fa-square-check"></i> Pilar 04 · Consentimiento Informado
                    </span>
                    <h2 class="pillar-title">Protocolo de Consentimiento & Doble Casilla</h2>
                    <p class="pillar-desc">
                        En riguroso apego a los Artículos 12 y 15 de la LOPDP, NeuroGrow AI Labs prohíbe de forma absoluta las casillas preseleccionadas o los consentimientos agrupados. Cada formulario técnico y diagnóstico con IA exige marcar de forma individual e informada tanto el Contrato MSA como la Política de Privacidad & NDA.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.terminos') }}#consentimiento" class="pillar-action-link" aria-label="Ver cláusula de consentimiento en Términos MSA">
                        <span>Ver Cláusula de Consentimiento en MSA</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

            <!-- PILAR 5: Trazabilidad y Fe Digital -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: var(--color-iris-violet, #9281f7);">
                        <i class="fa-solid fa-database"></i> Pilar 05 · Ley de Comercio Electrónico
                    </span>
                    <h2 class="pillar-title">Trazabilidad Forense, Registro Probatorio & Fe Digital</h2>
                    <p class="pillar-desc">
                        Bajo los Artículos 2, 45 y 47 de la Ley de Comercio Electrónico de Ecuador, toda aceptación electrónica genera un registro probatorio inmutable (captura de IP real, User-Agent, sellado temporal UTC exacto y código único de referencia <code>NGAI-LEGAL</code>) que otorga validez legal, auditoría y no repudio ante controversias.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.terminos') }}#auditoria" class="pillar-action-link" aria-label="Ver protocolo de trazabilidad en Términos MSA">
                        <span>Ver Protocolo de Trazabilidad en MSA</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

            <!-- PILAR 6: Seguridad Técnica y SLA -->
            <article class="pillar-card">
                <div>
                    <span class="pillar-badge" style="color: #3ad389;">
                        <i class="fa-solid fa-shield-halved"></i> Pilar 06 · Seguridad Técnica Art. 37 LOPDP
                    </span>
                    <h2 class="pillar-title">Estándares de Seguridad de la Información & SLA</h2>
                    <p class="pillar-desc">
                        Medidas técnicas y organizativas para la protección perimetral del software: limitación estricta de tasa (Rate Limiting de 15 req/min) para mitigar ataques DoS y scraping no autorizado, sanitización de inputs, comunicaciones cifradas con TLS 1.3 y estándares de accesibilidad universal WCAG 2.1 AA.
                    </p>
                </div>
                <div>
                    <a href="{{ route('legal.terminos') }}#seguridad" class="pillar-action-link" aria-label="Ver anexo de seguridad y SLA en Términos MSA">
                        <span>Ver Anexo de Seguridad y SLA en MSA</span> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- Tarjeta de Contacto Directo con el Área Legal -->
        <div class="compliance-contact-card">
            <div class="compliance-contact-info">
                <h3>¿Necesitas un Acuerdo de Confidencialidad (NDA) específico o asesoría corporativa?</h3>
                <p>Nuestro equipo legal y de arquitectura técnica atiende requerimientos contractuales especiales para empresas y proyectos de alta envergadura.</p>
            </div>
            <div class="compliance-contact-actions">
                <a href="mailto:legal@neurogrowailabs.website" class="legal-action-btn">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i> <span>legal@neurogrowailabs.website</span>
                </a>
                <a href="{{ $whatsappGlobal ?? 'https://wa.me/593983267552' }}" target="_blank" rel="noopener" class="legal-action-btn" style="border-color: rgba(58, 211, 137, 0.4); color: #3ad389;">
                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <span>WhatsApp Legal (+593 98 326 7552)</span>
                </a>
            </div>
        </div>

    </div>
</main>
@endsection
