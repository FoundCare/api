<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('anuncios', AnuncioController::class);
});
