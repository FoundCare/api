<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
        Passport::hashClientSecrets();
        Passport::tokensExpireIn(Carbon::now()->addDays(2));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(1));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addDays(1));
    }
}
