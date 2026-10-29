<?php

namespace App\Http\Controllers;

use App\Models\ConsentLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LegalController extends Controller
{
    /**
     * Renderiza los Términos de Uso y Contrato Marco de Servicios (MSA).
     */
    public function terminos(): View
    {
        return view('legal.terminos', [
            'pageTitle' => 'Términos de Uso y Contrato Marco de Servicios (MSA) — NeuroGrow AI Labs',
            'legalVersion' => 'v1.0-neurogrowailabs-2026-10',
            'lastUpdated' => '28 de Octubre de 2026',
        ]);
    }

    /**
     * Renderiza la Política de Privacidad, Confidencialidad (NDA) y Tratamiento de Datos.
     */
    public function privacidad(): View
    {
        return view('legal.privacidad', [
            'pageTitle' => 'Política de Privacidad, Confidencialidad (NDA) y Protección de Datos — NeuroGrow AI Labs',
            'legalVersion' => 'v1.0-neurogrowailabs-2026-10',
            'lastUpdated' => '28 de Octubre de 2026',
        ]);
    }

    /**
     * Renderiza la Política y Gestión de Cookies.
     */
    public function cookies(): View
    {
        return view('legal.cookies', [
            'pageTitle' => 'Política y Configuración de Cookies — NeuroGrow AI Labs',
            'legalVersion' => 'v1.0-neurogrowailabs-2026-10',
            'lastUpdated' => '28 de Octubre de 2026',
        ]);
    }

    /**
     * Renderiza el apartado dedicado de Cumplimiento Legal con los 6 módulos y verificación cloud.
     */
    public function compliance(): View
    {
        $whatsappNumber = '593963279376';
        $whatsappGlobal = "https://wa.me/{$whatsappNumber}?text=" . urlencode('Hola NeuroGrow AI Labs, deseo consultar sobre un requerimiento legal o NDA corporativo.');

        return view('legal.compliance', [
            'pageTitle' => 'Gobernanza & Marco de Cumplimiento Legal — NeuroGrow AI Labs',
            'legalVersion' => 'v1.0-neurogrowailabs-2026-10',
            'lastUpdated' => '28 de Octubre de 2026',
            'whatsappGlobal' => $whatsappGlobal,
        ]);
    }

    /**
     * Registro inmutable de trazabilidad de consentimiento legal B2B.
     */
    public function logConsent(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'lead_name' => 'nullable|string|max:120',
            'business_name' => 'nullable|string|max:150',
            'contact_info' => 'nullable|string|max:150',
            'origin' => 'required|string|max:80',
            'accepted_terms_msa' => 'required|boolean|accepted',
            'accepted_privacy_nda_whatsapp' => 'required|boolean|accepted',
        ]);

        $ipAddress = $request->header('X-Forwarded-For') 
            ? trim(explode(',', $request->header('X-Forwarded-For'))[0]) 
            : $request->ip();

        $leadName = isset($validated['lead_name']) ? trim(strip_tags((string) $validated['lead_name'])) : null;
        $businessName = isset($validated['business_name']) ? trim(strip_tags((string) $validated['business_name'])) : null;
        $contactInfo = isset($validated['contact_info']) ? trim(strip_tags((string) $validated['contact_info'])) : null;

        $log = ConsentLog::create([
            'lead_name' => $leadName,
            'business_name' => $businessName,
            'contact_info' => $contactInfo,
            'origin' => $validated['origin'] ?? 'web_diagnostico_ia',
            'ip_address' => $ipAddress ?: '0.0.0.0',
            'user_agent' => substr((string) $request->userAgent(), 0, 500),
            'accepted_terms_msa' => true,
            'accepted_privacy_nda_whatsapp' => true,
            'legal_version' => 'v1.0-neurogrowailabs-2026-10',
            'timestamp_utc' => now('UTC'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Consentimiento B2B registrado conforme a LOPDP',
            'reference_id' => 'NGAI-LEGAL-' . str_pad((string) $log->id, 6, '0', STR_PAD_LEFT),
            'timestamp_utc' => $log->timestamp_utc->toIso8601String(),
        ], 201);
    }
}
