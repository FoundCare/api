<?php

/** ROTAS DE ESPECIALIDADE */

use App\Http\Controllers\Api\ExperienciaController;
use Illuminate\Support\Facades\Route;

Route::controller(ExperienciaController::class)->middleware('auth:api')->group(function () {
    Route::get('/profissionais/experiencia', 'index');
    Route::get('/profissionais/{id}/experiencia/{experiencia}', 'show');
    Route::post('/profissionais/{profissional}/experiencia', 'store');
    Route::patch('/profissionais/{profissional}/experiencia/{experiencia}', 'update');
    Route::delete('/profissionais/{profissional}/experiencia/{experiencia}', 'destroy');
});
