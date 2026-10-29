/**
 * BioCoreX Labs — Dala 3D Authentic Brain Engine v3
 *
 * Cerebro anatomico lateral (quad_q2.json: silueta completa verificada) renderizado
 * como constelacion cristalina de triangulos: nucleo ambar calido con chispas
 * cromaticas magenta/cian/violeta/teal, replicando la referencia fotografica.
 *
 * Interaccion: rotacion idle + parallax de puntero + respiracion (constantes).
 * Al scrollear, el cerebro se desintegra en una cascada de particulas
 * (erosion desde abajo, flujoencadenado abajo-derecha, fade progresivo),
 * reversibles al volver arriba.
 */
(function() {
    'use strict';

    if (typeof THREE === 'undefined') {
        console.warn('[Dala 3D Brain] Three.js not found. Skipping 3D initialization.');
        return;
    }

    const REDUCED_MOTION = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Textura: triangulo solido suave (glyph cristalino) ---------- */
    function makeTriangleSprite() {
        const c = document.createElement('canvas');
        c.width = c.height = 64;
        const ctx = c.getContext('2d');
        ctx.translate(32, 34);
        ctx.beginPath();
        ctx.moveTo(0, -18);
        ctx.lineTo(16, 10);
        ctx.lineTo(-16, 10);
        ctx.closePath();
        const grad = ctx.createLinearGradient(0, -18, 0, 10);
        grad.addColorStop(0, 'rgba(255,255,255,1)');
        grad.addColorStop(1, 'rgba(255,255,255,0.82)');
        ctx.fillStyle = grad;
        ctx.shadowColor = 'rgba(255,255,255,0.5)';
        ctx.shadowBlur = 4;
        ctx.fill();
        const tex = new THREE.CanvasTexture(c);
        tex.needsUpdate = true;
        return tex;
    }

    async function initDalaEngine() {
        const canvas = document.getElementById('dala3dCanvas');
        if (!canvas) return;

        let renderer;
        try {
            renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true,
                alpha: true,
                powerPreference: "high-performance"
            });
        } catch(e) {
            console.warn('[Dala 3D Brain] WebGL initialization failed:', e);
            return;
        }

        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.75));
        renderer.setSize(window.innerWidth, window.innerHeight);

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 60);
        camera.position.set(0, 0, 10);

        // Cerebro autentico de dala.ai: Q2 = perfil lateral completo
        let pts = [];
        try {
            const res = await fetch('/dala-assets/quad_q2.json');
            pts = await res.json();
        } catch(e) {
            console.error('[Dala 3D Brain] Error loading brain coordinates:', e);
            return;
        }
        const count = pts.length;
        if (!count) return;

        const HALF_Y = Math.tan(25 * Math.PI / 180) * 10;
        const HALF_X = () => HALF_Y * (window.innerWidth / window.innerHeight);

        /* ---------- Geometria de la constelacion ---------- */
        const basePos = new Float32Array(count * 3);
        const breakPos = new Float32Array(count * 3);
        const colorArr = new Float32Array(count * 3);
        const sizeArr = new Float32Array(count);
        const seedArr = new Float32Array(count);

        const accents = [
            new THREE.Color('#e056fd'),  // Magenta Glow
            new THREE.Color('#4dc9f6'),  // Cian chispa
            new THREE.Color('#8052ff'),  // Electric Iris
            new THREE.Color('#3ad389'),  // Verde pulso
            new THREE.Color('#ffb829')   // Saffron extra
        ];
        const cTmp = new THREE.Color();

        let minX = 1e9, maxX = -1e9, minY = 1e9, maxY = -1e9;
        for (let i = 0; i < count; i++) {
            const p = pts[i];
            if (p[0] < minX) minX = p[0]; if (p[0] > maxX) maxX = p[0];
            if (p[1] < minY) minY = p[1]; if (p[1] > maxY) maxY = p[1];
        }
        const xNorm = (x) => (x - minX) / Math.max(1e-5, maxX - minX);
        const yNorm = (y) => (y - minY) / Math.max(1e-5, maxY - minY);

        for (let i = 0; i < count; i++) {
            const p = pts[i];
            const bx = p[0], by = p[1], bz = p[2];

            // Semilla de erosion: las particulas inferiores se sueltan primero
            // (cascada de polvo como en el video), mezcladas con azar para
            // que el frente de erosion no sea una fila recta.
            seedArr[i] = Math.min(1, Math.max(0, yNorm(by) * 0.72 + Math.random() * 0.28));

            basePos[i*3] = bx; basePos[i*3+1] = by; basePos[i*3+2] = bz;

            // Vector de dispersion: radial suave + corriente predominante
            // hacia abajo-derecha (gravedad + viento), en unidades locales
            // relativas al tamano del cerebro (~1.1 a 3.2 radios).
            const rl = Math.sqrt(bx*bx + by*by + bz*bz) || 1e-4;
            const rad = 1.15 + Math.random() * 1.55 + (1 - Math.abs(by)) * 0.45;
            let fx = (bx / rl) * 0.85 + 0.52 + (Math.random() - 0.5) * 0.30;
            let fy = (by / rl) * 0.85 - 0.68 + (Math.random() - 0.5) * 0.30;
            let fz = (bz / rl) * 0.85 + (Math.random() - 0.5) * 0.55;
            const fl = Math.sqrt(fx*fx + fy*fy + fz*fz) || 1;
            breakPos[i*3]   = bx + (fx/fl) * rad;
            breakPos[i*3+1] = by + (fy/fl) * rad * 0.85;
            breakPos[i*3+2] = bz + (fz/fl) * rad;

            // Color: nucleo ambar fiel al archivo con brillo vivo;
            // chispas cromaticas salpicadas (mas probabilidad en la corteza).
            const isOuter = Math.abs(xNorm(p[0]) - 0.5) > 0.22 || Math.abs(yNorm(p[1]) - 0.5) > 0.30;
            if (Math.random() < (isOuter ? 0.24 : 0.07)) {
                cTmp.copy(accents[(Math.random() * accents.length) | 0]);
            } else {
                cTmp.setRGB(p[3], p[4], p[5]);
                const lum = 0.92 + Math.random() * 0.22;
                cTmp.multiplyScalar(lum);
            }
            colorArr[i*3] = cTmp.r; colorArr[i*3+1] = cTmp.g; colorArr[i*3+2] = cTmp.b;

            // Tamano: particulas pequenas cristalinas; chispas algo mayores
            sizeArr[i] = 0.20 + p[6] * 0.34 + (Math.random() < 0.06 ? 0.12 : 0);
        }

        const geo = new THREE.BufferGeometry();
        geo.setAttribute('position', new THREE.BufferAttribute(basePos, 3));
        geo.setAttribute('aBreak', new THREE.BufferAttribute(breakPos, 3));
        geo.setAttribute('aColor', new THREE.BufferAttribute(colorArr, 3));
        geo.setAttribute('aSize', new THREE.BufferAttribute(sizeArr, 1));
        geo.setAttribute('aSeed', new THREE.BufferAttribute(seedArr, 1));

        const uTime = { value: 0 };
        const uProgress = { value: 0 };
        const mat = new THREE.ShaderMaterial({
            transparent: true,
            depthWrite: false,
            depthTest: true,
            blending: THREE.NormalBlending,
            uniforms: {
                uTime: uTime,
                uProgress: uProgress,
                uPixelRatio: { value: renderer.getPixelRatio() },
                uTex: { value: makeTriangleSprite() }
            },
            vertexShader: [
                'attribute vec3 aBreak;',
                'attribute vec3 aColor;',
                'attribute float aSize;',
                'attribute float aSeed;',
                'uniform float uTime;',
                'uniform float uProgress;',
                'uniform float uPixelRatio;',
                'varying vec3 vColor;',
                'varying float vAlpha;',
                'float easeOutCubic(float x){ return 1.0 - pow(1.0 - x, 3.0); }',
                'void main(){',
                '  float local = clamp(uProgress * 1.45 - aSeed * 0.45, 0.0, 1.0);',
                '  float e = easeOutCubic(local);',
                '  vec3 pos = mix(position, aBreak, e);',
                '  // Flotacion viva cuando ya esta disperso',
                '  pos += vec3(sin(uTime * 0.55 + aSeed * 43.0), cos(uTime * 0.45 + aSeed * 29.0), 0.0) * e * 0.35;',
                '  vec4 mv = modelViewMatrix * vec4(pos, 1.0);',
                '  // Tamano con atenuacion de perspectiva (mas lejos, mas pequeno)',
                '  gl_PointSize = aSize * (140.0 / max(0.001, -mv.z)) * uPixelRatio * (1.0 - e * 0.42);',
                '  vColor = aColor;',
                '  // Alpha: formado = vivo; disperso = se apaga con brillo dejado',
                '  float twinkle = 0.86 + 0.14 * sin(uTime * (1.2 + aSeed) + aSeed * 91.0);',
                '  vAlpha = (1.0 - e * 0.96) * (0.7 + 0.3 * twinkle);',
                '  gl_Position = projectionMatrix * mv;',
                '}'
            ].join('\n'),
            fragmentShader: [
                'uniform sampler2D uTex;',
                'varying vec3 vColor;',
                'varying float vAlpha;',
                'void main(){',
                '  vec4 t = texture2D(uTex, gl_PointCoord);',
                '  float a = t.a * vAlpha;',
                '  if (a < 0.012) discard;',
                '  gl_FragColor = vec4(vColor, a);',
                '}'
            ].join('\n')
        });

        const constellation = new THREE.Points(geo, mat);
        constellation.frustumCulled = false;

        const brainGroup = new THREE.Group();
        brainGroup.add(constellation);
        scene.add(brainGroup);

        /* ---------- Encuadre responsivo (sin recortes) ---------- */
        let brainScale = 3.42;
        const frame = { cx: 0, cy: 0, pxPerUnit: 1, screenR: 100 };
        function applyFrame() {
            const halfX = HALF_X();
            const isDesktop = window.innerWidth >= 1024;
            const cx = isDesktop ? halfX * 0.50 : 0;
            const rx = cx > 0 ? (halfX - cx) * 0.80 : halfX * 0.66;
            const targetR = Math.min(0.72 * HALF_Y, Math.max(0.9, rx));
            brainScale = targetR / 0.92;

            const cy = isDesktop ? 0.02 : -0.85;
            brainGroup.scale.setScalar(brainScale);
            brainGroup.position.set(cx, cy, 0);
            brainGroup.rotation.set(0.08, -0.58, -0.04);

            // Metricas de pantalla para el hover circular sobre el cerebro
            const pxPerUnit = (window.innerHeight / 2) / HALF_Y;
            frame.cx = cx; frame.cy = cy; frame.pxPerUnit = pxPerUnit;
            frame.screenR = brainScale * 0.95 * pxPerUnit;
        }
        applyFrame();

        /* ---------- Hover frontal + parallax por puntero ---------- */
        const hover = { cur: 0, target: 0 };
        const ptr = { x: -1, y: -1, parX: 0, parY: 0, inside: false };

        function updateHover() {
            if (ptr.inside === false || scrollSmooth > 0.55) {
                hover.target = 0;
                return;
            }
            const centerX = window.innerWidth / 2 + frame.cx * frame.pxPerUnit;
            const centerY = window.innerHeight / 2 - frame.cy * frame.pxPerUnit;
            const dx = ptr.x - centerX, dy = ptr.y - centerY;
            hover.target = (dx*dx + dy*dy <= frame.screenR * frame.screenR * 1.18) ? 1 : 0;
        }

        /* ---------- Prisms ambientales (2 capas tenues) ---------- */
        const ambientPalette = [
            new THREE.Color('#8052ff'),
            new THREE.Color('#ffb829'),
            new THREE.Color('#15846e'),
            new THREE.Color('#e056fd'),
            new THREE.Color('#bdbdbd')
        ];
        const solidCount = 54;
        const solidGeo = new THREE.ConeGeometry(0.055, 0.10, 3);
        const solidMat = new THREE.MeshBasicMaterial({ transparent: true, opacity: 0.42 });
        const solidMesh = new THREE.InstancedMesh(solidGeo, solidMat, solidCount);
        solidMesh.frustumCulled = false;

        const wireCount = 12;
        const wireGeo = new THREE.ConeGeometry(0.11, 0.19, 3);
        const wireMat = new THREE.MeshBasicMaterial({ transparent: true, opacity: 0.26, wireframe: true });
        const wireMesh = new THREE.InstancedMesh(wireGeo, wireMat, wireCount);
        wireMesh.frustumCulled = false;

        function scatterAmbient(n, xs, ys, zr) {
            const d = [];
            for (let i = 0; i < n; i++) {
                d.push({
                    x: (Math.random() - 0.5) * xs,
                    y: (Math.random() - 0.5) * ys,
                    z: zr[0] + Math.random() * (zr[1] - zr[0]),
                    rotX: Math.random() * Math.PI,
                    rotY: Math.random() * Math.PI,
                    rotSpeed: 0.008 + Math.random() * 0.02,
                    speed: 0.3 + Math.random() * 0.5,
                    scale: 0.4 + Math.random() * 0.85,
                    phase: i
                });
            }
            return d;
        }

        let solidData = scatterAmbient(solidCount, HALF_X() * 2.1, HALF_Y * 2.0, [-3, 1.5]);
        let wireData = scatterAmbient(wireCount, HALF_X() * 2.0, HALF_Y * 1.8, [-2.5, 1.5]);
        solidData.forEach((_, i) => solidMesh.setColorAt(i, ambientPalette[i % ambientPalette.length]));
        wireData.forEach((_, i) => wireMesh.setColorAt(i, ambientPalette[(i + 2) % ambientPalette.length]));
        solidMesh.instanceColor.needsUpdate = true;
        wireMesh.instanceColor.needsUpdate = true;
        scene.add(solidMesh);
        scene.add(wireMesh);

        const dummy = new THREE.Object3D();

        /* ---------- Interaccion: parallax + hover frontal + tactil ---------- */
        if (!REDUCED_MOTION) {
            window.addEventListener('mousemove', (e) => {
                ptr.x = e.clientX; ptr.y = e.clientY; ptr.inside = true;
                const mx = (e.clientX / window.innerWidth - 0.5) * 2;
                const my = (e.clientY / window.innerHeight - 0.5) * 2;
                ptr.parX = -my * 0.16;
                ptr.parY = mx * 0.16;
                updateHover();
            }, { passive: true });
            document.addEventListener('mouseleave', () => {
                ptr.inside = false;
                hover.target = 0;
            });
        }

        // Tactil: pasar el dedo por encima del cerebro tambien gira el frente
        const applyTouch = (e) => {
            if (!e.touches || !e.touches.length) return;
            ptr.x = e.touches[0].clientX; ptr.y = e.touches[0].clientY;
            ptr.inside = true;
            updateHover();
        };
        window.addEventListener('touchmove', applyTouch, { passive: true });
        window.addEventListener('touchstart', applyTouch, { passive: true });
        window.addEventListener('touchend', () => {
            ptr.inside = false;
            hover.target = 0;
        }, { passive: true });

        let scrollTarget = 0, scrollSmooth = 0;
        const readScroll = () => {
            scrollTarget = Math.min(Math.max(window.scrollY / window.innerHeight, 0), 2.2);
            updateHover();
        };
        readScroll();
        window.addEventListener('scroll', readScroll, { passive: true });

        /* ---------- Loop ---------- */
        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const t = clock.getElapsedTime();
            scrollSmooth += (scrollTarget - scrollSmooth) * 0.10;
            uTime.value = t;
            uProgress.value = scrollSmooth;

            if (scrollSmooth >= 1.85) return; // Fuera de vista: dormir el render

            // Transicion frontal <-> suave por hover: hover.cur 0..1
            hover.cur += (hover.target - hover.cur) * 0.085;
            const hb = hover.cur;

            if (!REDUCED_MOTION) {
                // Moto vivo: amplitudes crecen cuando el cerebro esta observado
                const idleAmpY = 0.045 + 0.040 * hb;
                const idleAmpX = 0.030 + 0.025 * hb;
                const idleY = Math.sin(t * 0.25) * idleAmpY;
                const idleX = Math.cos(t * 0.22) * idleAmpX;

                // Vista frontal al observar: giro de perfil (ry -0.58) al frente (ry 0.02)
                const ry = -0.58 + 0.60 * hb + ptr.parY * (0.55 + 0.45 * hb);
                const rx = 0.08 - 0.13 * hb + ptr.parX * (0.55 + 0.45 * hb);
                brainGroup.rotation.y += (ry + idleY - brainGroup.rotation.y) * 0.075;
                brainGroup.rotation.x += (rx + idleX - brainGroup.rotation.x) * 0.075;

                const pulse = 1.0 + Math.sin(t * 0.9) * (0.014 + 0.006 * hb);
                brainGroup.scale.setScalar(brainScale * pulse);

                // Levitacion suave continua
                brainGroup.position.y = frame.cy + Math.sin(t * 0.5) * (0.11 + 0.05 * hb);
            }

            // Prismas ambientales: drift + fade progresivo junto con el cerebro
            const fade = Math.min(1, scrollSmooth * 1.15);
            solidMat.opacity = 0.42 * (1 - fade * 0.92);
            wireMat.opacity = 0.26 * (1 - fade * 0.9);

            for (let i = 0; i < solidCount; i++) {
                const item = solidData[i];
                item.rotX += item.rotSpeed;
                item.rotY += item.rotSpeed * 0.7;
                dummy.position.set(
                    item.x + Math.sin(t * item.speed + item.phase) * 0.28,
                    item.y + Math.cos(t * item.speed + item.phase) * 0.22,
                    item.z
                );
                dummy.rotation.set(item.rotX, item.rotY, 0);
                dummy.scale.setScalar(item.scale);
                dummy.updateMatrix();
                solidMesh.setMatrixAt(i, dummy.matrix);
            }
            solidMesh.instanceMatrix.needsUpdate = true;

            for (let i = 0; i < wireCount; i++) {
                const item = wireData[i];
                item.rotX -= item.rotSpeed * 0.55;
                item.rotY += item.rotSpeed * 0.5;
                dummy.position.set(
                    item.x + Math.sin(t * item.speed + item.phase) * 0.34,
                    item.y + Math.cos(t * item.speed * 0.8 + item.phase) * 0.28,
                    item.z
                );
                dummy.rotation.set(item.rotX, item.rotY, 0);
                dummy.scale.setScalar(item.scale);
                dummy.updateMatrix();
                wireMesh.setMatrixAt(i, dummy.matrix);
            }
            wireMesh.instanceMatrix.needsUpdate = true;

            renderer.render(scene, camera);
        }
        animate();

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
                mat.uniforms.uPixelRatio.value = renderer.getPixelRatio();
                solidData = scatterAmbient(solidCount, HALF_X() * 2.1, HALF_Y * 2.0, [-3, 1.5]);
                wireData = scatterAmbient(wireCount, HALF_X() * 2.0, HALF_Y * 1.8, [-2.5, 1.5]);
                applyFrame();
            }, 120);
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDalaEngine);
    } else {
        initDalaEngine();
    }
})();
