/**
 * BioCoreX Labs — Dala 3D Authentic Brain Engine
 * Cerebro anatómico auténtico: 10,000 pirámides instanciadas (quad_q2.json, el
 * quadrant con silueta completa verificada) sobre void puro. Limpieza prisms
 * ambientales limitados al hero, encuadre calculado contra el viewport para
 * no recortar nunca la silueta.
 */
(function() {
    'use strict';

    if (typeof THREE === 'undefined') {
        console.warn('[Dala 3D Brain] Three.js not found. Skipping 3D initialization.');
        return;
    }

    const REDUCED_MOTION = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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
        const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 50);
        camera.position.set(0, 0, 10);

        // Cerebro auténtico de dala.ai: quadrant Q2 = silueta completa (ámbar/lavanda/violeta)
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

        // Escala responsiva: calculada contra el encuadre visible de la cámara
        // para garantizar cerebro completo sin recortes en cualquier breakpoint.
        const HALF_Y = Math.tan(25 * Math.PI / 180) * 10;
        const HALF_X = () => HALF_Y * (window.innerWidth / window.innerHeight);
        let brainScale = 3.92;

        // 1. Cerebro: 10,000 pirámides de 3 caras siguiendo la silueta original
        const coneGeo = new THREE.ConeGeometry(0.028, 0.058, 3);
        const coneMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
        const brainMesh = new THREE.InstancedMesh(coneGeo, coneMat, count);

        const dummy = new THREE.Object3D();
        const color = new THREE.Color();
        const brainPoints = [];

        for (let i = 0; i < count; i++) {
            const p = pts[i];
            brainPoints.push({
                x: p[0], y: p[1], z: p[2],
                size: p[6],
                jitter: 0.92 + Math.random() * 0.16
            });

            // Fidelidad cromática del archivo original (boost suave + clamping)
            const r = Math.min(1, p[3] * 1.08);
            const g = Math.min(1, p[4] * 1.08);
            const b = Math.min(1, p[5] * 1.08);
            color.setRGB(r, g, b);
            brainMesh.setColorAt(i, color);
        }
        if (brainMesh.instanceColor) brainMesh.instanceColor.needsUpdate = true;
        brainMesh.frustumCulled = false;

        const brainGroup = new THREE.Group();
        brainGroup.add(brainMesh);
        scene.add(brainGroup);

        function applyBrainScale() {
            const halfX = HALF_X();
            const isDesktop = window.innerWidth >= 1024;
            const cx = isDesktop ? halfX * 0.50 : 0;
            // Radio objetivo: 58% del alto visible; limitado por el ancho libre
            // hasta el borde de pantalla (1.22 de margen contra clipping)
            const rx = cx > 0 ? (halfX - cx) * 0.78 : halfX * 0.62;
            const targetR = Math.min(0.60 * HALF_Y, Math.max(0.9, rx));
            brainScale = targetR / 0.92;
            return { cx };
        }

        function updateLayout() {
            const { cx } = applyBrainScale();
            const isDesktop = window.innerWidth >= 1024;
            const cy = isDesktop ? 0.05 : -0.85;

            for (let i = 0; i < count; i++) {
                const P = brainPoints[i];
                const x = P.x * brainScale, y = P.y * brainScale, z = P.z * brainScale;
                dummy.position.set(x, y, z);
                dummy.lookAt(x * 1.7, y * 1.7, z * 1.7);
                const s = (0.55 + P.size * 0.85) * P.jitter;
                dummy.scale.set(s, s, s);
                dummy.updateMatrix();
                brainMesh.setMatrixAt(i, dummy.matrix);
            }
            brainMesh.instanceMatrix.needsUpdate = true;

            basePos.set(cx, cy, 0);
            brainGroup.position.copy(basePos);
            brainGroup.rotation.set(0.08, -0.58, -0.04);
            brainGroup.scale.set(1, 1, 1);
        }

        // 2. Prisms ambientales: 3 capas cuidadas, confinadas y tenues
        const ambientPalette = [
            new THREE.Color('#8052ff'), // Electric Iris
            new THREE.Color('#ffb829'), // Saffron Spark
            new THREE.Color('#15846e'), // Deep Verdant
            new THREE.Color('#e056fd'), // Magenta Glow
            new THREE.Color('#bdbdbd')  // Silver Mist
        ];

        const solidCount = 54;
        const solidGeo = new THREE.ConeGeometry(0.055, 0.10, 3);
        const solidMat = new THREE.MeshBasicMaterial({ transparent: true, opacity: 0.5 });
        const solidMesh = new THREE.InstancedMesh(solidGeo, solidMat, solidCount);
        solidMesh.frustumCulled = false;

        const wireCount = 12;
        const wireGeo = new THREE.ConeGeometry(0.11, 0.19, 3);
        const wireMat = new THREE.MeshBasicMaterial({ transparent: true, opacity: 0.28, wireframe: true });
        const wireMesh = new THREE.InstancedMesh(wireGeo, wireMat, wireCount);
        wireMesh.frustumCulled = false;

        function scatterAmbient(count, xSpread, ySpread, zRange) {
            const data = [];
            for (let i = 0; i < count; i++) {
                data.push({
                    x: (Math.random() - 0.5) * xSpread,
                    y: (Math.random() - 0.5) * ySpread,
                    z: zRange[0] + Math.random() * (zRange[1] - zRange[0]),
                    rotX: Math.random() * Math.PI,
                    rotY: Math.random() * Math.PI,
                    rotSpeed: 0.008 + Math.random() * 0.02,
                    speed: 0.3 + Math.random() * 0.5,
                    scale: 0.4 + Math.random() * 0.85,
                    phase: i
                });
            }
            return data;
        }

        const basePos = new THREE.Vector3();
        const halfXForSpread = HALF_X();
        let solidData = scatterAmbient(solidCount, halfXForSpread * 2.1, HALF_Y * 2.0, [-3, 1.5]);
        let wireData = scatterAmbient(wireCount, halfXForSpread * 2.0, HALF_Y * 1.8, [-2.5, 1.5]);

        solidData.forEach((_, i) => solidMesh.setColorAt(i, ambientPalette[i % ambientPalette.length]));
        wireData.forEach((_, i) => wireMesh.setColorAt(i, ambientPalette[(i + 2) % ambientPalette.length]));
        solidMesh.instanceColor.needsUpdate = true;
        wireMesh.instanceColor.needsUpdate = true;
        scene.add(solidMesh);
        scene.add(wireMesh);

        // Encuadre inicial
        updateLayout();

        // Parallax sutil de puntero
        let targetRotY = -0.58, targetRotX = 0.08;
        if (!REDUCED_MOTION) {
            window.addEventListener('mousemove', (e) => {
                const mx = (e.clientX / window.innerWidth - 0.5) * 2;
                const my = (e.clientY / window.innerHeight - 0.5) * 2;
                targetRotY = -0.58 + mx * 0.10;
                targetRotX = 0.08 - my * 0.08;
            }, { passive: true });
        }

        let scrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            scrollY = window.scrollY;
        }, { passive: true });

        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const t = clock.getElapsedTime();
            const progress = Math.min(scrollY / window.innerHeight, 2.2);

            // Dormir el render cuando el cerebro ya sale de Vista por scroll
            if (progress >= 2.0) return;

            if (!REDUCED_MOTION) {
                // Rotación orgánica viva: idle wobble + parallax del puntero
                const idleY = Math.sin(t * 0.25) * 0.05;
                const idleX = Math.cos(t * 0.20) * 0.03;
                brainGroup.rotation.y += (targetRotY + idleY - brainGroup.rotation.y) * 0.06;
                brainGroup.rotation.x += (targetRotX + idleX - brainGroup.rotation.x) * 0.06;

                const pulse = 1.0 + Math.sin(t * 0.9) * 0.012;
                brainGroup.scale.set(pulse, pulse, pulse);
            }

            // Deriva al hacer scroll: el cerebro sale limpio de escenario
            const halfX = HALF_X();
            const drift = (halfX + brainScale * 0.9 + 2.0) / 1.6;
            if (window.innerWidth >= 1024) {
                brainGroup.position.x = basePos.x - progress * drift;
                brainGroup.position.y = basePos.y + progress * 0.5;
            } else {
                brainGroup.position.y = basePos.y - progress * 2.2;
            }

            // Prismas solid ambientales
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

            // Prismas wireframe de silueta amplia
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
                const halfX = HALF_X();
                solidData = scatterAmbient(solidCount, halfX * 2.1, HALF_Y * 2.0, [-3, 1.5]);
                wireData = scatterAmbient(wireCount, halfX * 2.0, HALF_Y * 1.8, [-2.5, 1.5]);
                updateLayout();
            }, 120);
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDalaEngine);
    } else {
        initDalaEngine();
    }
})();
