<?php

/** ROTAS DE ESPECIALIDADE */

use App\Http\Controllers\Api\ExperienciaController;
use Illuminate\Support\Facades\Route;

Route::controller(ExperienciaController::class)->group(function () {
    Route::get('/profissionais/experiencia', 'index');
    Route::get('/profissionais/{id}/experiencia', 'show');
    Route::post('/profissionais/{id}/experiencia', 'store');
    Route::patch('/profissionais/{profissional}/experiencia/{experiencia}', 'update');
    Route::delete('/profissionais/experiencia/{experiencia}', 'destroy');
});
