<?php

/** ROTAS DE ESPECIALIDADE */

use App\Http\Controllers\Api\EspecialidadeController;
use Illuminate\Support\Facades\Route;

Route::controller(EspecialidadeController::class)->group(function () {
    Route::get('/profissionais/{id}/especialidade', 'show');
    Route::post('/profissionais/{id}/especialidade', 'store');
    Route::patch('/profissionais/{profissional}/especialidade/{especialidade}', 'update');
    Route::delete('/profissionais/{profissional}/especialidade/{especialidade}', 'destroy');
});
