<!-- ================= 4. VALIDADOR / BUSCADOR EN TIEMPO REAL (SNAP SECTION 03) ================= -->
<section class="finder-section snap-section" id="finder">
    <div class="container">
        <div class="section-head text-center" data-reveal>
            <span class="eyebrow"><i class="fa-solid fa-brain"></i> DIAGNÓSTICO INTELIGENTE</span>
            <h2>¿QUÉ SOLUCIÓN NECESITA TU PROYECTO?</h2>
            <p style="color:var(--color-ash-gray); margin-top:8px; font-size:15px;">Selecciona el enfoque tecnológico o área de tu negocio y evaluamos la arquitectura ideal de Software, IA o Estadística en tiempo real.</p>
        </div>

        <div class="finder-card" data-reveal>
            <div class="finder-inputs">
                <div class="field">
                    <label for="inputPrimary">Área / Tecnología</label>
                    <input list="optionsList" id="inputPrimary" placeholder="Selecciona o escribe..." autocomplete="off">
                    <datalist id="optionsList">
                        @foreach (array_keys($databaseValidation) as $cat)
                            <option value="{{ $cat }}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div class="field">
                    <label for="inputSecondary">Especificación (Opcional)</label>
                    <input id="inputSecondary" placeholder="Ej: App web con IA, base de datos en Firebase, análisis en RStudio..." autocomplete="off">
                </div>
                <button class="btn btn-accent" id="btnValidate" aria-label="Analizar requerimiento y evaluar arquitectura técnica">ANALIZAR PROYECTO</button>
            </div>

            <!-- Doble Casilla de Consentimiento Legal Obligatorio (LOPDP / MSA Ecuador) -->
            <div class="finder-consent-box" id="finderConsentBox" role="group" aria-label="Consentimiento legal obligatorio">
                <label class="legal-checkbox-label">
                    <input type="checkbox" id="chkTermsMsa" name="terms_msa" required aria-required="true">
                    <span>He leído y acepto los <a href="{{ route('legal.terminos') }}" target="_blank" rel="noopener">Términos de Uso y Condiciones Marco de Servicio (MSA)</a> de BioCoreXStack.</span>
                </label>
                <label class="legal-checkbox-label">
                    <input type="checkbox" id="chkPrivacyNda" name="privacy_nda" required aria-required="true">
                    <span>He leído y autorizo la <a href="{{ route('legal.privacidad') }}" target="_blank" rel="noopener">Política de Privacidad, Confidencialidad (NDA)</a> y el contacto comercial vía WhatsApp/Correo.</span>
                </label>
                <div class="legal-consent-alert" id="legalConsentAlert" style="display: none;" role="alert">
                    <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i>
                    <span>Acción bloqueada: Debes marcar ambas casillas legales obligatorias para continuar con el análisis y la cotización técnica.</span>
                </div>
            </div>

            <!-- Contenedor dinámico del resultado -->
            <div class="finder-result" id="finderResult"></div>
        </div>
    </div>
</section>
