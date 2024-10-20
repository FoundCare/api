<?php

/** ROTAS DO PROFISSIONAL*/

use App\Http\Controllers\Api\ProfissionalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::controller(ProfissionalController::class)->group(function () {
    Route::get('/profissionais', 'index');
    Route::get('/profissionais/{profissional}', 'show')->middleware('auth:api');
    Route::post('/profissionais', 'store')->middleware('auth:api');
    Route::put('/profissionais/{profissional}', 'update')->middleware('auth:api');
    Route::delete('/profissionais/{profissional}', 'destroy')->middleware('auth:api');
});

foreach (File::allFiles(__DIR__ . '/profissional') as $route_file) {
    require $route_file->getPathname();
}
