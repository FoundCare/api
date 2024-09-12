<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfissionalController;
use App\Http\Controllers\TokenController;
use App\Http\Middleware\CheckContentType;
use Illuminate\Support\Facades\Route;


Route::middleware([CheckContentType::class])->group(function () {

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

    // GET http://127.0.0.1:8000/api/profissionais
    Route::get('/profissionais', [ProfissionalController::class, 'index']);

    // GET http://127.0.0.1:8000/api/profissionais/{profissional}
    Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);

    // GET http://127.0.0.1:8000/api/profissionais/{profissional}
    Route::post('/profissionais', [ProfissionalController::class, 'store']);
});
