<!-- ================= 5. STICKY PASO A PASO (METODOLOGÍA) (SNAP SECTION 04) ================= -->
<section class="sticky-section snap-section" id="about">
    <div class="container sticky-layout">
        <!-- Columna izquierda: Información fija -->
        <div class="sticky-copy" data-reveal>
            <span class="eyebrow"><i class="fa-solid fa-layer-group"></i> METODOLOGÍA</span>
            <h2>INGENIERÍA RIGUROSA, CERO IMPROVISACIÓN</h2>
            <p style="color:var(--color-ash-gray); margin:16px 0; font-size:15px; line-height:1.6;">
                Combinamos el desarrollo de software moderno con el rigor del método científico: arquitectura en la nube, inteligencia artificial certificada y validación estadística real.
            </p>

            <!-- Contadores dinámicos -->
            <div class="stats-grid">
                <div>
                    <span class="num" data-count="100">0</span>
                    <small>% Arquitectura Cloud & Full-Stack</small>
                </div>
                <div>
                    <span class="num" data-count="99">0</span>
                    <small>% Precisión en IA & Modelos Estadísticos</small>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Tarjetas paso a paso -->
        <div class="sticky-viewport" id="stepsViewport">
            @foreach ($steps as $index => $step)
                <div class="step-card" data-step="{{ $index }}">
                    <span class="step-num">{{ $step['num'] }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
