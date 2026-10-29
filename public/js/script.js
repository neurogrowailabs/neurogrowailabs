/* =========================================================
   BIOCOREXSTACK SOFTWARE LABS — MOTOR JS CORE (OPTIMIZADO)
   Arquitectura de Alto Rendimiento, Scrollytelling GSAP
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  // 1. TOP NAV (Efecto vidrio al scroll)
  const topNav = document.getElementById("topNav");
  window.addEventListener("scroll", () => {
    if (topNav) {
      topNav.classList.toggle("scrolled", window.scrollY > 40);
    }
  }, { passive: true });

  // 2. DALA HERO: TRES-DIMENSIONES AUTÉNTICAS (Gestionado por /js/dala-brain.js con Three.js)

  // 2.1 ENTRADA DIRECTA DEL HERO (SIN RETARDOS INNECESARIOS)
  if (typeof gsap !== "undefined") {
    gsap.from(".dala-eyebrow", {
      opacity: 0,
      y: 12,
      duration: 0.4,
      ease: "power2.out"
    });
    gsap.from(".dala-headline", {
      opacity: 0,
      y: 18,
      duration: 0.5,
      delay: 0.05,
      ease: "power3.out"
    });
    gsap.from(".dala-subheadline", {
      opacity: 0,
      y: 14,
      duration: 0.5,
      delay: 0.1,
      ease: "power2.out"
    });
    gsap.from(".dala-hero-actions", {
      opacity: 0,
      y: 12,
      duration: 0.45,
      delay: 0.15,
      ease: "power2.out"
    });
    gsap.from(".dala-pillars-strip", {
      opacity: 0,
      y: 10,
      duration: 0.4,
      delay: 0.2,
      ease: "power2.out"
    });
  }

  // 3. TRUST MARQUEE (Bucle continuo x4 si no está precargado por Blade)
  const marqueeTrack = document.getElementById("marqueeTrack");
  if (marqueeTrack && !marqueeTrack.hasChildNodes()) {
    const items = window.MARQUEE_ITEMS || [
      "LARAVEL 11", "PYTHON", "GOOGLE GEMINI", "OWASP TOP 10", 
      "DEVSECOPS", "LINUX / BASH", "ZERO-TRUST ARCHITECTURE"
    ];
    const html = items.map(t => `
      <div>
        <span style="color:var(--color-acento); font-size:10px;">■</span>
        <span>${t}</span>
      </div>
    `).join("");
    marqueeTrack.innerHTML = html + html + html + html;
  }

  // 4. MOTOR DE DIAGNÓSTICO DE ARQUITECTURA & IA (FETCH REAL A LARAVEL)
  const DATABASE = window.VALIDATOR_DATABASE || {
    "Desarrollo Web & PWA": ["Laravel 11", "PHP 8.4", "Vue / React", "APIs RESTful", "PWA Offline"],
    "Implementación de IA & Gemini": ["Google Gemini API", "Agentes Autónomos", "Automatización", "Visión Artificial"],
    "Bases de Datos Cloud": ["Firebase", "MongoDB NoSQL", "PostgreSQL / MySQL", "Google Cloud"],
    "Estadística & DoE en RStudio": ["RStudio", "Diseño de Experimentos (DoE)", "Modelos Predictivos", "Excel Avanzado"],
    "Gestión Digital & Redes": ["Analítica de Conversión", "Automatización de Ventas", "Growth Basado en Datos"]
  };

  const inputPrimary = document.getElementById("inputPrimary");
  const inputSecondary = document.getElementById("inputSecondary");
  const btnValidate = document.getElementById("btnValidate");
  const finderResult = document.getElementById("finderResult");
  const optionsList = document.getElementById("optionsList");

  // Rellenar datalist automáticamente si está vacío
  if (optionsList && optionsList.children.length === 0) {
    optionsList.innerHTML = Object.keys(DATABASE).map(k => `<option value="${k}"></option>`).join("");
  }

  async function ejecutarDiagnostico() {
    if (!inputPrimary || !finderResult) return;
    const category = inputPrimary.value.trim();
    const specification = inputSecondary ? inputSecondary.value.trim() : "";

    // Validación Estricta de Doble Consentimiento Legal (LOPDP / MSA Ecuador)
    const chkTermsMsa = document.getElementById("chkTermsMsa");
    const chkPrivacyNda = document.getElementById("chkPrivacyNda");
    const finderConsentBox = document.getElementById("finderConsentBox");
    const legalConsentAlert = document.getElementById("legalConsentAlert");

    const termsAccepted = chkTermsMsa ? chkTermsMsa.checked : false;
    const privacyAccepted = chkPrivacyNda ? chkPrivacyNda.checked : false;

    if (!termsAccepted || !privacyAccepted) {
      if (finderConsentBox) finderConsentBox.classList.add("has-error");
      if (legalConsentAlert) legalConsentAlert.style.display = "flex";
      if (!termsAccepted && chkTermsMsa) {
        chkTermsMsa.focus();
      } else if (!privacyAccepted && chkPrivacyNda) {
        chkPrivacyNda.focus();
      }
      return;
    }

    if (finderConsentBox) finderConsentBox.classList.remove("has-error");
    if (legalConsentAlert) legalConsentAlert.style.display = "none";

    if (!category) {
      finderResult.innerHTML = `
        <div class="result-box" style="border-color:#fd8925; background:rgba(253,137,37,0.08); color:#ffffff;">
          <i class="fa-solid fa-triangle-exclamation" style="color:#fd8925; margin-right:6px;"></i>
          Por favor selecciona un área o introduce una tecnología para evaluar tu arquitectura.
        </div>`;
      inputPrimary.focus();
      return;
    }

    const originalBtnHtml = btnValidate.innerHTML;
    btnValidate.disabled = true;
    btnValidate.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> PROCESANDO...`;
    finderResult.innerHTML = `
      <div class="result-box" style="border-color:var(--color-iris-violet); background:rgba(146,129,247,0.05); color:#ffffff; display:flex; align-items:center; gap:12px;">
        <i class="fa-solid fa-microchip fa-spin" style="color:var(--color-iris-violet); font-size:20px;"></i>
        <span>Evaluando requerimientos, stack Full-Stack, modelos de IA y validación estadística...</span>
      </div>`;

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    try {
      // 1. Registro inmutable de trazabilidad de consentimiento legal B2B
      fetch('/api/consent-log', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
          origin: 'web_diagnostico_ia',
          accepted_terms_msa: true,
          accepted_privacy_nda_whatsapp: true,
          lead_name: category,
          business_name: specification || 'Diagnóstico Web',
          contact_info: 'Canal WhatsApp'
        })
      }).catch(err => console.warn('Audit Consent Log:', err));

      const response = await fetch('/api/diagnostico', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ category, specification })
      });

      const data = await response.json();

      if (!response.ok || data.status !== 'success') {
        throw new Error(data.message || 'No se pudo generar el diagnóstico.');
      }

      // 2. Anexo legal de consentimiento fechado para el chat de WhatsApp
      const nowUtc = new Date().toISOString().replace('T', ' ').substring(0, 19) + ' UTC';
      const legalRefStamp = `\n\n[Ref. Legal: Términos MSA y Privacidad aceptados el ${nowUtc}]`;
      const finalWhatsappUrl = data.whatsapp_url ? (data.whatsapp_url + encodeURIComponent(legalRefStamp)) : '#';

      finderResult.innerHTML = `
        <div class="result-box" style="border-color:var(--color-iris-violet); background:rgba(23, 19, 36, 0.95); box-shadow:0 12px 36px rgba(0,0,0,0.4); border-radius:14px; padding:24px; text-align:left;">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:12px;">
            <div style="display:flex; align-items:center; gap:10px;">
              <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#3ad389; box-shadow:0 0 10px #3ad389;"></span>
              <strong style="font-family:var(--font-mono); font-size:12px; color:var(--color-iris-violet); letter-spacing:0.06em; text-transform:uppercase;">
                DIAGNÓSTICO TÉCNICO EN VIVO · BIOCOREXSTACK
              </strong>
            </div>
            <span style="font-family:var(--font-mono); font-size:10px; color:var(--color-fog-text); background:rgba(255,255,255,0.06); padding:3px 8px; border-radius:10px;">
              ${data.category}
            </span>
          </div>

          <div style="display:flex; flex-direction:column; gap:14px;">
            <div style="display:flex; gap:12px; align-items:flex-start;">
              <i class="fa-solid fa-layer-group" style="color:#fd8925; margin-top:3px; font-size:15px; width:18px;"></i>
              <div>
                <strong style="color:#ffffff; font-size:13px; display:block; margin-bottom:2px;">1. Arquitectura Sugerida:</strong>
                <p style="margin:0; font-size:13px; color:var(--color-ash-text); line-height:1.5;">${data.architecture}</p>
              </div>
            </div>

            <div style="display:flex; gap:12px; align-items:flex-start;">
              <i class="fa-solid fa-brain" style="color:var(--color-iris-violet); margin-top:3px; font-size:15px; width:18px;"></i>
              <div>
                <strong style="color:#ffffff; font-size:13px; display:block; margin-bottom:2px;">2. Módulo de IA Recomendado:</strong>
                <p style="margin:0; font-size:13px; color:var(--color-ash-text); line-height:1.5;">${data.ai_module}</p>
              </div>
            </div>

            <div style="display:flex; gap:12px; align-items:flex-start;">
              <i class="fa-solid fa-chart-pie" style="color:#3ad389; margin-top:3px; font-size:15px; width:18px;"></i>
              <div>
                <strong style="color:#ffffff; font-size:13px; display:block; margin-bottom:2px;">3. Validación de Datos (RStudio & DoE):</strong>
                <p style="margin:0; font-size:13px; color:var(--color-ash-text); line-height:1.5;">${data.data_validation}</p>
              </div>
            </div>
          </div>

          <a href="${finalWhatsappUrl}" target="_blank" rel="noopener" class="btn-whatsapp-action">
            <i class="fa-brands fa-whatsapp" style="font-size:18px;"></i>
            <span>Enviar este diagnóstico a un Ingeniero por WhatsApp ↗</span>
          </a>
        </div>
      `;
    } catch (err) {
      finderResult.innerHTML = `
        <div class="result-box" style="border-color:#e11d48; background:rgba(225,29,72,0.1); color:#ffffff;">
          <strong style="color:#e11d48;"><i class="fa-solid fa-triangle-exclamation"></i> Error al conectar:</strong>
          <span style="font-size:13px;">${err.message || 'Ocurrió un error inesperado al procesar.'}</span>
        </div>`;
    } finally {
      btnValidate.disabled = false;
      btnValidate.innerHTML = originalBtnHtml;
    }
  }

  // Desbloquear estado visual cuando el usuario marca ambas casillas
  const chkTerms = document.getElementById("chkTermsMsa");
  const chkPriv = document.getElementById("chkPrivacyNda");
  function clearLegalErrorOnInput() {
    const finderConsentBox = document.getElementById("finderConsentBox");
    const legalConsentAlert = document.getElementById("legalConsentAlert");
    if (chkTerms && chkPriv && chkTerms.checked && chkPriv.checked) {
      if (finderConsentBox) finderConsentBox.classList.remove("has-error");
      if (legalConsentAlert) legalConsentAlert.style.display = "none";
    }
  }
  if (chkTerms) chkTerms.addEventListener("change", clearLegalErrorOnInput);
  if (chkPriv) chkPriv.addEventListener("change", clearLegalErrorOnInput);

  if (btnValidate) btnValidate.addEventListener("click", ejecutarDiagnostico);
  if (inputPrimary) {
    inputPrimary.addEventListener("keydown", (e) => {
      if (e.key === "Enter") ejecutarDiagnostico();
    });
  }
  if (inputSecondary) {
    inputSecondary.addEventListener("keydown", (e) => {
      if (e.key === "Enter") ejecutarDiagnostico();
    });
  }

  // 5. ANIMACIONES AL SCROLL (IntersectionObserver nativo)
  const reveals = document.querySelectorAll("[data-reveal]");
  if (reveals.length > 0) {
    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("in-view");
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    reveals.forEach(el => revealObs.observe(el));
  }

  // 6. PIPELINE WORKFLOW (n8n Simulation & Node Cycling)
  const workflowNodes = document.querySelectorAll(".node-card[data-node]");
  if (workflowNodes.length > 0) {
    let activeIndex = 0;
    let pipelineInterval = null;

    function cycleNodes() {
      workflowNodes.forEach((node, idx) => {
        node.classList.toggle("active", idx === activeIndex);
      });
      activeIndex = (activeIndex + 1) % workflowNodes.length;
    }

    const workflowSection = document.getElementById("pipeline");
    if (workflowSection) {
      const pipelineObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            if (!pipelineInterval) {
              cycleNodes();
              pipelineInterval = setInterval(cycleNodes, 2400);
            }
          } else {
            if (pipelineInterval) {
              clearInterval(pipelineInterval);
              pipelineInterval = null;
            }
          }
        });
      }, { threshold: 0.2 });

      pipelineObs.observe(workflowSection);
    }

    // Interacción manual al pasar el cursor
    workflowNodes.forEach((node, idx) => {
      node.addEventListener("mouseenter", () => {
        if (pipelineInterval) clearInterval(pipelineInterval);
        workflowNodes.forEach(n => n.classList.remove("active"));
        node.classList.add("active");
      });
      node.addEventListener("mouseleave", () => {
        activeIndex = (idx + 1) % workflowNodes.length;
        if (!pipelineInterval && workflowSection) {
          pipelineInterval = setInterval(cycleNodes, 2400);
        }
      });
    });
  }

  // 7. CONTADORES NUMÉRICOS DINÁMICOS
  const counters = document.querySelectorAll(".num[data-count]");
  if (counters.length > 0) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.dataset.count, 10);
        let count = 0;
        const step = Math.ceil(target / 40);

        const timer = setInterval(() => {
          count += step;
          if (count >= target) {
            el.textContent = target.toLocaleString();
            clearInterval(timer);
          } else {
            el.textContent = count.toLocaleString();
          }
        }, 25);

        countObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(c => countObs.observe(c));
  }

  // 8. MERCURY OBSERVATORY SCROLL RAIL (Ajuste de Desplazamiento & Tracking)
  const railDots = document.querySelectorAll(".rail-dot");
  const snapSections = document.querySelectorAll(".snap-section, .master-stage");

  if (railDots.length > 0 && snapSections.length > 0) {
    const sectionObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const targetId = entry.target.getAttribute("id");
          railDots.forEach(dot => {
            dot.classList.toggle("active", dot.dataset.target === targetId);
          });
        }
      });
    }, {
      threshold: 0.2,
      rootMargin: "-10% 0px -10% 0px"
    });

    snapSections.forEach(section => sectionObserver.observe(section));

    railDots.forEach(dot => {
      dot.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = dot.dataset.target;
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
          targetEl.scrollIntoView({ behavior: "smooth" });
        }
      });
    });
  }
});
