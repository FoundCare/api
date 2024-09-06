<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// GET - http://127.0.0.1:8000/api/users?page=1
Route::get('/users', [UserController::class, 'index']);

// GET - http://127.0.0.1:8000/api/users/{user}
Route::get('/users/{user}', [UserController::class, 'show']);

// POST - http://127.0.0.1:8000/api/users
Route::post('/users', [UserController::class, 'store']);

// PUT - http://127.0.0.1:8000/api/users/1
Route::put('/users/{user}', [UserController::class, 'update']);

// DELETE - http://127.0.0.1:8000/api/users/1
Route::delete('/users/{user}', [UserController::class, 'destroy']);