@extends('layouts.app')

@section('title', '404 — Ruta No Encontrada | NeuroGrow AI Labs')

@section('content')
<main style="min-height: 80vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px; background-color: var(--bg-principal);">
    <div style="max-width: 580px; text-align: center; background: rgba(18, 14, 28, 0.65); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; padding: 48px 32px; box-shadow: 0 24px 60px rgba(0,0,0,0.8);">
        
        <div style="display: inline-flex; align-items: center; gap: 8px; font-family: var(--font-mono); font-size: 11px; color: var(--color-iris-violet); letter-spacing: 0.12em; text-transform: uppercase; background: rgba(146, 129, 247, 0.1); border: 1px solid rgba(146, 129, 247, 0.25); padding: 5px 14px; border-radius: 20px; margin-bottom: 20px;">
            <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> CÓDIGO 404 · RUTA NO ENCONTRADA
        </div>

        <h1 style="font-family: var(--font-condensed); font-size: clamp(2.4rem, 6vw, 4rem); font-weight: 800; line-height: 0.95; letter-spacing: -0.02em; color: #ffffff; text-transform: uppercase; margin-bottom: 16px;">
            OBJETIVO FUERA DE PARÁMETROS
        </h1>

        <p style="color: var(--color-ash-gray, #9d9797); font-size: 14.5px; line-height: 1.6; margin-bottom: 32px;">
            El endpoint o documento solicitado no está disponible en la topología de nuestro servidor o ha sido reestructurado hacia una ruta segura.
        </p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn-accent" style="padding: 10px 22px; font-size: 12px; gap: 8px;">
                <i class="fa-solid fa-house" aria-hidden="true"></i> Volver al Inicio
            </a>
            <a href="{{ route('legal.compliance') }}" class="btn btn-secondary" style="padding: 10px 20px; font-size: 12px; gap: 8px;">
                <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Cumplimiento Legal
            </a>
        </div>

        <div style="margin-top: 36px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.08); font-family: var(--font-mono); font-size: 10px; color: #6b6974; letter-spacing: 0.05em;">
            NEUROGROW AI LABS · INFRAESTRUCTURA CLOUD SEGURA
        </div>
    </div>
</main>
@endsection
