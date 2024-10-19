<?php

/** ROTAS DO PROFISSIONAL*/

use App\Http\Controllers\Api\CompetenciaController;
use App\Http\Controllers\Api\EspecialidadeController;
use App\Http\Controllers\Api\ProfissionalController;
use Illuminate\Support\Facades\Route;

Route::get('/profissionais', [ProfissionalController::class, 'index']);
Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);
Route::post('/profissionais', [ProfissionalController::class, 'store']);
Route::put('/profissionais/{profissional}', [ProfissionalController::class, 'update']);
Route::delete('/profissionais/{profissional}', [ProfissionalController::class, 'destroy']);

/** ROTAS DE ESPECIALIDADE */
Route::get('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'show']);
Route::post('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'store']);
Route::patch('/profissionais/{profissional}/especialidade/{especialidade}', [EspecialidadeController::class, 'update']);
Route::delete('/profissionais/{profissional}/especialidade/{especialidade}', [EspecialidadeController::class, 'destroy']);

/** ROTAS DE COMPETÊNCIA */
Route::get('/profissionais/{profissional}/competencia', [CompetenciaController::class, 'show']);
Route::post('/profissionais/{profissional}/competencia', [CompetenciaController::class, 'store']);
Route::patch('/profissionais/{profissional}/competencia/{competencia}', [CompetenciaController::class, 'update']);
Route::delete('/profissionais/{profissional}/competencia/{competencia}', [CompetenciaController::class, 'destroy']);
