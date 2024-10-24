<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\CheckScopes;
use Laravel\Passport\Http\Middleware\CheckForAnyScope;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function(){
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        },

        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $aliases = [
            'scopes' => CheckScopes::class,
            'scope' => CheckForAnyScope::class
        ];

        $middleware->alias($aliases);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
