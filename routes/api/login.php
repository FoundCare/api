<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->middleware('auth:api')->name('logout');
});
