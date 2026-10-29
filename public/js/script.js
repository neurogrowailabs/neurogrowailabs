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

  // 2. DALA HERO: CONSTELACIÓN INTERACTIVA DE PARTÍCULAS (CANVAS)
  const canvas = document.getElementById("constellationCanvas");
  if (canvas) {
    const ctx = canvas.getContext("2d");
    const wrapper = document.getElementById("canvasWrapper") || canvas.parentElement;

    let animationFrameId;
    let width = 0;
    let height = 0;
    let mouse = { x: -9999, y: -9999, active: false };

    const resizeCanvas = () => {
      if (!wrapper) return;
      const rect = wrapper.getBoundingClientRect();
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      width = rect.width;
      height = rect.height || 450;
      canvas.width = width * dpr;
      canvas.height = height * dpr;
      canvas.style.width = `${width}px`;
      canvas.style.height = `${height}px`;
      ctx.scale(dpr, dpr);
    };

    window.addEventListener("resize", resizeCanvas, { passive: true });
    resizeCanvas();

    // Paleta cromática Dala adaptada a NeuroGrow AI Labs
    const colors = ["#8052ff", "#ffb829", "#15846e", "#e056fd", "#00d2d3", "#ffffff", "#9281f7"];

    // Generar partículas triangulares y nodos de datos
    const particleCount = window.innerWidth < 768 ? 120 : 210;
    const particles = Array.from({ length: particleCount }, () => ({
      x: width * 0.5 + (Math.random() - 0.5) * width * 0.75,
      y: height * 0.5 + (Math.random() - 0.5) * height * 0.75,
      size: Math.random() * 4.5 + 2,
      color: colors[Math.floor(Math.random() * colors.length)],
      vx: (Math.random() - 0.5) * 0.45,
      vy: (Math.random() - 0.5) * 0.45,
      angle: Math.random() * Math.PI * 2,
      va: (Math.random() - 0.5) * 0.025,
      opacity: Math.random() * 0.65 + 0.35,
    }));

    // Interacción suave con mouse / cursor sobre el canvas
    canvas.addEventListener("mousemove", (e) => {
      const rect = canvas.getBoundingClientRect();
      mouse.x = e.clientX - rect.left;
      mouse.y = e.clientY - rect.top;
      mouse.active = true;
    }, { passive: true });

    canvas.addEventListener("mouseleave", () => {
      mouse.active = false;
    }, { passive: true });

    const render = () => {
      ctx.clearRect(0, 0, width, height);

      const centerX = width * 0.5;
      const centerY = height * 0.5;
      const maxRadius = Math.min(width, height) * 0.44;

      // Dibujar partículas triangulares delineadas estilo Dala
      for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        p.x += p.vx;
        p.y += p.vy;
        p.angle += p.va;

        // Atracción orbital hacia el centro de la mente/nube de datos
        const dx = p.x - centerX;
        const dy = p.y - centerY;
        const dist = Math.sqrt(dx * dx + dy * dy);

        if (dist > maxRadius) {
          p.vx -= dx * 0.0006;
          p.vy -= dy * 0.0006;
        }

        // Repulsión sutil ante el cursor
        if (mouse.active) {
          const mdx = p.x - mouse.x;
          const mdy = p.y - mouse.y;
          const mdist = Math.sqrt(mdx * mdx + mdy * mdy);
          if (mdist < 100 && mdist > 0) {
            const force = ((100 - mdist) / 100) * 0.4;
            p.vx += (mdx / mdist) * force;
            p.vy += (mdy / mdist) * force;
          }
        }

        // Fricción suave para estabilidad visual
        p.vx *= 0.992;
        p.vy *= 0.992;

        // Renderizado del triángulo hueco/vectorial
        ctx.save();
        ctx.translate(p.x, p.y);
        ctx.rotate(p.angle);
        ctx.beginPath();
        ctx.moveTo(0, -p.size);
        ctx.lineTo(p.size * 0.866, p.size * 0.5);
        ctx.lineTo(-p.size * 0.866, p.size * 0.5);
        ctx.closePath();
        ctx.strokeStyle = p.color;
        ctx.globalAlpha = p.opacity;
        ctx.lineWidth = 1.25;
        ctx.stroke();
        ctx.restore();
      }

      animationFrameId = requestAnimationFrame(render);
    };

    render();
  }

  // 2.1 ANIMACIÓN SUAVE DE ENTRADA HERO (GSAP SIN PIN NI HIJACKING)
  if (typeof gsap !== "undefined") {
    gsap.from(".dala-eyebrow", {
      opacity: 0,
      y: 16,
      duration: 0.8,
      delay: 0.1,
      ease: "power2.out"
    });
    gsap.from(".dala-headline", {
      opacity: 0,
      y: 28,
      duration: 1.1,
      delay: 0.25,
      ease: "power3.out"
    });
    gsap.from(".dala-subheadline", {
      opacity: 0,
      y: 20,
      duration: 1.0,
      delay: 0.45,
      ease: "power2.out"
    });
    gsap.from(".dala-hero-actions", {
      opacity: 0,
      y: 16,
      duration: 0.9,
      delay: 0.6,
      ease: "power2.out"
    });
    gsap.from(".dala-canvas-wrapper", {
      opacity: 0,
      scale: 0.92,
      duration: 1.4,
      delay: 0.35,
      ease: "power2.out"
    });
    gsap.from(".dala-pillars-strip", {
      opacity: 0,
      y: 15,
      duration: 1.0,
      delay: 0.8,
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
