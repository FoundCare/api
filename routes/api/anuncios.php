<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;

Route::controller(AnuncioController::class)->group(function (){


    Route::get('anuncios', 'index');
    Route::get('anuncios/profissional/{id_profissional}', [AnuncioController::class, 'getByProfissional']);
    Route::get('anuncios/{id_anuncios}', [AnuncioController::class, 'show']); // Buscar por ID
    Route::put('anuncios/{id}', [AnuncioController::class, 'update']); // Atualizar
    Route::delete('anuncios/{id}', [AnuncioController::class, 'destroy']); // Excluir

});
