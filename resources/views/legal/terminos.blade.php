@extends('layouts.app')

@section('title', 'Términos de Uso y Contrato Marco de Servicios (MSA)')

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
.liability-callout {
    border-left: 4px solid #f59e0b;
    background: rgba(245, 158, 11, 0.08);
    padding: 20px 24px;
    border-radius: 0 12px 12px 0;
    margin: 28px 0;
    color: #fef3c7;
    font-size: 14.5px;
    line-height: 1.7;
}
.liability-callout strong {
    color: #f59e0b;
    display: block;
    font-size: 15px;
    margin-bottom: 8px;
}
.legal-footer-box {
    margin-top: 50px;
    padding: 24px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}
@media print {
    body { background: #ffffff !important; color: #000000 !important; }
    .legal-page { background: #ffffff !important; color: #000000 !important; padding: 20px !important; }
    .legal-top-nav, .legal-action-btn { display: none !important; }
    .legal-title, .legal-content h2, .legal-content strong { color: #000000 !important; }
    .legal-content p, .legal-content li { color: #222222 !important; }
    .liability-callout { border-left-color: #000000 !important; background: #f3f3f3 !important; color: #000000 !important; }
}
</style>
@endpush

@section('content')
<main class="legal-page">
    <div class="legal-container">

        <header class="legal-header">
            @include('partials.legal-nav')
            <h1 class="legal-title">TÉRMINOS DE USO & CONTRATO MARCO DE SERVICIOS (MSA)</h1>
            <div class="legal-meta">
                <span><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> Versión: {{ $legalVersion }}</span>
                <span><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Última actualización: {{ $lastUpdated }}</span>
                <span><i class="fa-solid fa-globe" aria-hidden="true"></i> Jurisdicción: República del Ecuador</span>
            </div>
        </header>

        <article class="legal-content">
            <p>
                El presente documento establece las condiciones vinculantes de acceso y uso del portal web <strong>NeuroGrow AI Labs</strong>, así como los términos marco que rigen la contratación de servicios de desarrollo de software, Inteligencia Artificial aplicada y consultoría técnica prestados por el laboratorio.
            </p>

            <h2>1. Naturaleza Jurídica y Objeto de NeuroGrow AI Labs</h2>
            <p>
                <strong>NeuroGrow AI Labs</strong> (en adelante, "NeuroGrow AI Labs") opera como un estudio especializado de ingeniería de software, arquitectura web y móvil Full-Stack, implementación de modelos de Inteligencia Artificial (LLMs y visión computacional), ciencia de datos experimental (DoE y bioestadística) y es la entidad desarrolladora y titular del ecosistema propietario hiperlocal <strong>MiVeci</strong>.
            </p>

            <h2>2. Uso del Módulo de "Diagnóstico Inteligente con IA"</h2>
            <p>
                El motor interactivo de diagnóstico de arquitectura disponible en la plataforma procesa los requerimientos indicados por el usuario mediante algoritmos de evaluación técnica heurística. 
            </p>
            <ul>
                <li>Las especificaciones de stack tecnológico, cronogramas sugeridos y estimaciones presupuestarias generadas por dicho buscador tienen carácter <strong>exclusivamente informativo y referencial</strong>.</li>
                <li>Ningún diagnóstico automático constituye una oferta contractual vinculante hasta la emisión y aceptación formal de una Orden de Trabajo o Propuesta Técnico-Económica firmada entre las partes.</li>
            </ul>

            <h2>3. Propiedad Intelectual y Titularidad de Entregables</h2>
            <ol>
                <li><strong>Entregables del Cliente:</strong> Una vez liquidado el cien por ciento (100%) del valor pactado en la orden de servicio correspondiente, el Cliente adquirirá la titularidad plena o licencia perpetua intransferible sobre la interfaz frontal, personalizaciones específicas y el código fuente a medida desarrollado exclusivamente para su proyecto.</li>
                <li><strong>Activos Preexistentes de NeuroGrow AI Labs:</strong> NeuroGrow AI Labs conserva la propiedad intelectual exclusiva e inalienable sobre sus motores base, agentes autónomos, frameworks internos, metodologías DoE, librerías utilitarias, prompts propietarios y arquitecturas modulares preexistentes, otorgando al Cliente únicamente una licencia de uso no exclusiva para la operación de su solución.</li>
            </ol>

            <h2>4. Política Comercial, Anticipos y Derecho de Retracto Legal</h2>
            <p>
                De conformidad con la <strong>Ley de Comercio Electrónico, Firmas Electrónicas y Mensajes de Datos</strong> y las disposiciones mercantiles vigentes en la República del Ecuador:
            </p>
            <ul>
                <li><strong>Esquema de Pago:</strong> Todo desarrollo a medida requiere un anticipo formal estipulado en la cotización (habitualmente el 50% al inicio) y el saldo restante contra entrega y verificación funcional en ambiente de pruebas (Staging).</li>
                <li><strong>Derecho de Retracto Legal:</strong> Tratándose de servicios digitales contratados a distancia, el cliente podrá ejercer su derecho de retracto dentro del término de <strong>cinco (5) días hábiles</strong> posteriores al pago del anticipo, siempre y cuando <strong>no haya iniciado la ejecución de código personalizado</strong>, ni se hayan aprovisionado dominios, licencias cloud de terceros o servidores dedicados.</li>
                <li><strong>Horas de Ingeniería Devengadas:</strong> Una vez iniciada la fase de codificación, aprovisionamiento de infraestructura o entregado el diseño de arquitectura, el anticipo cubrirá los costos y horas de ingeniería devengadas y no será reembolsable.</li>
            </ul>

            <div class="liability-callout" role="alert">
                <strong>⚠️ CLÁUSULA DE LIMITACIÓN DE RESPONSABILIDAD:</strong>
                NeuroGrow AI Labs no se hace responsable por caídas de proveedores externos (AWS, Google Cloud, Cloudflare, Render, APIs de terceros o pasarelas de pago), mal uso de las credenciales por parte del cliente, ni por lucro cesante. En cualquier escenario, la responsabilidad máxima total de NeuroGrow AI Labs estará limitada estrictamente al monto efectivamente pagado por el Cliente por el servicio específico durante los últimos tres (3) meses.
            </div>

            <h2>5. SLA, Garantía Funcional y Mantenimiento</h2>
            <p>
                Todo proyecto entregado cuenta con un periodo de garantía de soporte técnico de <strong>treinta (30) días calendario</strong> a partir de su entrega en producción, cubriendo la corrección de errores atribuibles al código fuente entregado. Modificaciones posteriores, fallos originados por cambios en APIs de terceros o alteraciones no autorizadas por parte del cliente quedarán excluidos de la garantía y se cotizarán como soporte extendido.
            </p>

            <h2>6. Legislación Aplicable y Resolución de Controversias</h2>
            <p>
                Los presentes Términos se rigen e interpretan con arreglo a las leyes de la <strong>República del Ecuador</strong>. Para cualquier divergencia derivada de la interpretación o ejecución de este contrato marco, las partes acuerdan privilegiar el diálogo directo y, en su defecto, someterse a la mediación en un Centro de Arbitraje y Mediación acreditado en la ciudad de Quito o Guayaquil, Ecuador.
            </p>

            <h2 id="consentimiento">7. Consentimiento Libre, Informado y Regla de Doble Casilla Separada</h2>
            <p>
                De rigurosa conformidad con los Artículos 12, 14 y 15 de la <strong>Ley Orgánica de Protección de Datos Personales (LOPDP)</strong> de la República del Ecuador:
            </p>
            <ul>
                <li><strong>Prohibición de Casillas Premarcadas:</strong> Todo consentimiento otorgado en los canales digitales de NeuroGrow AI Labs (incluyendo el Diagnóstico Inteligente con IA y formularios de contacto) exige una acción afirmativa y consciente del usuario. Queda terminantemente prohibido el uso de casillas preseleccionadas o casillas únicas que agrupen finalidades heterogéneas.</li>
                <li><strong>Doble Casilla Independiente:</strong> El usuario debe validar por separado: (a) La aceptación contractual de este Contrato Marco (MSA); y (b) La Política de Privacidad, Tratamiento de Datos Personales y Acuerdo de Confidencialidad (NDA). La omisión de cualquiera de las dos casillas impedirá automáticamente el envío del requerimiento técnico.</li>
            </ul>

            <h2 id="auditoria">8. Protocolo de Trazabilidad, Registro Probatorio y Fe Digital</h2>
            <p>
                Al amparo de los Artículos 2, 45 y 47 de la <strong>Ley de Comercio Electrónico, Firmas Electrónicas y Mensajes de Datos</strong> del Ecuador:
            </p>
            <ul>
                <li><strong>Registro Inmutable:</strong> Cada manifestación de consentimiento y aceptación contractual electrónica se asocia a un registro probatorio inmutable en base de datos (<code>b2b_consent_logs</code>), que captura la dirección IP pública real del solicitante, encabezado User-Agent, sello de tiempo en estándar UTC exacto y la versión vigente de los términos aceptados.</li>
                <li><strong>Referencia Forense y No Repudio:</strong> Al generarse una consulta técnica o cotización, el sistema genera un identificador único de trazabilidad (ej. <code>NGAI-LEGAL-XXXXXX</code>) que acompaña las comunicaciones oficiales vía WhatsApp o correo electrónico, constituyendo prueba documental válida de la manifestación de voluntad de las partes.</li>
            </ul>

            <h2 id="seguridad">9. Estándares de Seguridad de la Información, SLA y Blindaje Técnico</h2>
            <p>
                En cumplimiento del deber de seguridad técnica y organizativa estipulado en el Artículo 37 de la LOPDP:
            </p>
            <ul>
                <li><strong>Mitigación de Abusos y Rate Limiting:</strong> Los endpoints de la plataforma y del motor de diagnóstico cuentan con limitación de tasa estricta (15 peticiones por minuto por dirección IP) para mitigar vectores de denegación de servicio (DoS), ataques de fuerza bruta y raspado de datos (scraping) no autorizado.</li>
                <li><strong>Cifrado y Sanitización:</strong> Todo el tráfico de datos se canaliza a través de protocolos seguros con cifrado TLS 1.3 de extremo a extremo. Los datos ingresados son sometidos a validación y sanitización estricta para neutralizar inyecciones de código o sobrecarga de búferes.</li>
                <li><strong>Accesibilidad Universal (WCAG 2.1 AA):</strong> La arquitectura de interfaz garantiza navegación accesible mediante teclado, contraste visual normalizado y cumplimiento de estándares para personas con capacidades diversas.</li>
            </ul>

            <div class="legal-footer-box">
                <div>
                    <strong>¿Preguntas sobre este contrato marco?</strong>
                    <div style="font-size: 13px; color: var(--color-fog-text); margin-top: 4px;">Atención legal directa para empresas y prospectos corporativos.</div>
                </div>
                <a href="mailto:legal@neurogrowailabs.website" class="legal-action-btn">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i> Contactar al Área Legal
                </a>
            </div>
        </article>

    </div>
</main>
@endsection
