<!-- ================= ESCENARIO PRINCIPAL (SCROLLYTELLING 0:00 A 0:17) ================= -->
<main class="master-stage" id="masterStage">

    <!-- 1. SECCIÓN HERO CON FIGURAS GEOMÉTRICAS (0:00 - 0:03) -->
    <section class="hero-layer">
        <div class="bg-shapes">
            <!-- Flecha/Geometría izquierda -->
            <svg class="shape-arrow" id="shapeArrow" viewBox="0 0 200 200">
                <path d="M20,180 L140,60 L100,20 L180,20 L180,100 L140,60 Z" />
                <rect x="60" y="90" width="120" height="45" transform="rotate(65 120 110)" />
            </svg>

            <!-- Cruz central rotatoria con agujero al medio -->
            <svg class="shape-cross" id="shapeCross" viewBox="0 0 200 200">
                <path d="M75,10 H125 V75 H190 V125 H125 V190 H75 V125 H10 V75 H75 Z" />
                <circle cx="100" cy="100" r="18" fill="var(--bg-principal)" />
            </svg>

            <!-- Barras derechas -->
            <svg class="shape-bars" id="shapeBars" viewBox="0 0 200 200">
                <line x1="20" y1="40" x2="170" y2="65" />
                <line x1="40" y1="120" x2="190" y2="105" />
            </svg>
        </div>

        <!-- Círculo Rojo Flotante -->
        <div class="red-dot" id="redDot"></div>

        <!-- Texto Central del Hero -->
        <div class="hero-content" id="heroContent">
            <span class="hero-eyebrow">BIOCOREXSTACK SOFTWARE LABS – EST. 2026</span>
            <h1 class="hero-headline">
                <span class="italic-word">creando</span> ECOSISTEMAS INTELIGENTES <span class="italic-word">para las</span><br class="hero-desktop-br">
                EMPRESAS DEL MAÑANA
            </h1>
        </div>

        <span class="hero-bottom-label">ENTRAR A NUESTRO MUNDO</span>
    </section>

    <!-- 2. SECCIÓN PORTAL "BIOCOREXSTACK SOFTWARE LABS" (0:03 - 0:06) -->
    <section class="portal-layer" id="portalLayer">
        <div class="portal-text-wrapper">
            <div class="portal-line-top">BIOCOREXSTACK</div>
            <!-- La letra 'a' en medio de SOFTWaRE actúa como el portal de zoom cinemático -->
            <div class="portal-line-bottom">
                <span>SOFTW</span><span class="portal-glyph" id="portalGlyph">a</span><span>RE&nbsp;LABS</span>
            </div>
        </div>
    </section>

    <!-- 3. SECCIÓN MANIFIESTO Y PALABRAS DESTACADAS (0:06 - 0:17) -->
    <section class="manifesto-layer" id="manifestoLayer">
        
        <!-- Tarjetas flotantes que suben por los costados -->
        <div class="floating-cards-container">
            <div class="float-card float-card-left" id="cardLeft">
                <div class="float-card-header">
                    <span>CIENCIA DE DATOS</span>
                    <span>©2026</span>
                </div>
                <div class="float-card-title">RStudio & DoE</div>
            </div>

            <div class="float-card float-card-right" id="cardRight">
                <div class="float-card-header">
                    <span>FULL-STACK & IA</span>
                    <span>©2026</span>
                </div>
                <div class="float-card-title">Gemini Core</div>
            </div>
        </div>

        <!-- Párrafo principal con 6 palabras clave destacadas en morado -->
        <div class="manifesto-text" id="manifestoParagraph">
            INGENIERÍA DE SOFTWARE RIGUROSA CONDUCIDA POR LA 
            <span class="red-word">INTELIGENCIA</span> 
            ARTIFICIAL Y EL PROCESAMIENTO DISTRIBUIDO DE DATOS. MEDIANTE EL 
            <span class="red-word">DESARROLLO</span> 
            FULL-STACK DE APLICACIONES WEB REACTIVAS Y 
            <span class="red-word">SISTEMAS</span> 
            CLOUD DE ALTA DISPONIBILIDAD, GARANTIZAMOS LATENCIAS MÍNIMAS Y ESCALABILIDAD HORIZONTAL. EL 
            <span class="red-word">DISEÑO</span> 
            TÉCNICO MODULAR OPTIMIZA EL RENDIMIENTO Y LA ACCESIBILIDAD DIGITAL. APLICAMOS 
            <span class="red-word">ESTADÍSTICA</span> 
            EXPERIMENTAL (DoE) PARA VALIDAR HIPÓTESIS CON RIGOR MATEMÁTICO, CONSOLIDANDO UN 
            <span class="red-word">CRECIMIENTO</span> 
            SÓLIDO, DETERMINISTA Y MEDIBLE PARA TU ORGANIZACIÓN.
        </div>

        <button class="final-cta-btn" id="finalCta">VER NUESTRAS CAPACIDADES</button>
    </section>

</main>
