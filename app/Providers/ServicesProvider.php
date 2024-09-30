<?php

namespace App\Providers;

use App\Interfaces\Contato\ContatoServiceInterface;
use App\Interfaces\Endereco\EnderecoServiceInterface;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Services\Contato\ContatoService;
use App\Services\Endereco\EnderecoService;
use App\Services\Paciente\PacienteService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ContatoServiceInterface::class, ContatoService::class);
        $this->app->bind(EnderecoServiceInterface::class, EnderecoService::class);
        $this->app->bind(PacienteServiceInterface::class, PacienteService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
