<?php

namespace App\Providers;

use App\Interfaces\Competencia\CompetenciaInterfaceService;
use App\Interfaces\Contato\ContatoServiceInterface;
use App\Interfaces\Endereco\EnderecoServiceInterface;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;
use App\Interfaces\Formacao\FormacaoServiceInterface;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Interfaces\Profissional\ProfissionalServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Services\Competencia\CompetenciaService;
use App\Services\Contato\ContatoService;
use App\Services\Endereco\EnderecoService;
use App\Services\Especialidade\EspecialidadeService;
use App\Services\Formacao\FormacaoService;
use App\Services\Paciente\PacienteService;
use App\Services\Profissional\ProfissionalService;
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
        $this->app->bind(ProfissionalServiceInterface::class, ProfissionalService::class);
        $this->app->bind(PacienteServiceInterface::class, PacienteService::class);
        $this->app->bind(FormacaoServiceInterface::class, FormacaoService::class);
        $this->app->bind(EspecialidadeServiceInterface::class, EspecialidadeService::class);
        $this->app->bind(CompetenciaInterfaceService::class, CompetenciaService::class);
        $this->app->bind(FormacaoServiceInterface::class, FormacaoService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
