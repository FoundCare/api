<?php

use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfissionalController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/contatos/{id}', [ContatoController::class, 'show']);
Route::get('teste-teste', [ExampleController::class, 'teste']);

/** ROTAS DOS USUÁRIOS */
// GET - http://127.0.0.1:8000/api/users?page=1
Route::get('/users', [UserController::class, 'index']);

// GET - http://127.0.0.1:8000/api/users/{user}
Route::get('/users/{user}', [UserController::class, 'show']);

// POST - http://127.0.0.1:8000/api/users
Route::post('/users', [UserController::class, 'store']);

// PUT - http://127.0.0.1:8000/api/users/1
Route::patch('/users/{user}', [UserController::class, 'update']);

// DELETE - http://127.0.0.1:8000/api/users/1
Route::delete('/users/{user}', [UserController::class, 'destroy']);

/** ROTAS DO PROFISSIONAL*/

// GET http://127.0.0.1:8000/api/profissionais
Route::get('/profissionais', [ProfissionalController::class, 'index']);

// GET http://127.0.0.1:8000/api/profissionais/{profissional}
Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);

// POST http://127.0.0.1:8000/api/profissionais
Route::post('/profissionais', [ProfissionalController::class, 'store']);

// PATCH http://127.0.0.1:8000/api/profissionais/{profissional}
Route::patch('/profissionais/{profissional}', [ProfissionalController::class, 'update']);

// DELETE http://127.0.0.1:8000/api/profissionais/{profissional}
Route::delete('/profissionais/{profissional}', [ProfissionalController::class, 'destroy']);
