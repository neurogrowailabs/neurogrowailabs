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

  // 2. DALA HERO: CONSTELACIÓN CEREBRAL 3D INTERACTIVA (BRAIN PARTICLE CLOUD)
  const canvas = document.getElementById("constellationCanvas");
  if (canvas) {
    const ctx = canvas.getContext("2d");
    const wrapper = document.getElementById("canvasWrapper") || canvas.parentElement;

    let animationFrameId;
    let width = 0;
    let height = 0;
    let dpr = 1;

    // Estado 3D y Física del Modelo Cerebral
    let rotY = -0.15;
    let rotX = 0.05;
    let targetRotY = -0.15;
    let targetRotX = 0.05;

    const resizeCanvas = () => {
      if (!wrapper) return;
      const rect = wrapper.getBoundingClientRect();
      dpr = Math.min(window.devicePixelRatio || 1, 2);
      width = rect.width;
      height = rect.height || 540;
      canvas.width = width * dpr;
      canvas.height = height * dpr;
      canvas.style.width = `${width}px`;
      canvas.style.height = `${height}px`;
    };

    window.addEventListener("resize", resizeCanvas, { passive: true });
    resizeCanvas();

    // Paleta cromática idéntica a Dala (Refero Design Style):
    // Saffron Spark (ámbar), Electric Iris (violeta), Magenta, Cyan/Teal y Blanco Puro
    const colorPalette = {
      temporal: ["#ffb829", "#ffa000", "#ffc107", "#ff8f00"], // Ámbar cálido anterior/temporal
      cortex: ["#8052ff", "#9281f7", "#a29bfe", "#706fd3"],   // Violeta iris en la corteza
      crown: ["#e056fd", "#be2edd", "#ffffff", "#00d2d3"],    // Magenta, cyan y chispas blancas
      cerebellum: ["#ffb829", "#8052ff", "#15846e", "#ffa000"] // Mezcla orgánica inferior
    };

    // Función anatómica para moldear la silueta lateral de un cerebro humano en 3D
    function isInsideBrain(x, y, z) {
      const dZ = z / 0.58;
      if (dZ * dZ > 1) return false;
      const depthFactor = Math.sqrt(Math.max(0, 1 - dZ * dZ));

      // 1. Corteza Cerebral Superior
      const cx = (x + 0.08) / 0.92;
      const cy = (y + 0.16) / 0.72;
      const inCortex = (cx * cx + cy * cy) <= (depthFactor * 1.08);

      // 2. Lóbulo Frontal (Curva anterior izquierda)
      const fx = (x + 0.58) / 0.42;
      const fy = (y + 0.06) / 0.46;
      const inFrontal = (fx * fx + fy * fy) <= (depthFactor * 1.02);

      // 3. Lóbulo Temporal (Protuberancia inferior media)
      const tx = (x + 0.18) / 0.44;
      const ty = (y - 0.28) / 0.32;
      const inTemporal = (tx * tx + ty * ty) <= (depthFactor * 0.95);

      // 4. Cerebelo (Posterior inferior derecha)
      const cbx = (x - 0.54) / 0.36;
      const cby = (y - 0.44) / 0.28;
      const inCerebellum = (cbx * cbx + cby * cby) <= (depthFactor * 0.9);

      // 5. Fisura de Silvio (Cisura entre lóbulo frontal y temporal)
      if (x > -0.55 && x < -0.15 && y > 0.08 && y < 0.22 && z > 0.15) {
        if (Math.random() > 0.18) return false;
      }

      // 6. Tronco encefálico (descenso inferior central)
      const sx = (x - 0.12) / 0.16;
      const sy = (y - 0.65) / 0.26;
      const inStem = (sx * sx + sy * sy) <= 0.65 && z * z < 0.1;

      return inCortex || inFrontal || inTemporal || inCerebellum || inStem;
    }

    // Generador de partículas que dan forma al cerebro
    const particleCount = window.innerWidth < 768 ? 950 : 1900;
    const brainParticles = [];
    let attempts = 0;

    while (brainParticles.length < particleCount && attempts < particleCount * 30) {
      attempts++;
      const x = (Math.random() - 0.5) * 2.2;
      const y = (Math.random() - 0.5) * 1.9;
      const z = (Math.random() - 0.5) * 1.3;

      if (isInsideBrain(x, y, z)) {
        const gyriWave = Math.sin(x * 12) * Math.cos(y * 12) * Math.sin(z * 10);
        
        let palette;
        if (y > 0.12 && x < 0.25) {
          palette = colorPalette.temporal; // Ámbar intenso en temporal y base
        } else if (y > 0.25 && x >= 0.25) {
          palette = colorPalette.cerebellum; // Ámbar / violeta en cerebelo
        } else if (y < -0.35) {
          palette = colorPalette.crown; // Magenta / Cyan / Blanco en corona
        } else {
          palette = colorPalette.cortex; // Violeta iris en corteza
        }

        const color = palette[Math.floor(Math.random() * palette.length)];
        const size = Math.random() * 3.2 + 1.8;

        brainParticles.push({
          x: x + gyriWave * 0.03,
          y: y + gyriWave * 0.03,
          z: z + gyriWave * 0.03,
          color,
          size,
          angle: Math.random() * Math.PI * 2,
          rotSpeed: (Math.random() - 0.5) * 0.02,
          phase: Math.random() * Math.PI * 2,
          pulseSpeed: Math.random() * 0.03 + 0.015,
        });
      }
    }

    // Generar triángulos grandes flotantes en el espacio circundante (los wireframes del void)
    const ambientCount = 20;
    const ambientColors = ["#ffb829", "#8052ff", "#00d2d3", "#e056fd"];
    const ambientTriangles = Array.from({ length: ambientCount }, () => ({
      x: (Math.random() - 0.5) * 3.2,
      y: (Math.random() - 0.5) * 2.8,
      z: (Math.random() - 0.5) * 2.2,
      size: Math.random() * 22 + 12,
      color: ambientColors[Math.floor(Math.random() * ambientColors.length)],
      angleX: Math.random() * Math.PI * 2,
      angleY: Math.random() * Math.PI * 2,
      angleZ: Math.random() * Math.PI * 2,
      vx: (Math.random() - 0.5) * 0.002,
      vy: (Math.random() - 0.5) * 0.002,
      rotSpeedX: (Math.random() - 0.5) * 0.01,
      rotSpeedY: (Math.random() - 0.5) * 0.01,
      rotSpeedZ: (Math.random() - 0.5) * 0.01,
      opacity: Math.random() * 0.45 + 0.25,
    }));

    // Interacción con el cursor: inclinación tridimensional suave
    window.addEventListener("mousemove", (e) => {
      const rect = canvas.getBoundingClientRect();
      const nx = (e.clientX - (rect.left + rect.width / 2)) / (window.innerWidth / 2);
      const ny = (e.clientY - (rect.top + rect.height / 2)) / (window.innerHeight / 2);
      targetRotY = -0.15 + nx * 0.45;
      targetRotX = 0.05 + ny * 0.35;
    }, { passive: true });

    // Loop de renderizado de alto rendimiento a 60 FPS
    let time = 0;
    const render = () => {
      ctx.save();
      ctx.scale(dpr, dpr);
      ctx.clearRect(0, 0, width, height);

      time += 1;

      // Amortiguación física suave
      rotY += (targetRotY - rotY) * 0.04 + 0.0018;
      rotX += (targetRotX - rotX) * 0.04;

      const cosY = Math.cos(rotY);
      const sinY = Math.sin(rotY);
      const cosX = Math.cos(rotX);
      const sinX = Math.sin(rotX);

      const fov = 3.2;
      const baseRadius = Math.min(width, height) * (window.innerWidth < 768 ? 0.38 : 0.44);
      const centerX = width * 0.52;
      const centerY = height * 0.48;

      // 1. Dibujar triángulos flotantes del entorno (Wireframe Triangles)
      for (let i = 0; i < ambientTriangles.length; i++) {
        const at = ambientTriangles[i];
        at.angleX += at.rotSpeedX;
        at.angleY += at.rotSpeedY;
        at.angleZ += at.rotSpeedZ;
        at.x += at.vx;
        at.y += at.vy;

        if (Math.abs(at.x) > 1.8) at.vx *= -1;
        if (Math.abs(at.y) > 1.6) at.vy *= -1;

        const px = at.x * cosY + at.z * sinY;
        const pz = -at.x * sinY + at.z * cosY;
        const py = at.y * cosX - pz * sinX;
        const pz2 = at.y * sinX + pz * cosX;

        const pScale = fov / (fov + pz2 + 1.2);
        if (pScale > 0) {
          const sx = centerX + px * baseRadius * 1.25;
          const sy = centerY + py * baseRadius * 1.25;
          const sSize = at.size * pScale;

          ctx.save();
          ctx.translate(sx, sy);
          ctx.rotate(at.angleZ);
          ctx.beginPath();
          ctx.moveTo(0, -sSize);
          ctx.lineTo(sSize * 0.866, sSize * 0.5);
          ctx.lineTo(-sSize * 0.866, sSize * 0.5);
          ctx.closePath();
          ctx.strokeStyle = at.color;
          ctx.globalAlpha = at.opacity * Math.min(1, pScale);
          ctx.lineWidth = 1.2;
          ctx.stroke();
          ctx.restore();
        }
      }

      // 2. Proyección y Z-sorting de las partículas del cerebro
      const projected = [];
      for (let i = 0; i < brainParticles.length; i++) {
        const p = brainParticles[i];
        
        const x1 = p.x * cosY + p.z * sinY;
        const z1 = -p.x * sinY + p.z * cosY;
        const y2 = p.y * cosX - z1 * sinX;
        const z2 = p.y * sinX + z1 * cosX;

        const scale = fov / (fov + z2);
        if (scale > 0) {
          projected.push({
            p,
            sx: centerX + x1 * baseRadius * scale,
            sy: centerY + y2 * baseRadius * scale,
            scale,
            z: z2
          });
        }
      }

      projected.sort((a, b) => a.z - b.z);

      // 3. Renderizado de las partículas triangulares del cerebro
      for (let i = 0; i < projected.length; i++) {
        const item = projected[i];
        const p = item.p;
        p.angle += p.rotSpeed;

        const size = p.size * item.scale;
        const pulse = 0.4 + 0.6 * Math.sin(time * p.pulseSpeed + p.phase);
        const alpha = Math.min(1, Math.max(0.18, pulse * (item.scale * 0.95)));

        ctx.save();
        ctx.translate(item.sx, item.sy);
        ctx.rotate(p.angle);
        ctx.beginPath();
        ctx.moveTo(0, -size);
        ctx.lineTo(size * 0.866, size * 0.5);
        ctx.lineTo(-size * 0.866, size * 0.5);
        ctx.closePath();
        ctx.strokeStyle = p.color;
        ctx.globalAlpha = alpha;
        ctx.lineWidth = 1.15;
        ctx.stroke();
        ctx.restore();
      }

      ctx.restore();
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
