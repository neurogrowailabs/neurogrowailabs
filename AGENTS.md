# Reglas y Skills del Proyecto (BioCoreXStack / Antigravity / Cursor)

Este proyecto cuenta con **Anti-slop** y **Thermos** instalados tanto a nivel de proyecto como a nivel global.

---

<!-- antislop:start -->
## Anti-slop (Filtro Estético y de Limpieza de IA)

Para cualquier trabajo de diseño de interfaz (UI), redacción de textos (copywriting), diseño accesible o comentarios de código, consultar y respetar las reglas en `.agents/skills/antislop/` o `.cursor/rules/antislop.mdc`:

- **Filtro Core:** `.agents/skills/antislop/SKILL.md`
- **UI / Visual:** `.agents/skills/antislop-ui/SKILL.md`
- **Copywriting y Textos:** `.agents/skills/antislop-copywriting/SKILL.md`
- **Accesibilidad / Experiencia Humana:** `.agents/skills/antislop-human/SKILL.md`
- **Diseño Móvil y Responsive:** `.agents/skills/antislop-layoutmobile/SKILL.md`
- **Comentarios Limpios en Código:** `.agents/skills/antislop-code/SKILL.md`

> **Directriz:** Evitar layouts clichés generados por IA (iconos de brillitos repetitivos, botones idénticos, textos genéricos corporativos o comentarios obvios en el código). El diseño debe sentirse diseñado a medida por un humano.
<!-- antislop:end -->

---

<!-- thermos:start -->
## Thermos (Revisión Termonuclear de Arquitectura y Calidad de Código)

Reglas estrictas de calidad y mantenibilidad:

1. **Regla de las 1,000 líneas:** Ningún archivo debe exceder las 1,000 líneas. Si un archivo crece más allá, se debe descomponer y modularizar en vistas, estado, datos o componentes auxiliares.
2. **Cero Spaghetti / Sin Parches Rápidos:** Quedan prohibidos los `if` aleatorios y condiciones improvisadas esparcidas en medio de funciones existentes. Utilizar adaptadores, envoltorios (wrappers), helpers o state machines dedicados.
3. **Modularidad Arquitectónica:** Separación clara y limpia entre UI, API, Base de Datos y Lógica de Negocio/Auth.
4. **Skills y Agentes de Revisión:**
   - `.agents/skills/thermos/SKILL.md`
   - `.agents/skills/thermo-nuclear-review/SKILL.md`
   - `.agents/skills/thermo-nuclear-code-quality-review/SKILL.md`
<!-- thermos:end -->

---

## Estado Actual del Proyecto (BioCoreXStack Software Labs)

- **Ubicación:** `/Users/ricardo2499/Documents/NeuroGrow AI Labs`
- **Nombre de Marca Unificado:** BioCoreXStack Software Labs (`@biocorexstack` en redes).
- **Estética Global:** Fondo negro profundo (`#000000`), estética técnica oscura inspirada en Mercury / Slash / Resend.
- **Scrollytelling:**
  - Hero layer con geometrías y tipografía editorial en itálicas.
  - Portal layer con la letra "a" distintiva en `SOFTWaRE LABS`.
  - Manifesto layer con 6 palabras clave en morado (`INTELIGENCIA`, `DESARROLLO`, `SISTEMAS`, `DISEÑO`, `ESTADÍSTICA`, `CRECIMIENTO`) con efecto zoom por scroll y tarjetas flotantes de contexto.
- **Pipeline:** Live Workflow Canvas interactivo (`#pipeline`) con contador en tiempo real y marquesina continua de tecnologías.
- **Diagnóstico:** Diagnóstico en vivo (`#finder`) conectado al endpoint `/api/diagnostico` respaldado por `App\Services\ArchitectureDiagnosticService` con generación automática de enlaces para WhatsApp.
- **Portafolio / Ecosistema Labs:** Sección de productos propios (`#portfolio`) presentando a **MiVeci** (PWA hiperlocal con IA y geolocalización) y **RStudio Experimental Lab** (DoE, Bioestadística y analítica de datos).
- **Footer:** Bloque de contacto con sombra tipográfica gigante portal y botones interactivos animados de Uiverse (Instagram, X, LinkedIn, WhatsApp).
- **Arquitectura Blade Modular:** `home.blade.php` orquesta componentes limpios en `resources/views/partials/`:
  - `navbar.blade.php`, `hero-scrollytelling.blade.php`, `pipeline.blade.php`, `finder.blade.php`, `methodology.blade.php`, `services.blade.php`, `portfolio.blade.php`, `footer.blade.php`.
- **Servidor Local:** Ejecutándose en puerto `8002` (`php artisan serve --port=8002`) porque puertos 8000 y 8001 están reservados para `MiVeci`.
- **Restricción de Archivos Temporales:** Las carpetas `.temp-antislop` y `.temp-plugins` están preservadas intencionalmente; NO eliminarlas sin orden explícita del usuario.
