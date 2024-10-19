<?php

/** ROTAS DO PROFISSIONAL*/

use App\Http\Controllers\Api\ProfissionalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::controller(ProfissionalController::class)->group(function () {
    Route::get('/profissionais', [ProfissionalController::class, 'index']);
    Route::get('/profissionais/{profissional}', [ProfissionalController::class, 'show']);
    Route::post('/profissionais', [ProfissionalController::class, 'store']);
    Route::put('/profissionais/{profissional}', [ProfissionalController::class, 'update']);
    Route::delete('/profissionais/{profissional}', [ProfissionalController::class, 'destroy']);
});

foreach (File::allFiles(__DIR__ . '/profissional') as $route_file) {
    require $route_file->getPathname();
}
