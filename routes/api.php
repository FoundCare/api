<?php

use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\EnderecoController;
use App\Http\Controllers\Api\EspecialidadeController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfissionalController;
use Illuminate\Support\Facades\Route;

/** ROTAS DOS USUÁRIOS */
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

/** rotas de teste */


/**ROTAS DOS PACIENTES */
Route::get("/pacientes", [PacienteController::class, 'index']);
Route::get("/pacientes/{id}", [PacienteController::class, 'show']);
Route::post("/pacientes", [PacienteController::class, 'store']);
Route::patch("/pacientes/{id}", [PacienteController::class, 'update']);
Route::delete("/pacientes/{id}", [PacienteController::class, 'destroy']);

/** ROTAS DE ESPECIALIDADE */
Route::get('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'show']);
Route::post('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'store']);
Route::patch('/profissionais/{profissional}/especialidade/{especialidade}', [EspecialidadeController::class, 'update']);

/** ROTAS DO PROFISSIONAL*/
Route::get('/profissionais', [ProfissionalController::class, 'index']);
Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);
Route::post('/profissionais', [ProfissionalController::class, 'store']);
Route::put('/profissionais/{profissional}', [ProfissionalController::class, 'update']);
Route::delete('/profissionais/{profissional}', [ProfissionalController::class, 'destroy']);
