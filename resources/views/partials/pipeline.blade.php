<!-- ================= 3. LIVE WORKFLOW CANVAS (ARQUITECTURA SLASH 0:00 - 0:03) (SNAP SECTION 02) ================= -->
<style>
    /* Cimiento arquitectónico Slash (Sin luces ni sombras, puros bordes 1px #1c1d22) */
    #pipeline.slash-foundation-section {
        background-color: #000000;
        border-top: 1px solid #1c1d22;
        border-bottom: 1px solid #1c1d22;
        padding: 56px 0 40px;
        position: relative;
    }

    .slash-vault-frame {
        background-color: #040406;
        border: 1px solid #1c1d22;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        box-shadow: none !important;
    }

    .slash-ledger-layout {
        display: grid;
        grid-template-columns: 210px 1fr;
        width: 100%;
    }

    .slash-vault-sidebar {
        background-color: #040406;
        border-right: 1px solid #1c1d22;
        padding: 18px 14px;
        display: flex;
        flex-direction: column;
        gap: 4px;
        user-select: none;
        mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 15%, rgba(0,0,0,0.08) 75%, transparent 100%);
        -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 15%, rgba(0,0,0,0.08) 75%, transparent 100%);
    }

    .slash-sidebar-brand {
        font-family: var(--font-mono);
        font-size: 11px;
        color: #9194a1;
        letter-spacing: 0.08em;
        padding: 4px 8px 14px;
        border-bottom: 1px solid #1c1d22;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .slash-sidebar-link {
        font-size: 12px;
        color: #5e616e;
        padding: 7px 10px;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: var(--font-mono);
    }

    .slash-sidebar-link.active {
        background-color: #121317;
        color: #e2e3e9;
        border: 1px solid #1c1d22;
    }

    .slash-vault-body {
        display: flex;
        flex-direction: column;
        background-color: #040406;
        min-width: 0;
    }

    #pipeline .workflow-header-bar {
        background-color: #08080a !important;
        border-bottom: 1px solid #1c1d22 !important;
        padding: 14px 20px !important;
        margin: 0 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }

    #pipeline .nodes-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
        border-bottom: 1px solid #1c1d22 !important;
        background-color: #040406 !important;
    }

    #pipeline .node-card {
        background: #040406 !important;
        border: none !important;
        border-right: 1px solid #1c1d22 !important;
        border-radius: 0 !important;
        padding: 22px 18px !important;
        box-shadow: none !important;
        margin: 0 !important;
        transition: background-color 0.2s ease !important;
    }

    #pipeline .node-card:last-child {
        border-right: none !important;
    }

    #pipeline .node-card:hover,
    #pipeline .node-card.active {
        background-color: #121317 !important;
        box-shadow: none !important;
    }

    #pipeline .pipeline-stream-bar {
        margin: 0 !important;
        border-radius: 0 !important;
        background: #08080a !important;
        border-bottom: 1px solid #1c1d22 !important;
        height: 3px !important;
    }

    .slash-bottom-ledger-grid {
        display: grid;
        grid-template-columns: 44% 56%;
        min-height: 225px;
        background-color: #040406;
    }

    .slash-ledger-spacer {
        position: relative;
    }

    .slash-ledger-table-wrap {
        border-left: 1px solid #1c1d22;
        display: flex;
        flex-direction: column;
    }

    .slash-ledger-row {
        display: grid;
        grid-template-columns: 1.3fr 1fr 110px;
        align-items: center;
        padding: 13px 20px;
        border-bottom: 1px solid #1c1d22;
        font-size: 13px;
        color: #e2e3e9;
    }

    .slash-ledger-row:last-child {
        border-bottom: none;
    }

    .slash-ledger-row.is-head {
        background-color: #08080a;
        color: #777a88;
        font-family: var(--font-mono);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        padding: 10px 20px;
    }

    .slash-cell-folder {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #c7c9d1;
        font-weight: 500;
    }

    .slash-cell-folder i {
        color: #5e616e;
        font-size: 12px;
    }

    .slash-cell-limit {
        font-family: var(--font-mono);
        font-size: 12.5px;
        color: #e2e3e9;
    }

    .slash-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 3px 10px;
        border-radius: 9999px;
        border: 1px solid rgba(58, 211, 137, 0.35);
        color: #3ad389;
        font-family: var(--font-mono);
        font-size: 11px;
        width: fit-content;
    }

    .slash-hero-copy-overlay {
        position: absolute;
        bottom: 22px;
        left: 24px;
        z-index: 15;
        max-width: 540px;
        background: linear-gradient(90deg, #040406 82%, rgba(4, 4, 6, 0) 100%);
        padding: 18px 28px 10px 8px;
        text-align: left;
    }

    .slash-hero-copy-overlay .eyebrow {
        margin-bottom: 12px;
        display: inline-flex;
    }

    .slash-hero-copy-overlay h2 {
        font-family: var(--font-condensed);
        text-transform: uppercase;
        font-size: clamp(2rem, 4.5vw, 3.8rem);
        letter-spacing: -0.02em;
        text-align: left;
        margin: 0 0 10px 0;
        line-height: 0.95;
        color: #ffffff;
    }

    .slash-hero-copy-overlay p {
        color: #9194a1;
        font-size: 14.5px;
        line-height: 1.55;
        margin: 0;
        max-width: 470px;
    }

    .slash-footer-ticker-bar {
        display: grid;
        grid-template-columns: 310px 1fr;
        align-items: center;
        gap: 28px;
        padding-top: 24px;
        margin-top: 20px;
        border-top: 1px solid #1c1d22;
    }

    .slash-stat-counter-col {
        border-right: 1px solid #1c1d22;
        padding-right: 24px;
    }

    .slash-live-counter-num {
        font-family: var(--font-mono);
        font-size: 24px;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: -0.03em;
        line-height: 1.1;
        margin-bottom: 4px;
    }

    .slash-live-counter-sub {
        font-size: 12px;
        color: #777a88;
        line-height: 1.35;
    }

    .slash-inline-marquee {
        overflow: hidden;
        width: 100%;
        position: relative;
        mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
    }

    .slash-inline-marquee .marquee-track {
        display: flex;
        align-items: center;
        gap: 40px;
        width: max-content;
        animation: slashPartnerScroll 28s linear infinite;
    }

    .slash-inline-marquee .marquee-track > div {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--font-mono);
        font-size: 12px;
        letter-spacing: 0.12em;
        color: #9194a1;
        text-transform: uppercase;
        white-space: nowrap;
    }

    @keyframes slashPartnerScroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @media (max-width: 1024px) {
        .slash-ledger-layout { grid-template-columns: 1fr; }
        .slash-vault-sidebar { display: none; }
        #pipeline .nodes-grid { grid-template-columns: repeat(2, 1fr) !important; }
        .slash-bottom-ledger-grid { grid-template-columns: 1fr; min-height: auto; }
        .slash-ledger-table-wrap { border-left: none; border-top: 1px solid #1c1d22; }
        .slash-hero-copy-overlay { position: relative; bottom: auto; left: auto; max-width: 100%; padding: 24px 20px; background: #040406; border-top: 1px solid #1c1d22; }
        .slash-footer-ticker-bar { grid-template-columns: 1fr; gap: 18px; }
        .slash-stat-counter-col { border-right: none; border-bottom: 1px solid #1c1d22; padding-bottom: 16px; }
    }

    @media (max-width: 640px) {
        #pipeline .nodes-grid { grid-template-columns: 1fr !important; }
        .slash-ledger-row { grid-template-columns: 1fr 1fr; gap: 8px; }
    }
</style>

<section class="workflow-section snap-section slash-foundation-section" id="pipeline">
    <div class="container">
        
        <!-- Cimiento Estructural de Paneles -->
        <div class="slash-vault-frame" data-reveal>
            <div class="slash-ledger-layout">
                
                <!-- Columna Izquierda: Menú técnico estructural -->
                <aside class="slash-vault-sidebar">
                    <div class="slash-sidebar-brand">
                        <span style="color:#fd8925;">▣</span>
                        <span>{{ strtoupper($siteName ?? 'BIOCOREXSTACK') }}</span>
                    </div>
                    <div class="slash-sidebar-link active">
                        <span>Pipeline Activo</span>
                        <span style="color:#3ad389;">●</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>01 Captura Web & Apps</span>
                        <span>01</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>02 Cloud SQL & NoSQL</span>
                        <span>02</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>03 Motor IA & Gemini</span>
                        <span>03</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>04 Estadística RStudio</span>
                        <span>04</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>Diseño de Experimentos</span>
                        <span>DoE</span>
                    </div>
                    <div class="slash-sidebar-link">
                        <span>Cloud Deployment</span>
                        <span>↗</span>
                    </div>
                </aside>

                <!-- Columna Derecha: BIOCOREX_AI_ENGINE.v2 + Tabla Ledger inferior -->
                <div class="slash-vault-body">
                    
                    <!-- Barra Superior del Pipeline -->
                    <div class="workflow-header-bar">
                        <div class="traffic-dots">
                            <span class="traffic-dot red"></span>
                            <span class="traffic-dot yellow"></span>
                            <span class="traffic-dot green"></span>
                        </div>
                        <div style="font-family: var(--font-mono); font-size: 12px; color: var(--color-fog-text); display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-server" style="color: var(--color-iris-violet);"></i>
                            <span>BIOCOREX_AI_ENGINE.v2</span>
                        </div>
                        <div class="workflow-status-badge">
                            <span class="status-dot-pulse"></span>
                            <span>SISTEMA ONLINE · BAJA LATENCIA</span>
                        </div>
                    </div>

                    <!-- Grid de los 4 Nodos Conectados -->
                    <div class="nodes-grid" id="workflowNodes">
                        @foreach ($pipelineNodes as $index => $node)
                            <div class="node-card" data-node="{{ $index }}">
                                <div class="node-top">
                                    <div class="node-icon-box">
                                        <i class="{{ $node['icon'] }}"></i>
                                    </div>
                                    <span class="node-badge">STEP {{ $node['step'] }}</span>
                                </div>
                                <div style="font-family: var(--font-mono); font-size: 10px; color: #fd8925; letter-spacing: 0.06em; margin-bottom: 4px; text-transform: uppercase;">
                                    {{ $node['type'] }}
                                </div>
                                <h4>{{ $node['title'] }}</h4>
                                <p>{{ $node['desc'] }}</p>
                                <div class="node-status-bar">
                                    <span style="display:flex; align-items:center; gap:6px;">
                                         <span style="width:6px; height:6px; border-radius:50%; background:{{ $node['status_color'] }}; display:inline-block;"></span>
                                        <span>STATUS</span>
                                    </span>
                                    <span style="color: {{ $node['status_color'] }}; font-weight: 600;">{{ $node['status'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cable de corriente del pipeline -->
                    <div class="pipeline-stream-bar">
                        <div class="pipeline-stream-indicator" id="pipelineStream"></div>
                    </div>

                    <!-- Mitad Inferior: Ledger Table -->
                    <div class="slash-bottom-ledger-grid">
                        <div class="slash-ledger-spacer"></div>
                        <div class="slash-ledger-table-wrap">
                            <div class="slash-ledger-row is-head">
                                <span>CAPA TECNOLÓGICA</span>
                                <span>HERRAMIENTAS / MOTOR</span>
                                <span>ESTADO</span>
                            </div>
                            <div class="slash-ledger-row">
                                <span class="slash-cell-folder"><i class="fa-solid fa-brain"></i> Modelos de IA Certificados</span>
                                <span class="slash-cell-limit">Gemini API & Automatización</span>
                                <span class="slash-status-pill">● Active</span>
                            </div>
                            <div class="slash-ledger-row">
                                <span class="slash-cell-folder"><i class="fa-solid fa-database"></i> Persistencia Híbrida</span>
                                <span class="slash-cell-limit">Firebase · MongoDB · SQL</span>
                                <span class="slash-status-pill">● Active</span>
                            </div>
                            <div class="slash-ledger-row">
                                <span class="slash-cell-folder"><i class="fa-solid fa-chart-pie"></i> Estadística & Experimentación</span>
                                <span class="slash-cell-limit">RStudio · Excel · Analítica</span>
                                <span class="slash-status-pill">● Active</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Título y Subtítulo superpuestos en la esquina inferior izquierda -->
            <div class="slash-hero-copy-overlay">
                <span class="eyebrow"><i class="fa-solid fa-microchip"></i> IA CERTIFICADA & CIENCIA DE DATOS</span>
                <h2>PIPELINE INTELIGENTE EN TIEMPO REAL</h2>
                <p>
                    Arquitectura integral diseñada para conectar interfaces modernas, bases de datos en la nube, modelos de Inteligencia Artificial y validación estadística.
                </p>
            </div>
        </div>

        <!-- Barra Inferior: Contador en vivo + Marquee de Partners -->
        <div class="slash-footer-ticker-bar" data-reveal>
            <div class="slash-stat-counter-col">
                <div class="slash-live-counter-num" id="slashLivePayloads">10,796,627,530</div>
                <div class="slash-live-counter-sub">
                    procesos, consultas y modelos analizados<br>
                    en nuestro ecosistema de ingeniería
                </div>
            </div>

            <div class="slash-inline-marquee">
                <div class="marquee-track" id="marqueeTrack">
                    @for ($i = 0; $i < 4; $i++)
                        @foreach ($partners as $partner)
                            <div>
                                <span style="color:var(--color-acento); font-size:10px;">■</span>
                                <span>{{ $partner }}</span>
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    (function() {
        const counter = document.getElementById('slashLivePayloads');
        if (!counter) return;
        let total = 10796627530;
        setInterval(() => {
            total += Math.floor(Math.random() * 19) + 4;
            counter.textContent = total.toLocaleString('en-US');
        }, 1300);
    })();
</script>
