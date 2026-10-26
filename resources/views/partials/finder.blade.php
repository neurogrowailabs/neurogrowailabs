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
                <button class="btn btn-accent" id="btnValidate">ANALIZAR PROYECTO</button>
            </div>

            <!-- Contenedor dinámico del resultado -->
            <div class="finder-result" id="finderResult"></div>
        </div>
    </div>
</section>
