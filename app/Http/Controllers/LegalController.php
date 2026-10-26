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
            'pageTitle' => 'Términos de Uso y Contrato Marco de Servicios (MSA) — BioCoreXStack Software Labs',
            'legalVersion' => 'v1.0-biocorexstack-2026-10',
            'lastUpdated' => '26 de Octubre de 2026',
        ]);
    }

    /**
     * Renderiza la Política de Privacidad, Confidencialidad (NDA) y Tratamiento de Datos.
     */
    public function privacidad(): View
    {
        return view('legal.privacidad', [
            'pageTitle' => 'Política de Privacidad, Confidencialidad (NDA) y Protección de Datos — BioCoreXStack Software Labs',
            'legalVersion' => 'v1.0-biocorexstack-2026-10',
            'lastUpdated' => '26 de Octubre de 2026',
        ]);
    }

    /**
     * Renderiza la Política y Gestión de Cookies.
     */
    public function cookies(): View
    {
        return view('legal.cookies', [
            'pageTitle' => 'Política y Configuración de Cookies — BioCoreXStack Software Labs',
            'legalVersion' => 'v1.0-biocorexstack-2026-10',
            'lastUpdated' => '26 de Octubre de 2026',
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

        $log = ConsentLog::create([
            'lead_name' => $validated['lead_name'] ?? null,
            'business_name' => $validated['business_name'] ?? null,
            'contact_info' => $validated['contact_info'] ?? null,
            'origin' => $validated['origin'] ?? 'web_diagnostico_ia',
            'ip_address' => $ipAddress ?: '0.0.0.0',
            'user_agent' => substr((string) $request->userAgent(), 0, 500),
            'accepted_terms_msa' => true,
            'accepted_privacy_nda_whatsapp' => true,
            'legal_version' => 'v1.0-biocorexstack-2026-10',
            'timestamp_utc' => now('UTC'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Consentimiento B2B registrado conforme a LOPDP',
            'reference_id' => 'BCXS-LEGAL-' . str_pad((string) $log->id, 6, '0', STR_PAD_LEFT),
            'timestamp_utc' => $log->timestamp_utc->toIso8601String(),
        ], 201);
    }
}
