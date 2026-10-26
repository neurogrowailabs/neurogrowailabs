# BioCoreXStack Software Labs

> Ecosistemas Inteligentes para las Empresas del Mañana.  
> Ingeniería de Software de Alta Precisión, Arquitecturas Cloud Resilientes e Inteligencia Artificial Aplicada.

---

## 🏛️ Visión General

**BioCoreXStack Software Labs** ([@biocorexstack](https://github.com/ricardodevcorex99)) es la plataforma web insignia del laboratorio de ingeniería y diseño tecnológico de BioCoreXStack. Diseñada con una estética oscura cinemática (`#000000`) inspirada en la sobriedad técnica de *Mercury*, *Slash* y *Resend*, la plataforma ofrece una experiencia inmersiva de scrollytelling en tiempo real.

---

## ⚡ Productos del Laboratorio

### 📍 MiVeci — Comercio Hiperlocal (v2.5 en Producción)
- **Concepto:** Plataforma PWA mobile-first que conecta micronegocios y comercios de barrio con vecinos en tiempo real mediante geocercas interactivas, microtiendas ultrarrápidas y pedidos directos a WhatsApp sin comisiones intermediarias.
- **Pipeline de IA:** Doble motor de IA con Google Gemini 3.8 Flash para catalogación y pitches comerciales + CodeFormer vía PyTorch MPS para restauración y super-resolución fotográfica.
- **Arquitectura:** Backend en Laravel 12 (PHP 8.4), base de datos NoSQL en MongoDB Atlas, almacenamiento S3/Cloudflare R2 y blindaje L7 con Cerberus AI.
- **Demo en Producción:** [https://miveci-app.onrender.com](https://miveci-app.onrender.com)

---

## 🛠️ Stack Tecnológico

- **Core & Backend:** PHP 8.4 / Laravel 12
- **Motor de Animaciones:** GSAP 3 & ScrollTrigger (Scrollytelling cinematográfico continuo)
- **Arquitectura de Vistas:** Blade modular bajo la regla de las 1,000 líneas de **Thermos**
- **Sistemas de Filtro & Calidad:** **Anti-slop** (diseño a medida libre de clichés de IA) y **Thermos** (cero código spaghetti y separación limpia de capas)
- **Diagnóstico en Vivo:** Endpoint `/api/diagnostico` con motor de evaluación heurística de arquitectura (`ArchitectureDiagnosticService`)

---

## 🚀 Despliegue Local

```bash
# Instalar dependencias
composer install
npm install

# Servidor de desarrollo
php artisan serve --port=8002
```

---

© 2026 **BioCoreXStack Software Labs**. Todos los derechos reservados.
