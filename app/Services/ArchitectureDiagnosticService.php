<?php

namespace App\Services;

class ArchitectureDiagnosticService
{
    /**
     * Catálogo técnico de arquetipos de ingeniería de software, IA y análisis estadístico.
     */
    private const ARCHETYPES = [
        'web_pwa' => [
            'keywords' => ['web', 'pwa', 'app', 'aplicacion', 'frontend', 'movil'],
            'architecture' => 'Plataforma Web Progresiva (PWA) desarrollada en Laravel 11 + PHP 8.4, interfaz reactiva ultrarrápida, base de datos híbrida en Firebase / PostgreSQL y despliegue Cloud.',
            'ai_module' => 'Google Gemini 1.5 para catalogación inteligente de inventarios, visión computacional asistida y bot conversacional en tiempo real.',
            'data_validation' => 'Modelado analítico de conversión, A/B Testing multifactorial y métricas de retención de usuarios para maximizar ventas.',
        ],
        'ai_gemini' => [
            'keywords' => ['ia', 'gemini', 'inteligencia', 'llm', 'modelo', 'agente', 'bot'],
            'architecture' => 'Microservicios Cloud con orquestación de agentes inteligentes, conexión segura vía APIs RESTful a bases de datos relacionales y NoSQL.',
            'ai_module' => 'Modelos Google Gemini con RAG (Retrieval-Augmented Generation), control estricto de prompts, agentes autónomos y automatización de flujos operativos.',
            'data_validation' => 'Métricas de precisión y latencia de inferencia en milisegundos, con trazabilidad estadística del impacto comercial y ahorro de tiempo.',
        ],
        'database_cloud' => [
            'keywords' => ['base', 'datos', 'sql', 'cloud', 'postgres', 'mysql', 'firebase', 'mongo'],
            'architecture' => 'Arquitectura de datos dual: motor relacional SQL (MySQL/PostgreSQL) para transacciones críticas + NoSQL (Firebase/MongoDB) para sincronización móvil instantánea.',
            'ai_module' => 'Agente inteligente para consultas en lenguaje natural sobre bases de datos empresariales y sanitización automática de datos.',
            'data_validation' => 'Auditoría de integridad referencial, respaldo redundante en Google Cloud y análisis estadístico de cargas de consulta.',
        ],
        'statistics_doe' => [
            'keywords' => ['estadística', 'estadistica', 'rstudio', 'doe', 'experimento', 'biotec', 'analitica'],
            'architecture' => 'Pipeline de ingesta y procesamiento de datos conectado a entornos de cómputo en RStudio, scripts reproducibles en R y dashboards ejecutivos.',
            'ai_module' => 'Modelos de clasificación predictiva complementados con LLMs para generación de resúmenes analíticos en lenguaje de negocio.',
            'data_validation' => 'Diseño de Experimentos (DoE) multifactorial, pruebas de hipótesis (ANOVA, regresión logística) y cálculo de significancia estadística real.',
        ],
        'default' => [
            'keywords' => [],
            'architecture' => 'Ecosistema a medida con backend en Laravel 11, APIs RESTful escalables, bases de datos en Google Cloud y frontend responsive de alto impacto.',
            'ai_module' => 'Automatización con Google Gemini API y asistentes conversacionales integrados a WhatsApp y plataformas web.',
            'data_validation' => 'Análisis de datos en RStudio y Excel avanzado para validar la rentabilidad comercial y rendimiento del sistema.',
        ],
    ];

    /**
     * Genera la recomendación técnica de arquitectura, módulo de IA y validación estadística.
     *
     * @param string $category
     * @param string $specification
     * @return array<string, mixed>
     */
    public function generate(string $category, string $specification = ''): array
    {
        $cleanCategory = mb_substr(trim(strip_tags($category)), 0, 150);
        $cleanSpecification = mb_substr(trim(strip_tags($specification)), 0, 500);
        $catLower = mb_strtolower($cleanCategory);

        $selectedArchetype = $this->resolveArchetype($catLower);

        $specText = !empty($cleanSpecification) ? $cleanSpecification : 'Evaluación general del proyecto';
        $whatsappNumber = env('WHATSAPP_NUMBER', '593987654321');

        $waMessage = "Hola BioCoreXStack, realicé un Diagnóstico Técnico en su web:\n\n"
            . "📌 *Área / Enfoque:* {$cleanCategory}\n"
            . "📝 *Idea de Proyecto:* {$specText}\n\n"
            . "⚙️ *Arquitectura Sugerida:* {$selectedArchetype['architecture']}\n\n"
            . "🤖 *Módulo IA:* {$selectedArchetype['ai_module']}\n\n"
            . "📊 *Validación de Datos:* {$selectedArchetype['data_validation']}\n\n"
            . "Deseo cotizar y poner en marcha este desarrollo con un Ingeniero.";

        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . rawurlencode($waMessage);

        return [
            'status' => 'success',
            'category' => $cleanCategory,
            'specification' => $cleanSpecification,
            'architecture' => $selectedArchetype['architecture'],
            'ai_module' => $selectedArchetype['ai_module'],
            'data_validation' => $selectedArchetype['data_validation'],
            'whatsapp_url' => $whatsappUrl,
        ];
    }

    /**
     * Resuelve el arquetipo técnico emparejando palabras clave sin control de flujo desordenado.
     *
     * @param string $query
     * @return array<string, mixed>
     */
    private function resolveArchetype(string $query): array
    {
        foreach (self::ARCHETYPES as $key => $archetype) {
            if ($key === 'default') {
                continue;
            }
            foreach ($archetype['keywords'] as $keyword) {
                if (str_contains($query, $keyword)) {
                    return $archetype;
                }
            }
        }

        return self::ARCHETYPES['default'];
    }
}
