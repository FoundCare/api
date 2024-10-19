<?php

/**ROTAS DOS PACIENTES */

use App\Http\Controllers\Api\PacienteController;
use Illuminate\Support\Facades\Route;

Route::controller(PacienteController::class)->group(function () {
    Route::get("/pacientes", 'index');
    Route::get("/pacientes/{id}", 'show');
    Route::post("/pacientes", 'store');
    Route::patch("/pacientes/{id}", 'update');
    Route::delete("/pacientes/{id}", 'destroy');
});
