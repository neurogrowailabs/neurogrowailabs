<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/laboratorio', [HomeController::class, 'labs'])->name('labs');
Route::post('/api/diagnostico', [HomeController::class, 'diagnostico'])->name('diagnostico');
