<?php

/**ROTAS DOS PACIENTES */

use App\Http\Controllers\Api\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get("/pacientes", [PacienteController::class, 'index']);
Route::get("/pacientes/{id}", [PacienteController::class, 'show']);
Route::post("/pacientes", [PacienteController::class, 'store']);
Route::patch("/pacientes/{id}", [PacienteController::class, 'update']);
Route::delete("/pacientes/{id}", [PacienteController::class, 'destroy']);