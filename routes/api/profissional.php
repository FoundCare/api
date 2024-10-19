<?php

/** ROTAS DO PROFISSIONAL*/

use App\Http\Controllers\Api\ProfissionalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::controller(ProfissionalController::class)->group(function () {
    Route::get('/profissionais', 'index');
    Route::get('/profissionais/{profissional}', 'show');
    Route::post('/profissionais', 'store');
    Route::put('/profissionais/{profissional}', 'update');
    Route::delete('/profissionais/{profissional}', 'destroy');
});

foreach (File::allFiles(__DIR__ . '/profissional') as $route_file) {
    require $route_file->getPathname();
}
