<?php

/** ROTAS DE FORMAÇÃO */

use App\Http\Controllers\Api\FormacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/formacao/profissional/{id}', [FormacaoController::class, 'getByProfissional']);
Route::get('/formacao', [FormacaoController::class, 'index']);
Route::get('/formacao/{id}', [FormacaoController::class, 'show']);
Route::post('/formacao', [FormacaoController::class, 'store']);
Route::put('/formacao/{id}', [FormacaoController::class, 'update']);
Route::delete('/formacao/{id}', [FormacaoController::class, 'destroy']);