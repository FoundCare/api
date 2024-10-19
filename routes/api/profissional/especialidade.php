<?php
/** ROTAS DE ESPECIALIDADE */

use App\Http\Controllers\Api\EspecialidadeController;
use Illuminate\Support\Facades\Route;

Route::get('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'show']);
Route::post('/profissionais/{id}/especialidade', [EspecialidadeController::class, 'store']);
Route::patch('/profissionais/{profissional}/especialidade/{especialidade}', [EspecialidadeController::class, 'update']);
Route::delete('/profissionais/{profissional}/especialidade/{especialidade}', [EspecialidadeController::class, 'destroy']);