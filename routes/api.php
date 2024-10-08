<?php

use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\EnderecoController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfissionalController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

/** ROTAS DOS USUÁRIOS */
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

/**ROTAS DOS PACIENTES */
Route::get("/pacientes", [PacienteController::class, 'index']);
Route::get("/pacientes/{id}", [PacienteController::class, 'show']);
Route::post("/pacientes", [PacienteController::class, 'store']);
Route::patch("/pacientes/{id}", [PacienteController::class, 'update']);
Route::delete("/pacientes/{id}", [PacienteController::class, 'destroy']);

/** ROTAS DO PROFISSIONAL*/
Route::get('/profissionais', [ProfissionalController::class, 'index']);
Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);
Route::post('/profissionais', [ProfissionalController::class, 'store']);
Route::patch('/profissionais/{profissional}', [ProfissionalController::class, 'update']);
Route::delete('/profissionais/{profissional}', [ProfissionalController::class, 'destroy']);

/**ROTAS DE ANUNCIOS */

    Route::get('/anuncios', [AnuncioController::class, 'index'])->name('anuncios.index');
    Route::get('/{id}', [AnuncioController::class, 'show'])->name('anuncios.show');
    Route::post('/', [AnuncioController::class, 'store'])->name('anuncios.store');
    Route::patch('/{id}', [AnuncioController::class, 'update'])->name('anuncios.update');
    Route::delete('/{id}', [AnuncioController::class, 'destroy'])->name('anuncios.destroy');
