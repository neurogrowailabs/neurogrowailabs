<?php

namespace App\Http\Controllers;

use App\Services\ArchitectureDiagnosticService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'BioCoreXStack Software Labs';
        $siteInitials = 'BCXS';
        $pageTitle = 'BioCoreXStack Software Labs — Software, IA & Ciencia de Datos';
        $whatsappNumber = '593983267552';

        $whatsappGlobal = "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, quiero consultar sobre sus servicios de Software, IA y Datos.');
        $whatsappConsultar = "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, quiero consultar sobre un proyecto técnico.');
        $whatsappConversar = "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, quiero conversar sobre una solución técnica para mi empresa.');

        $navLinks = [
            ['href' => '#pipeline', 'label' => 'Pipeline IA & Datos'],
            ['href' => '#finder', 'label' => 'Diagnóstico de Arquitectura'],
            ['href' => '#about', 'label' => 'Metodología DoE'],
            ['href' => '#features', 'label' => 'Servicios'],
            ['href' => '#portfolio', 'label' => 'Ecosistema Labs'],
            ['href' => '#contact', 'label' => 'Contacto'],
        ];

        $pipelineNodes = [
            [
                'step' => '01',
                'type' => 'FRONTEND & APPS',
                'title' => 'Captura Multiplataforma',
                'desc' => 'Interacción fluida desde páginas web, PWAs, aplicaciones móviles y canales de redes sociales en tiempo real.',
                'icon' => 'fa-solid fa-mobile-screen',
                'status' => 'ONLINE · LOW LATENCY',
                'status_color' => '#3ad389',
            ],
            [
                'step' => '02',
                'type' => 'DATA LAYER',
                'title' => 'Motores SQL & NoSQL Cloud',
                'desc' => 'Almacenamiento y sincronización de alta disponibilidad en Firebase, MongoDB, bases SQL y Google Cloud.',
                'icon' => 'fa-solid fa-database',
                'status' => 'SYNCED · SCALABLE',
                'status_color' => '#fd8925',
            ],
            [
                'step' => '03',
                'type' => 'AI CORE',
                'title' => 'Ejecución de IA Certificada',
                'desc' => 'Procesamiento mediante modelos LLM (Google Gemini), agentes autónomos y automatización inteligente de flujos.',
                'icon' => 'fa-solid fa-microchip',
                'status' => 'ACTIVE · AI POWERED',
                'status_color' => '#9281f7',
            ],
            [
                'step' => '04',
                'type' => 'DATA SCIENCE',
                'title' => 'Modelado en RStudio & DoE',
                'desc' => 'Análisis estadístico riguroso, diseño de experimentos y reportes avanzados para optimizar la toma de decisiones.',
                'icon' => 'fa-solid fa-chart-line',
                'status' => 'VALIDATED · DATA DRIVEN',
                'status_color' => '#3ad389',
            ],
        ];

        $partners = [
            'INTELIGENCIA ARTIFICIAL',
            'LARAVEL & FULL-STACK',
            'FIREBASE & MONGODB',
            'GOOGLE CLOUD & SQL',
            'RSTUDIO & ESTADÍSTICA',
            'DISEÑO DE EXPERIMENTOS',
            'PWAS & MOBILE APPS'
        ];

        $databaseValidation = [
            'Desarrollo Web & PWA' => ['Laravel 11', 'PHP 8.4', 'Vue / React', 'APIs RESTful', 'PWA Offline', 'Responsive UI'],
            'Implementación de IA & Gemini' => ['Google Gemini API', 'Agentes Autónomos', 'Automatización de Flujos', 'Visión Artificial', 'Prompt Engineering'],
            'Bases de Datos Cloud' => ['Firebase', 'MongoDB NoSQL', 'PostgreSQL / MySQL', 'Google Cloud Firestore', 'Sincronización en Tiempo Real'],
            'Estadística & DoE en RStudio' => ['RStudio', 'Diseño de Experimentos (DoE)', 'Pruebas de Hipótesis', 'Modelos Predictivos', 'Excel Avanzado / Dashboards'],
            'Gestión Digital & Redes' => ['Analítica de Redes Sociales', 'Optimización de Conversión', 'Automatización de Ventas', 'Growth Basado en Datos'],
        ];

        $services = [
            [
                'badge' => 'FULL-STACK & CLOUD',
                'title' => 'Desarrollo de Páginas Web, Apps & Bases de Datos',
                'checks' => [
                    'Páginas web modernas, PWAs y aplicaciones multiplataforma en Laravel, PHP y tecnologías reactivas.',
                    'Arquitectura de bases de datos relacionales (SQL) y NoSQL (Firebase, MongoDB, Google Cloud).',
                    'Despliegue profesional de aplicaciones en la nube, optimización y conexión con redes sociales.'
                ],
                'cta' => 'Cotizar Desarrollo',
                'cta_link' => "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, me interesa cotizar el Desarrollo de una Página Web, App o Base de Datos.')
            ],
            [
                'badge' => 'CERTIFIED AI',
                'title' => 'Inteligencia Artificial Aplicada & Automatización',
                'checks' => [
                    'Implementación de modelos LLM (Google Gemini con RAG) en entornos transaccionales y de analítica empresarial.',
                    'Agentes autónomos, automatización de atención omnicanal y procesamiento de lenguaje natural en tiempo real.',
                    'Integración de flujos inteligentes con herramientas empresariales, webs y bases de datos en tiempo real.'
                ],
                'cta' => 'Implementar IA',
                'cta_link' => "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, me gustaría implementar Inteligencia Artificial y automatización en mi negocio.')
            ],
            [
                'badge' => 'DATA SCIENCE & BIO-STATS',
                'title' => 'Estadística en RStudio & Diseño de Experimentos',
                'checks' => [
                    'Análisis estadístico avanzado y Diseño de Experimentos (DoE) en RStudio liderado por un Ingeniero Biotecnólogo.',
                    'Modelado de datos, pruebas de hipótesis, optimización de procesos y reportes ejecutivos en Excel y herramientas analíticas.',
                    'Estrategia de crecimiento digital y análisis de métricas para tomar decisiones de negocio basadas en evidencia matemática.'
                ],
                'cta' => 'Analizar mis Datos',
                'cta_link' => "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola BioCoreXStack, necesito una consultoría de Estadística en RStudio y Diseño de Experimentos.')
            ],
        ];

        $steps = [
            [
                'num' => '01 / 03',
                'title' => 'Arquitectura & Diseño de Experimentos',
                'desc' => 'Definimos la estructura de datos (SQL/NoSQL) y aplicamos diseño experimental para validar qué necesita realmente tu negocio.'
            ],
            [
                'num' => '02 / 03',
                'title' => 'Desarrollo Web, Apps & IA Aplicada',
                'desc' => 'Construimos páginas web, PWAs y sistemas a medida integrando modelos de Inteligencia Artificial certificados para automatizar procesos.'
            ],
            [
                'num' => '03 / 03',
                'title' => 'Despliegue Cloud & Analítica en RStudio',
                'desc' => 'Lanzamos tu aplicación en servidores optimizados (Google Cloud / Vercel) y medimos el rendimiento comercial con estadística avanzada y gestión digital.'
            ],
        ];

        return view('home', compact(
            'siteName',
            'siteInitials',
            'pageTitle',
            'whatsappNumber',
            'whatsappGlobal',
            'whatsappConsultar',
            'whatsappConversar',
            'navLinks',
            'partners',
            'databaseValidation',
            'services',
            'steps',
            'pipelineNodes'
        ));
    }

    public function diagnostico(Request $request, ArchitectureDiagnosticService $diagnosticService)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:150',
            'specification' => 'nullable|string|max:500',
        ]);

        $result = $diagnosticService->generate(
            trim($validated['category']),
            trim($validated['specification'] ?? '')
        );

        return response()->json($result);
    }

    public function labs()
    {
        $siteName = 'BioCoreXStack Software Labs';
        $pageTitle = 'BioCoreXStack Software Labs — Laboratorio de IA, Modelos & Ciencia de Datos';

        $labModules = [
            [
                'id' => 'cerberus',
                'title' => 'Cerberus AI Engine & Workflow Suite',
                'badge' => 'CERTIFIED AI / LLMS',
                'desc' => 'Orquestación de modelos de Inteligencia Artificial (Google Gemini), procesamiento en lenguaje natural, agentes autónomos y automatización inteligente de flujos empresariales.',
                'repo' => 'https://github.com/ricardodevcorex99/Cerberus-AI',
                'metrics' => [
                    'Modelo' => 'Google Gemini & LLMs',
                    'Latencia' => '< 140ms inferencia',
                    'Compatibilidad' => 'Laravel 11, APIs, Web & Apps'
                ]
            ],
            [
                'id' => 'vulnerabilities',
                'title' => 'RStudio & Data Science Laboratory',
                'badge' => 'DATA SCIENCE & DoE',
                'desc' => 'Laboratorio de modelado estadístico, Diseño de Experimentos (DoE) y analítica predictiva aplicada al crecimiento digital, validación de hipótesis y optimización matemática de conversiones.',
                'repo' => 'https://github.com/ricardodevcorex99',
                'metrics' => [
                    'Entorno' => 'RStudio & R 4.4 / Excel',
                    'Metodología' => 'DoE Multifactorial & A/B Test',
                    'Enfoque' => 'Toma de Decisiones Basada en Datos'
                ]
            ],
            [
                'id' => 'termux-llama',
                'title' => 'Offline LLMs & Edge Computing',
                'badge' => 'EDGE AI & ARM',
                'desc' => 'Ejecución y despliegue de modelos de lenguaje ligeros en procesadores móviles y servidores locales sin dependencia de servidores externos, garantizando privacidad total y alta eficiencia.',
                'repo' => 'https://github.com/ricardodevcorex99/kali-termux-setup',
                'metrics' => [
                    'Runtime' => 'llama.cpp cuantizado 4-bit',
                    'Ambiente' => 'Localhost / Edge Devices',
                    'Eficiencia' => '100% Inferencia Local'
                ]
            ]
        ];

        return view('labs', compact('siteName', 'pageTitle', 'labModules'));
    }
}
