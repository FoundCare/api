<?php

/** ROTAS DE COMPETÊNCIA */

use App\Http\Controllers\Api\CompetenciaController;
use Illuminate\Support\Facades\Route;

Route::get('/profissionais/{profissional}/competencia', [CompetenciaController::class, 'show']);
Route::post('/profissionais/{profissional}/competencia', [CompetenciaController::class, 'store']);
Route::patch('/profissionais/{profissional}/competencia/{competencia}', [CompetenciaController::class, 'update']);
Route::delete('/profissionais/{profissional}/competencia/{competencia}', [CompetenciaController::class, 'destroy']);
