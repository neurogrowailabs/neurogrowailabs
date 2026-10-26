<!-- ================= 6. GRID DE SERVICIOS (SNAP SECTION 05) ================= -->
<section class="services-section snap-section" id="features">
    <div class="container">
        <div class="section-head text-center" data-reveal>
            <span class="eyebrow"><i class="fa-solid fa-code"></i> SERVICIOS</span>
            <h2>CAPACIDADES DE INGENIERÍA</h2>
        </div>

        <div class="services-grid">
            @foreach ($services as $service)
                <article class="service-card" data-reveal>
                    <div class="card-header">
                        <span class="badge">{{ $service['badge'] }}</span>
                        <h3>{{ $service['title'] }}</h3>
                    </div>
                    <ul class="checklist">
                        @foreach ($service['checks'] as $check)
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <span>{{ $check }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ $service['cta_link'] }}" target="_blank" rel="noopener" class="btn btn-secondary" style="width:100%; justify-content:center; gap:8px;">
                        <i class="fa-brands fa-whatsapp" style="color:#25d366; font-size:14px;"></i> {{ $service['cta'] }} ↗
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
