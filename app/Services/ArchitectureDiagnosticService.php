<?php

namespace App\Services;

class ArchitectureDiagnosticService
{
    /**
     * Generate architecture, AI, and data validation recommendations based on area/category.
     *
     * @param string $category
     * @param string $specification
     * @return array
     */
    public function generate(string $category, string $specification = ''): array
    {
        $catLower = mb_strtolower($category);

        if (str_contains($catLower, 'web') || str_contains($catLower, 'pwa') || str_contains($catLower, 'app')) {
            $architecture = 'Plataforma Web Progresiva (PWA) desarrollada en Laravel 11 + PHP 8.4, interfaz reactiva ultrarrápida, base de datos híbrida en Firebase / PostgreSQL y despliegue Cloud.';
            $aiModule = 'Google Gemini 1.5 para catalogación inteligente de inventarios, visión computacional asistida y bot conversacional en tiempo real.';
            $dataValidation = 'Modelado analítico de conversión, A/B Testing multifactorial y métricas de retención de usuarios para maximizar ventas.';
        } elseif (str_contains($catLower, 'ia') || str_contains($catLower, 'gemini') || str_contains($catLower, 'inteligencia')) {
            $architecture = 'Microservicios Cloud con orquestación de agentes inteligentes, conexión segura vía APIs RESTful a bases de datos relacionales y NoSQL.';
            $aiModule = 'Modelos Google Gemini con RAG (Retrieval-Augmented Generation), control estricto de prompts, agentes autónomos y automatización de flujos operativos.';
            $dataValidation = 'Métricas de precisión y latencia de inferencia en milisegundos, con trazabilidad estadística del impacto comercial y ahorro de tiempo.';
        } elseif (str_contains($catLower, 'base') || str_contains($catLower, 'datos') || str_contains($catLower, 'sql') || str_contains($catLower, 'cloud')) {
            $architecture = 'Arquitectura de datos dual: motor relacional SQL (MySQL/PostgreSQL) para transacciones críticas + NoSQL (Firebase/MongoDB) para sincronización móvil instantánea.';
            $aiModule = 'Agente inteligente para consultas en lenguaje natural sobre bases de datos empresariales y sanitización automática de datos.';
            $dataValidation = 'Auditoría de integridad referencial, respaldo redundante en Google Cloud y análisis estadístico de cargas de consulta.';
        } elseif (str_contains($catLower, 'estadística') || str_contains($catLower, 'rstudio') || str_contains($catLower, 'doe') || str_contains($catLower, 'experimento')) {
            $architecture = 'Pipeline de ingesta y procesamiento de datos conectado a entornos de cómputo en RStudio, scripts reproducibles en R y dashboards ejecutivos.';
            $aiModule = 'Modelos de clasificación predictiva complementados con LLMs para generación de resúmenes analíticos en lenguaje de negocio.';
            $dataValidation = 'Diseño de Experimentos (DoE) multifactorial, pruebas de hipótesis (ANOVA, regresión logística) y cálculo de significancia estadística real.';
        } else {
            $architecture = 'Ecosistema a medida con backend en Laravel 11, APIs RESTful escalables, bases de datos en Google Cloud y frontend responsive de alto impacto.';
            $aiModule = 'Automatización con Google Gemini API y asistentes conversacionales integrados a WhatsApp y plataformas web.';
            $dataValidation = 'Análisis de datos en RStudio y Excel avanzado para validar la rentabilidad comercial y rendimiento del sistema.';
        }

        $whatsappNumber = env('WHATSAPP_NUMBER', '593987654321');
        $specText = !empty($specification) ? $specification : 'Evaluación general del proyecto';
        $waMessage = "Hola BioCoreXStack, realicé un Diagnóstico Técnico en su web:\n\n"
            . "📌 *Área / Enfoque:* {$category}\n"
            . "📝 *Idea de Proyecto:* {$specText}\n\n"
            . "⚙️ *Arquitectura Sugerida:* {$architecture}\n\n"
            . "🤖 *Módulo IA:* {$aiModule}\n\n"
            . "📊 *Validación de Datos:* {$dataValidation}\n\n"
            . "Deseo cotizar y poner en marcha este desarrollo con un Ingeniero.";

        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($waMessage);

        return [
            'status' => 'success',
            'category' => $category,
            'specification' => $specification,
            'architecture' => $architecture,
            'ai_module' => $aiModule,
            'data_validation' => $dataValidation,
            'whatsapp_url' => $whatsappUrl
        ];
    }
}
