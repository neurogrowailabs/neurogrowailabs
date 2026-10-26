<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use Illuminate\Support\Facades\Route;

// Páginas Principales
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/laboratorio', [HomeController::class, 'labs'])->name('labs');

// Páginas de Cumplimiento Legal (LOPDP Ecuador / MSA)
Route::get('/cumplimiento-legal', [LegalController::class, 'compliance'])->name('legal.compliance');
Route::redirect('/cumplimiento', '/cumplimiento-legal');
Route::redirect('/compliance', '/cumplimiento-legal');
Route::redirect('/legal', '/cumplimiento-legal');
Route::get('/terminos-msa', [LegalController::class, 'terminos'])->name('legal.terminos');
Route::get('/privacidad', [LegalController::class, 'privacidad'])->name('legal.privacidad');
Route::get('/cookies', [LegalController::class, 'cookies'])->name('legal.cookies');

// Endpoints API con Rate Limiting Estricto Anti-Abuso
Route::middleware('throttle:15,1')->group(function () {
    Route::post('/api/diagnostico', [HomeController::class, 'diagnostico'])->name('diagnostico');
    Route::post('/api/consent-log', [LegalController::class, 'logConsent'])->name('api.consent-log');
});
