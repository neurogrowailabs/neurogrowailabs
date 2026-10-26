@extends('layouts.app')

@section('title', 'Política de Privacidad, Confidencialidad (NDA) y Tratamiento de Datos')

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
.legal-content ul, .legal-content ol {
    padding-left: 24px;
    margin-bottom: 20px;
}
.legal-content li {
    margin-bottom: 10px;
}
.legal-content strong {
    color: #ffffff;
}
.nda-badge-box {
    border-left: 4px solid var(--color-iris-violet, #9281f7);
    background: rgba(146, 129, 247, 0.08);
    padding: 20px 24px;
    border-radius: 0 12px 12px 0;
    margin: 28px 0;
    color: #ede9fe;
    font-size: 14.5px;
    line-height: 1.7;
}
.nda-badge-box strong {
    color: var(--color-iris-violet, #9281f7);
    display: block;
    font-size: 15px;
    margin-bottom: 8px;
}
@media print {
    body { background: #ffffff !important; color: #000000 !important; }
    .legal-page { background: #ffffff !important; color: #000000 !important; padding: 20px !important; }
    .legal-top-nav, .legal-action-btn { display: none !important; }
    .legal-title, .legal-content h2, .legal-content strong { color: #000000 !important; }
    .legal-content p, .legal-content li { color: #222222 !important; }
    .nda-badge-box { border-left-color: #000000 !important; background: #f3f3f3 !important; color: #000000 !important; }
}
</style>
@endpush

@section('content')
<main class="legal-page">
    <div class="legal-container">

        <header class="legal-header">
            @include('partials.legal-nav')
            <h1 class="legal-title">POLÍTICA DE PRIVACIDAD & ACUERDO DE CONFIDENCIALIDAD (NDA)</h1>
            <div class="legal-meta">
                <span><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Compliance: LOPDP Ecuador</span>
                <span><i class="fa-solid fa-file-contract" aria-hidden="true"></i> Versión: {{ $legalVersion }}</span>
                <span><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Última actualización: {{ $lastUpdated }}</span>
            </div>
        </header>

        <article class="legal-content">
            <p>
                En <strong>BioCoreXStack Software Labs</strong> tratamos la información de nuestros usuarios, clientes y aliados comerciales con estricto apego a la <strong>Ley Orgánica de Protección de Datos Personales (LOPDP)</strong> de la República del Ecuador y a las mejores prácticas internacionales de seguridad de la información.
            </p>

            <div class="nda-badge-box" role="region" aria-label="Compromiso de Confidencialidad Comercial">
                <strong>🔒 CLÁUSULA DE CONFIDENCIALIDAD COMERCIAL (NDA MUTUO Y UNILATERAL):</strong>
                Toda idea de negocio, modelo operativo, flujo de datos, arquitectura o requerimiento técnico compartido por un prospecto a través de nuestro buscador de Diagnóstico Inteligente, formularios web o sesiones de cotización está amparada bajo estricto secreto profesional y confidencialidad comercial. BioCoreXStack se compromete a no divulgar, replicar ni utilizar dicha información confidencial para fines distintos a la evaluación y cotización de la solución solicitada.
            </div>

            <h2>1. Principio de Minimización de Datos</h2>
            <p>
                De acuerdo con el principio de proporcionalidad de la LOPDP, en nuestros formularios y herramientas de diagnóstico únicamente recolectamos los datos estrictamente necesarios para brindar la asesoría técnica:
            </p>
            <ul>
                <li><strong>Datos de Identificación y Contacto:</strong> Nombre del contacto, nombre de la empresa/marca, correo electrónico y número de WhatsApp.</li>
                <li><strong>Requerimiento Técnico:</strong> Tipo de sistema solicitado, especificaciones de stack tecnológico y volumen estimado.</li>
                <li><strong>Datos Técnicos de Conexión:</strong> Dirección IP, User-Agent del navegador y marcas de tiempo UTC con fines exclusivos de prevención de ataques, trazabilidad legal y seguridad L7.</li>
                <li><strong>Datos Excluidos:</strong> Jamás solicitamos ni almacenamos claves bancarias, números de tarjetas de crédito sin tokenizar ni datos sensibles no pertinentes.</li>
            </ul>

            <h2>2. Finalidades del Tratamiento de Datos</h2>
            <p>Los datos suministrados por el titular se emplean para los siguientes fines legítimos:</p>
            <ol>
                <li>Generar y remitir el diagnóstico de arquitectura técnica y la cotización personalizada.</li>
                <li>Establecer contacto comercial directo a través del canal oficial de WhatsApp o correo electrónico corporativo.</li>
                <li>Gestionar la relación contractual y el soporte técnico de los proyectos aprobados.</li>
                <li>Cuando la dimensión operativa del proyecto lo amerite, coordinar la ejecución a través de la <strong>Red de Desarrolladores y Partners Certificados de BioCoreXStack</strong>, siempre bajo rigurosos acuerdos de confidencialidad y procesamiento de datos (DPA / NDA).</li>
            </ol>

            <h2>3. Vinculación con el Ecosistema de Productos Propios (MiVeci)</h2>
            <p>
                Los usuarios que interactúen con nuestra plataforma PWA insignia <strong>MiVeci</strong> o utilicen el enlace de cotización para escalar su arquitectura se benefician de la misma política de protección de datos: los datos de micronegocios, coordenadas de geocercas y catálogos procesados por modelos de visión computacional de Gemini se gestionan de forma cifrada en tránsito y en reposo.
            </p>

            <h2>4. Transferencia y Almacenamiento Seguro</h2>
            <p>
                BioCoreXStack no vende ni comercializa bases de datos personales bajo ningún concepto. Los datos se almacenan en infraestructura cloud de alta disponibilidad (Render, Cloudflare R2, MongoDB Atlas y servidores protegidos con cifrado TLS 1.3), con cortafuegos perimetrales y políticas de mínimo privilegio de acceso.
            </p>

            <h2>5. Derechos ARCO y Mecanismo de Baja Inmediata</h2>
            <p>
                Conforme al ordenamiento jurídico ecuatoriano, el titular puede ejercer en todo momento sus derechos de <strong>Acceso, Rectificación, Cancelación y Oposición (ARCO)</strong> o revocar su consentimiento comercial:
            </p>
            <ul>
                <li><strong>Vía Correo Electrónico:</strong> Remitiendo su solicitud a <code>legal@biocorexstack.com</code>.</li>
                <li><strong>Vía WhatsApp:</strong> Respondiendo en cualquier momento con la palabra <strong>"BAJA"</strong> al hilo de conversación comercial de BioCoreXStack.</li>
            </ul>
            <p>
                Su solicitud será atendida y procesada en un plazo máximo de cuarenta y ocho (48) horas hábiles, procediendo al bloqueo y eliminación definitiva de sus datos de contacto de nuestras listas comerciales.
            </p>
        </article>

    </div>
</main>
@endsection
