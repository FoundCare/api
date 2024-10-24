<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use App\Models\OAuth\AuthCode;
use App\Models\OAuth\Client;
use App\Models\OAuth\PersonalAccessClient;
use App\Models\OAuth\RefreshToken;
use App\Models\OAuth\Token;

class AppServiceProvider extends ServiceProvider
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
        Passport::tokensCan([
            'paciente' => "Access Paciente routes",
            'profissional' => "Access Profissional Routes",
            'admin' => "Access All Routes"
        ]);
        
        Passport::tokensExpireIn(Carbon::now()->addDays(1));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonths(6));

        Passport::useTokenModel(Token::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::useClientModel(Client::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }
}
