@extends('layouts.app')

@section('title', 'Política y Configuración de Cookies')

@push('styles')
<style>
.legal-page {
    background-color: var(--bg-principal, #000000);
    color: var(--color-ash-text, #d1cece);
    min-height: 100vh;
    padding: 120px 20px 80px;
    font-family: var(--font-inter, sans-serif);
}
.legal-container {
    max-width: 880px;
    margin: 0 auto;
}
.legal-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding-bottom: 28px;
    margin-bottom: 40px;
}
.legal-top-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}
.legal-back-btn, .legal-action-btn {
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
    cursor: pointer;
    transition: all 0.2s ease;
}
.legal-back-btn:hover, .legal-action-btn:hover {
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.08);
}
.legal-title {
    font-family: var(--font-condensed, 'Bebas Neue', sans-serif);
    font-size: clamp(32px, 5vw, 54px);
    color: #ffffff;
    letter-spacing: 0.02em;
    line-height: 1.05;
    margin: 0 0 12px 0;
}
.legal-meta {
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: var(--color-fog-text, #9d9797);
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}
.legal-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.legal-content h2 {
    font-family: var(--font-condensed, sans-serif);
    font-size: 26px;
    color: #ffffff;
    letter-spacing: 0.03em;
    margin: 40px 0 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    padding-bottom: 8px;
}
.legal-content p, .legal-content li {
    font-size: 15px;
    line-height: 1.75;
    color: #d1cece;
    margin-bottom: 16px;
}
.legal-content ul {
    padding-left: 24px;
    margin-bottom: 20px;
}
.legal-content li {
    margin-bottom: 10px;
}
.legal-content strong {
    color: #ffffff;
}
.cookie-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
}
.cookie-card-info h3 {
    font-family: var(--font-condensed, sans-serif);
    font-size: 20px;
    color: #ffffff;
    margin: 0 0 8px 0;
    letter-spacing: 0.02em;
}
.cookie-card-info p {
    font-size: 14px;
    margin: 0;
    color: var(--color-fog-text, #9d9797);
}
.cookie-status-badge {
    font-family: var(--font-mono, monospace);
    font-size: 10px;
    padding: 4px 10px;
    border-radius: 20px;
    letter-spacing: 0.05em;
    white-space: nowrap;
}
.cookie-status-badge.required {
    background: rgba(58, 211, 137, 0.12);
    color: #3ad389;
    border: 1px solid rgba(58, 211, 137, 0.3);
}
.cookie-status-badge.optional {
    background: rgba(146, 129, 247, 0.12);
    color: var(--color-iris-violet, #9281f7);
    border: 1px solid rgba(146, 129, 247, 0.3);
}
@media print {
    body { background: #ffffff !important; color: #000000 !important; }
    .legal-page { background: #ffffff !important; color: #000000 !important; padding: 20px !important; }
    .legal-top-nav, .legal-action-btn { display: none !important; }
    .legal-title, .legal-content h2, .legal-content strong, .cookie-card-info h3 { color: #000000 !important; }
    .legal-content p, .cookie-card-info p { color: #222222 !important; }
    .cookie-card { border-color: #cccccc !important; background: #fafafa !important; }
}
</style>
@endpush

@section('content')
<main class="legal-page">
    <div class="legal-container">

        <header class="legal-header">
            @include('partials.legal-nav')
            <h1 class="legal-title">POLÍTICA Y GESTIÓN DE COOKIES</h1>
            <div class="legal-meta">
                <span><i class="fa-solid fa-cookie-bite" aria-hidden="true"></i> Categoría: Gobernanza y Privacidad Digital</span>
                <span><i class="fa-solid fa-file-contract" aria-hidden="true"></i> Versión: {{ $legalVersion }}</span>
                <span><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Última actualización: {{ $lastUpdated }}</span>
            </div>
        </header>

        <article class="legal-content">
            <p>
                Esta Política explica con transparencia cómo <strong>BioCoreXStack Software Labs</strong> utiliza cookies, tokens de sesión y tecnologías de almacenamiento local en el navegador para garantizar la seguridad, rendimiento y navegación fluida en nuestra web.
            </p>

            <h2>1. ¿Qué son las cookies y qué tecnologías utilizamos?</h2>
            <p>
                Las cookies son pequeños archivos de texto que se almacenan en su navegador cuando visita un sitio web. En BioCoreXStack utilizamos cookies HTTP estrictamente seguras (con banderas <code>HttpOnly</code>, <code>SameSite=Lax</code> y <code>Secure</code> vía TLS) y almacenamiento <code>localStorage</code> exclusivamente para registrar sus preferencias de visualización y consentimiento legal.
            </p>

            <h2>2. Categorías de Cookies en BioCoreXStack</h2>

            <div class="cookie-card">
                <div class="cookie-card-info">
                    <h3>1. Cookies Técnicas y Esenciales</h3>
                    <p>
                        Indispensables para el funcionamiento del sitio. Permiten la protección contra ataques de falsificación de peticiones en sitios cruzados (CSRF token), la gestión de sesiones seguras del framework Laravel y la inicialización fluida del motor de animación cinemática GSAP. No pueden desactivarse.
                    </p>
                </div>
                <span class="cookie-status-badge required">SIEMPRE ACTIVAS</span>
            </div>

            <div class="cookie-card">
                <div class="cookie-card-info">
                    <h3>2. Cookies de Analítica y Rendimiento</h3>
                    <p>
                        Recopilan métricas agregadas y completamente anonimizadas sobre tiempos de respuesta, velocidad del servidor en Render y estabilidad de los scripts. Nos ayudan a identificar errores técnicos y mejorar la latencia del sitio sin almacenar identificadores individuales de usuarios.
                    </p>
                </div>
                <span class="cookie-status-badge optional">CONFIGURABLE</span>
            </div>

            <div class="cookie-card">
                <div class="cookie-card-info">
                    <h3>3. Cookies de Marketing B2B y Atribución</h3>
                    <p>
                        Permiten registrar el canal de procedencia del usuario cuando solicita un diagnóstico técnico o una cotización de desarrollo a través de WhatsApp, garantizando que el origen de la consulta se asocie correctamente a la campaña o referencia B2B correspondiente.
                    </p>
                </div>
                <span class="cookie-status-badge optional">CONFIGURABLE</span>
            </div>

            <h2>3. Gestión y Revocación del Consentimiento</h2>
            <p>
                Puede reabrir en cualquier momento el panel de configuración de cookies en nuestra web para modificar sus elecciones, o bien eliminar las cookies almacenadas directamente desde la configuración de seguridad de su navegador:
            </p>
            <ul>
                <li><strong>Google Chrome:</strong> Configuración &gt; Privacidad y seguridad &gt; Cookies de terceros.</li>
                <li><strong>Apple Safari:</strong> Preferencias &gt; Privacidad &gt; Administrar datos de sitios web.</li>
                <li><strong>Mozilla Firefox:</strong> Ajustes &gt; Privacidad &amp; Seguridad &gt; Cookies y datos del sitio.</li>
                <li><strong>Microsoft Edge:</strong> Configuración &gt; Cookies y permisos del sitio.</li>
            </ul>

            <div style="margin-top: 40px; padding: 24px; border-radius: 12px; background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08); text-align: center;">
                <p style="margin-bottom: 16px;">¿Deseas restablecer tus preferencias de cookies en este navegador?</p>
                <button type="button" onclick="if(window.resetCookieConsent) { window.resetCookieConsent(); } else { localStorage.removeItem('bcxs_cookie_consent'); alert('Preferencias restablecidas.'); window.location.href='/'; }" class="legal-action-btn" style="background: rgba(146, 129, 247, 0.15); border-color: rgba(146, 129, 247, 0.4); color: #ffffff;">
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Restablecer Preferencias de Cookies
                </button>
            </div>
        </article>

    </div>
</main>
@endsection
