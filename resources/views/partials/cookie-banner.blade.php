<!-- ================= BANNER LEGAL DE COOKIES (LOPDP / COMPLIANCE) ================= -->
<div id="bcxsCookieBanner" class="cookie-banner-wrapper" role="dialog" aria-labelledby="cookieBannerTitle" aria-describedby="cookieBannerDesc" style="display: none;">
    <div class="cookie-banner-box">
        <div class="cookie-banner-header">
            <div class="cookie-icon-wrapper" aria-hidden="true">
                <i class="fa-solid fa-cookie-bite"></i>
            </div>
            <div>
                <h2 id="cookieBannerTitle" class="cookie-banner-heading">Gobernanza Digital & Cookies</h2>
                <p id="cookieBannerDesc" class="cookie-banner-text">
                    Utilizamos cookies técnicas necesarias y analítica anónima de rendimiento conforme a la <strong>LOPDP</strong> para garantizar la seguridad y fluidez en nuestros servicios.
                </p>
            </div>
        </div>

        <div id="cookieCustomDrawer" class="cookie-custom-drawer" style="display: none;">
            <div class="cookie-toggle-row">
                <div>
                    <strong>Técnicas / Esenciales</strong>
                    <p>Seguridad CSRF, sesiones de Laravel y motor GSAP.</p>
                </div>
                <span class="cookie-pill-locked">Siempre Activas</span>
            </div>
            <div class="cookie-toggle-row">
                <div>
                    <strong>Analítica de Rendimiento</strong>
                    <p>Métricas anónimas de latencia y estabilidad cloud.</p>
                </div>
                <label class="switch-ui" aria-label="Permitir cookies de analítica">
                    <input type="checkbox" id="cookieAnalyticsCheck" checked>
                    <span class="slider-ui"></span>
                </label>
            </div>
            <div class="cookie-toggle-row">
                <div>
                    <strong>Marketing & Atribución B2B</strong>
                    <p>Seguimiento de procedencia en solicitudes de WhatsApp.</p>
                </div>
                <label class="switch-ui" aria-label="Permitir cookies de marketing">
                    <input type="checkbox" id="cookieMarketingCheck" checked>
                    <span class="slider-ui"></span>
                </label>
            </div>
        </div>

        <div class="cookie-banner-actions">
            <a href="{{ route('legal.cookies') }}" class="cookie-more-link" aria-label="Leer la política completa de cookies">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i> Leer Política
            </a>
            <div class="cookie-buttons-group">
                <button type="button" id="cookieBtnCustomize" class="btn-cookie-ghost">
                    Personalizar
                </button>
                <button type="button" id="cookieBtnEssentials" class="btn-cookie-ghost">
                    Solo Esenciales
                </button>
                <button type="button" id="cookieBtnAcceptAll" class="btn-cookie-primary">
                    Aceptar Todo
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.cookie-banner-wrapper {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%);
    width: min(720px, calc(100% - 32px));
    z-index: 99999;
}
.cookie-banner-box {
    background: rgba(18, 14, 28, 0.94);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    padding: 22px 24px;
    box-shadow: 0 24px 50px rgba(0, 0, 0, 0.75), 0 0 24px rgba(146, 129, 247, 0.15);
    color: #e5e5e5;
    font-family: var(--font-inter, sans-serif);
}
.cookie-banner-header {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}
.cookie-icon-wrapper {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: rgba(146, 129, 247, 0.15);
    color: var(--color-iris-violet, #9281f7);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
.cookie-banner-heading {
    font-family: var(--font-condensed, sans-serif);
    font-size: 18px;
    letter-spacing: 0.04em;
    color: #ffffff;
    margin: 0 0 6px 0;
    text-transform: uppercase;
}
.cookie-banner-text {
    font-size: 13px;
    line-height: 1.5;
    color: #b0aeb6;
    margin: 0;
}
.cookie-custom-drawer {
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.cookie-toggle-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
}
.cookie-toggle-row strong {
    font-size: 13px;
    color: #ffffff;
}
.cookie-toggle-row p {
    font-size: 11.5px;
    color: #8c8994;
    margin: 2px 0 0 0;
}
.cookie-pill-locked {
    font-family: var(--font-mono, monospace);
    font-size: 9.5px;
    background: rgba(58, 211, 137, 0.12);
    color: #3ad389;
    border: 1px solid rgba(58, 211, 137, 0.25);
    padding: 3px 8px;
    border-radius: 12px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    white-space: nowrap;
}
.cookie-banner-actions {
    margin-top: 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}
.cookie-more-link {
    font-family: var(--font-mono, monospace);
    font-size: 11px;
    color: var(--color-fog-text, #9d9797);
    text-decoration: none;
    letter-spacing: 0.04em;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.cookie-more-link:hover {
    color: #ffffff;
}
.cookie-buttons-group {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.btn-cookie-ghost, .btn-cookie-primary {
    font-family: var(--font-mono, monospace);
    font-size: 10.5px;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    padding: 8px 14px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-cookie-ghost {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #d1cece;
}
.btn-cookie-ghost:hover {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.3);
}
.btn-cookie-primary {
    background: var(--gradient-ember-cta, linear-gradient(30deg, #fd8925, #ff492c));
    border: none;
    color: #ffffff;
    font-weight: 600;
    box-shadow: 0 0 16px rgba(253, 137, 37, 0.3);
}
.btn-cookie-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 0 24px rgba(253, 137, 37, 0.5);
}
.switch-ui {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 20px;
    flex-shrink: 0;
}
.switch-ui input {
    opacity: 0;
    width: 0;
    height: 0;
}
.slider-ui {
    position: absolute;
    cursor: pointer;
    inset: 0;
    background-color: #2e2a38;
    transition: .3s;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.1);
}
.slider-ui:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 2px;
    bottom: 2px;
    background-color: #ffffff;
    transition: .3s;
    border-radius: 50%;
}
.switch-ui input:checked + .slider-ui {
    background-color: var(--color-iris-violet, #9281f7);
}
.switch-ui input:checked + .slider-ui:before {
    transform: translateX(16px);
}

@media (max-width: 640px) {
    .cookie-banner-wrapper {
        bottom: 12px;
        width: calc(100% - 20px);
    }
    .cookie-banner-box {
        padding: 14px 16px;
        border-radius: 12px;
    }
    .cookie-banner-header {
        gap: 10px;
    }
    .cookie-icon-wrapper {
        width: 32px;
        height: 32px;
        font-size: 15px;
    }
    .cookie-banner-heading {
        font-size: 15px;
        margin-bottom: 3px;
    }
    .cookie-banner-text {
        font-size: 11.5px;
        line-height: 1.4;
    }
    .cookie-banner-actions {
        margin-top: 12px;
        gap: 8px;
    }
    .cookie-more-link {
        font-size: 10px;
    }
    .cookie-buttons-group {
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px;
    }
    .cookie-buttons-group .btn-cookie-primary {
        grid-column: span 2;
        padding: 9px 12px;
        font-size: 11px;
    }
    .cookie-buttons-group .btn-cookie-ghost {
        padding: 7px 8px;
        font-size: 9.5px;
        text-align: center;
    }
}
</style>

<script>
(function() {
    const STORAGE_KEY = 'bcxs_cookie_consent';
    const banner = document.getElementById('bcxsCookieBanner');
    const customDrawer = document.getElementById('cookieCustomDrawer');
    const btnCustomize = document.getElementById('cookieBtnCustomize');
    const btnEssentials = document.getElementById('cookieBtnEssentials');
    const btnAcceptAll = document.getElementById('cookieBtnAcceptAll');
    const analyticsCheck = document.getElementById('cookieAnalyticsCheck');
    const marketingCheck = document.getElementById('cookieMarketingCheck');

    function checkConsent() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (!saved && banner) {
            banner.style.display = 'block';
        }
    }

    function saveConsent(data) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify({
            ...data,
            timestamp: new Date().toISOString(),
            version: 'v1.0-neurogrowailabs'
        }));
        window.dispatchEvent(new CustomEvent('cookieConsentUpdated', { detail: data }));
        if (banner) {
            banner.style.opacity = '0';
            banner.style.transition = 'opacity 0.3s ease';
            setTimeout(() => { banner.style.display = 'none'; }, 300);
        }
    }

    if (btnCustomize && customDrawer) {
        btnCustomize.addEventListener('click', function() {
            const isVisible = customDrawer.style.display === 'flex' || customDrawer.style.display === 'block';
            customDrawer.style.display = isVisible ? 'none' : 'flex';
            btnCustomize.textContent = isVisible ? 'Personalizar' : 'Cerrar Ajustes';
        });
    }

    if (btnEssentials) {
        btnEssentials.addEventListener('click', function() {
            saveConsent({
                essentials: true,
                analytics: false,
                marketing: false
            });
        });
    }

    if (btnAcceptAll) {
        btnAcceptAll.addEventListener('click', function() {
            const analytics = analyticsCheck ? analyticsCheck.checked : true;
            const marketing = marketingCheck ? marketingCheck.checked : true;
            saveConsent({
                essentials: true,
                analytics: analytics,
                marketing: marketing
            });
        });
    }

    window.resetCookieConsent = function() {
        localStorage.removeItem(STORAGE_KEY);
        if (banner) {
            banner.style.display = 'block';
            banner.style.opacity = '1';
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', checkConsent);
    } else {
        checkConsent();
    }
})();
</script>
