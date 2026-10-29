/**
 * BioCoreX Labs — Dala 3D Authentic Anatomical Brain Engine
 * Rendered via Three.js with 10,000 instanced pyramidal particles (Q2 quadrant)
 * and ambient floating chromatic wireframe prisms drifting in the pure black void.
 */
(function() {
    'use strict';

    if (typeof THREE === 'undefined') {
        console.warn('[Dala 3D Brain] Three.js not found. Skipping 3D initialization.');
        return;
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

        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 50);
        camera.position.set(0, 0, 10);

        // Fetch the 10,000 anatomical human brain points (extracted from Q2 HDR half-float map)
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

        // 1. Brain Mesh: 10,000 triangular pyramids (matching Dala's piramed mesh)
        const coneGeo = new THREE.ConeGeometry(0.040, 0.076, 3);
        const coneMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
        const instancedMesh = new THREE.InstancedMesh(coneGeo, coneMat, count);

        const dummy = new THREE.Object3D();
        const color = new THREE.Color();
        const brainScale = 3.92;

        for (let i = 0; i < count; i++) {
            const p = pts[i];
            const x = p[0] * brainScale;
            const y = p[1] * brainScale;
            const z = p[2] * brainScale;

            dummy.position.set(x, y, z);
            dummy.lookAt(x * 1.6, y * 1.6, z * 1.6);
            const s = 0.50 + p[6] * 0.90;
            dummy.scale.set(s, s, s);
            dummy.updateMatrix();
            instancedMesh.setMatrixAt(i, dummy.matrix);

            // True chromatic values with Dala saturation boost
            color.setRGB(p[3] * 1.35, p[4] * 1.35, p[5] * 1.35);
            instancedMesh.setColorAt(i, color);
        }
        instancedMesh.instanceMatrix.needsUpdate = true;
        if (instancedMesh.instanceColor) instancedMesh.instanceColor.needsUpdate = true;

        const brainGroup = new THREE.Group();
        brainGroup.add(instancedMesh);
        scene.add(brainGroup);

        // 2. Ambient Floating Crystals: Solid Prisms (180 particles)
        const fgCount = 180;
        const fgGeo = new THREE.ConeGeometry(0.07, 0.13, 3);
        const fgMat = new THREE.MeshBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.65 });
        const fgMesh = new THREE.InstancedMesh(fgGeo, fgMat, fgCount);

        // 3. Ambient Floating Crystals: Wireframe Outlines (35 large prisms)
        const fgWireCount = 35;
        const fgWireGeo = new THREE.ConeGeometry(0.12, 0.22, 3);
        const fgWireMat = new THREE.MeshBasicMaterial({ color: 0xffffff, wireframe: true, transparent: true, opacity: 0.45 });
        const fgWireMesh = new THREE.InstancedMesh(fgWireGeo, fgWireMat, fgWireCount);

        const fgColors = [
            new THREE.Color(93/255, 57/255, 154/255),   // Electric Iris (#8052ff)
            new THREE.Color(186/255, 136/255, 43/255),  // Saffron Spark (#ffb829)
            new THREE.Color(40/255, 116/255, 100/255),  // Deep Verdant (#15846e)
            new THREE.Color(164/255, 148/255, 175/255)  // Silver Mist (#bdbdbd)
        ];

        const fgData = [];
        for (let i = 0; i < fgCount; i++) {
            const x = (Math.random() - 0.5) * 16;
            const y = (Math.random() - 0.5) * 10;
            const z = (Math.random() - 0.5) * 6;
            const rotSpeedX = (Math.random() - 0.5) * 0.02;
            const rotSpeedY = (Math.random() - 0.5) * 0.02;
            const speed = 0.4 + Math.random() * 0.6;
            const scale = 0.35 + Math.random() * 0.9;
            fgData.push({ x, y, z, rotSpeedX, rotSpeedY, speed, scale, curRotX: Math.random() * Math.PI, curRotY: Math.random() * Math.PI });

            dummy.position.set(x, y, z);
            dummy.scale.set(scale, scale, scale);
            dummy.updateMatrix();
            fgMesh.setMatrixAt(i, dummy.matrix);

            const col = fgColors[Math.floor(Math.random() * fgColors.length)];
            fgMesh.setColorAt(i, col);
        }
        fgMesh.instanceMatrix.needsUpdate = true;
        if (fgMesh.instanceColor) fgMesh.instanceColor.needsUpdate = true;
        scene.add(fgMesh);

        const fgWireData = [];
        for (let i = 0; i < fgWireCount; i++) {
            const x = (Math.random() - 0.5) * 15;
            const y = (Math.random() - 0.5) * 9;
            const z = (Math.random() - 0.5) * 6 + 1.5;
            const rotSpeedX = (Math.random() - 0.5) * 0.015;
            const rotSpeedY = (Math.random() - 0.5) * 0.015;
            const speed = 0.3 + Math.random() * 0.4;
            const scale = 0.8 + Math.random() * 1.5;
            fgWireData.push({ x, y, z, rotSpeedX, rotSpeedY, speed, scale, curRotX: Math.random() * Math.PI, curRotY: Math.random() * Math.PI });

            dummy.position.set(x, y, z);
            dummy.scale.set(scale, scale, scale);
            dummy.updateMatrix();
            fgWireMesh.setMatrixAt(i, dummy.matrix);

            const col = fgColors[Math.floor(Math.random() * fgColors.length)];
            fgWireMesh.setColorAt(i, col);
        }
        fgWireMesh.instanceMatrix.needsUpdate = true;
        if (fgWireMesh.instanceColor) fgWireMesh.instanceColor.needsUpdate = true;
        scene.add(fgWireMesh);

        // Layout positioning matching Dala's basePosition and orientation
        let basePosX = 2.65, basePosY = 0.12;
        function updateLayout() {
            const isDesktop = window.innerWidth >= 1024;
            if (isDesktop) {
                basePosX = 2.65;
                basePosY = 0.12;
                brainGroup.position.set(basePosX, basePosY, 0);
                brainGroup.rotation.y = -0.58;
                brainGroup.rotation.x = 0.08;
                brainGroup.rotation.z = -0.04;
            } else {
                basePosX = 0;
                basePosY = -1.0;
                brainGroup.position.set(basePosX, basePosY, 0);
                brainGroup.rotation.y = -0.58;
                brainGroup.rotation.x = 0.08;
                brainGroup.rotation.z = -0.04;
            }
        }
        updateLayout();

        // Mouse Parallax
        let targetRotY = -0.58, targetRotX = 0.08;
        window.addEventListener('mousemove', (e) => {
            const mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
            const mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
            targetRotY = -0.58 + mouseX * 0.22;
            targetRotX = 0.08 - mouseY * 0.18;
        }, { passive: true });

        // Scroll Parallax
        let scrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            scrollY = window.scrollY;
        }, { passive: true });

        // Continuous render loop
        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const time = clock.getElapsedTime();

            // Smooth rotation & organic breathing
            brainGroup.rotation.y += (targetRotY + Math.sin(time * 0.4) * 0.04 - brainGroup.rotation.y) * 0.05;
            brainGroup.rotation.x += (targetRotX + Math.cos(time * 0.3) * 0.03 - brainGroup.rotation.x) * 0.05;

            // Subtle living pulse
            const pulse = 1.0 + Math.sin(time * 1.1) * 0.015;
            brainGroup.scale.set(pulse, pulse, pulse);

            // Scroll movement: smooth translation across the void
            const scrollProgress = Math.min(scrollY / window.innerHeight, 2.5);
            const isDesktop = window.innerWidth >= 1024;
            if (isDesktop) {
                brainGroup.position.x = basePosX - scrollProgress * 4.5;
                brainGroup.position.y = basePosY + scrollProgress * 0.4;
            } else {
                brainGroup.position.y = basePosY - scrollProgress * 1.8;
            }

            // Animate floating solid prisms
            for (let i = 0; i < fgCount; i++) {
                const item = fgData[i];
                item.curRotX += item.rotSpeedX;
                item.curRotY += item.rotSpeedY;
                dummy.position.set(
                    item.x + Math.sin(time * item.speed + i) * 0.2,
                    item.y + Math.cos(time * item.speed + i) * 0.2,
                    item.z
                );
                dummy.rotation.set(item.curRotX, item.curRotY, 0);
                dummy.scale.set(item.scale, item.scale, item.scale);
                dummy.updateMatrix();
                fgMesh.setMatrixAt(i, dummy.matrix);
            }
            fgMesh.instanceMatrix.needsUpdate = true;

            // Animate floating wireframe prisms
            for (let i = 0; i < fgWireCount; i++) {
                const item = fgWireData[i];
                item.curRotX += item.rotSpeedX;
                item.curRotY += item.rotSpeedY;
                dummy.position.set(
                    item.x + Math.sin(time * item.speed + i) * 0.25,
                    item.y + Math.cos(time * item.speed + i) * 0.25,
                    item.z
                );
                dummy.rotation.set(item.curRotX, item.curRotY, 0);
                dummy.scale.set(item.scale, item.scale, item.scale);
                dummy.updateMatrix();
                fgWireMesh.setMatrixAt(i, dummy.matrix);
            }
            fgWireMesh.instanceMatrix.needsUpdate = true;

            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            updateLayout();
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDalaEngine);
    } else {
        initDalaEngine();
    }
})();
