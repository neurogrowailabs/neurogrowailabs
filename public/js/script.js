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

  // 2. SCROLLYTELLING GSAP MASTER STAGE (0:00 - 0:17)
  const masterStage = document.getElementById("masterStage");
  if (masterStage && typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);

    // Separar automáticamente todas las palabras blancas en <span class="white-word">
    const paragraph = document.getElementById("manifestoParagraph");
    if (paragraph) {
      const nodes = Array.from(paragraph.childNodes);
      paragraph.innerHTML = "";

      nodes.forEach(node => {
        if (node.nodeType === Node.TEXT_NODE) {
          const words = node.textContent.trim().split(/\s+/);
          words.forEach(word => {
            if (word) {
              const span = document.createElement("span");
              span.className = "white-word";
              span.textContent = word;
              paragraph.appendChild(span);
              paragraph.appendChild(document.createTextNode(" "));
            }
          });
        } else {
          paragraph.appendChild(node);
          paragraph.appendChild(document.createTextNode(" "));
        }
      });
    }

    const whiteWords = gsap.utils.toArray(".white-word");
    const redWords = gsap.utils.toArray(".red-word");

    // 1. Punto focal exacto de la letra 'a' (50% 56% constante fija de la marca)
    const portalOrigin = "50% 56%";

    // 2. Coordenadas dinámicas exactas para alinear las palabras moradas al centro en columna
    function getRedWordsTargetOffsets() {
      if (!paragraph || redWords.length === 0) return [];
      const pRect = paragraph.getBoundingClientRect();
      const centerX = pRect.left + pRect.width / 2;
      const centerY = pRect.top + pRect.height / 2;
      const verticalGap = window.innerWidth < 768 ? 36 : 52;
      const totalHeight = (redWords.length - 1) * verticalGap;
      const startY = centerY - totalHeight / 2;

      return redWords.map((el, i) => {
        const r = el.getBoundingClientRect();
        // Restar transforms activos si ScrollTrigger se recalcula mid-scroll
        const curX = gsap.getProperty(el, "x") || 0;
        const curY = gsap.getProperty(el, "y") || 0;
        const naturalX = (r.left + r.width / 2) - curX;
        const naturalY = (r.top + r.height / 2) - curY;

        return {
          x: centerX - naturalX,
          y: (startY + i * verticalGap) - naturalY
        };
      });
    }

    // Estado inicial en reposo al cargar: cortina abajo (100% fuera de pantalla) y escala normal
    gsap.set("#portalLayer", { 
      yPercent: 100,
      scale: 1,
      opacity: 1,
      transformOrigin: portalOrigin
    });

    // Línea de tiempo maestra GSAP (0:00 a 0:17)
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: "#masterStage",
        start: "top top",
        end: "+=5500", // Controla la duración del scrub cinemático
        pin: true,
        scrub: 1,
        invalidateOnRefresh: true
      }
    });

    // FASE 1 (0:00 - 0:03): Se mueven las figuras del fondo y el círculo rojo sube
    tl.to("#shapeCross", { rotation: 65, duration: 1.5, ease: "none" }, 0)
      .to("#redDot", { y: -280, x: -40, scale: 0.85, duration: 1.5, ease: "power1.inOut" }, 0)
      .to("#heroContent", { y: -50, duration: 1.5, ease: "none" }, 0)

    // FASE 2 (0:03 - 0:04): Sube la cortina transparente con "BIOCOREXSTACK SOFTWARE LABS"
      .fromTo("#portalLayer", 
        { yPercent: 100, scale: 1, opacity: 1, transformOrigin: portalOrigin }, 
        { yPercent: 0, scale: 1, opacity: 1, transformOrigin: portalOrigin, duration: 1.2, ease: "power2.out" }, 
        0.4
      )

    // FASE 3 (0:04 - 0:06): Zoom masivo atravesando la letra 'a' de SOFTWaRE
      .to("#portalLayer", {
        scale: 55,
        transformOrigin: portalOrigin,
        duration: 2.2,
        ease: "power3.in"
      })
      .to("#manifestoLayer", {
        opacity: 1,
        duration: 0.4
      }, "-=0.55")
      .to("#portalLayer", {
        opacity: 0,
        duration: 0.2
      })

    // FASE 4 (0:06 - 0:12): Las palabras blancas van desapareciendo y las tarjetas suben
      .to("#cardLeft", { y: "-190vh", duration: 3.5, ease: "none" }, "-=0.2")
      .to("#cardRight", { y: "-210vh", duration: 3.5, ease: "none" }, "<0.4")
      .to(whiteWords, {
        opacity: 0,
        stagger: 0.025,
        duration: 2.5,
        ease: "none"
      }, "<0.2")

    // FASE 5 (0:12 - 0:16): Las palabras moradas se juntan en el centro formando la lista vertical limpia
      .to(redWords, {
        x: (i) => {
          const offsets = getRedWordsTargetOffsets();
          return offsets[i] ? offsets[i].x : 0;
        },
        y: (i) => {
          const offsets = getRedWordsTargetOffsets();
          return offsets[i] ? offsets[i].y : 0;
        },
        scale: 1.4,
        duration: 2.2,
        ease: "power2.inOut"
      }, "-=0.8")

    // FASE 6 (0:16 - 0:17): Aparece el botón inferior y termina el recorrido
      .to("#finalCta", {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out"
      }, "-=0.3");

    // Sincronizar coordenadas exactas al terminar de cargar las tipografías web
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(() => {
        ScrollTrigger.refresh();
      });
    }

    // Click en el botón final para navegar suavemente al pipeline
    const finalCta = document.getElementById("finalCta");
    if (finalCta) {
      finalCta.addEventListener("click", () => {
        const nextTarget = document.getElementById("pipeline");
        if (nextTarget) {
          nextTarget.scrollIntoView({ behavior: "smooth" });
        }
      });
    }
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

          <a href="${data.whatsapp_url}" target="_blank" rel="noopener" class="btn-whatsapp-action">
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
