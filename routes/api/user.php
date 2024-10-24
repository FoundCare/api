<?php

/** ROTAS DOS USUÁRIOS */

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index')->middleware(['auth:api', 'scope:admin']);
    Route::get('/users/{id}', 'show');
    Route::post('/users', 'store');
    Route::patch('/users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
});
