<?php

/** ROTAS DE COMPETÊNCIA */

use App\Http\Controllers\Api\CompetenciaController;
use Illuminate\Support\Facades\Route;

Route::controller(CompetenciaController::class)->group(function () {
    Route::get('/profissionais/{profissional}/competencia', 'show');
    Route::post('/profissionais/{profissional}/competencia', 'store');
    Route::patch('/profissionais/{profissional}/competencia/{competencia}', 'update');
    Route::delete('/profissionais/{profissional}/competencia/{competencia}', 'destroy');
});
