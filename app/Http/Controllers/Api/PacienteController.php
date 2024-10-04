<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserEditRequest;
use App\Http\Requests\Endereco\EnderecoRequest;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Contato\ContatoEditRequest;
use App\Http\Requests\Contato\ContatoRequest;
use App\Http\Requests\Endereco\EnderecoUpdateRequest;
use App\Http\Resources\PacienteResource;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteServiceInterface $pacienteService,
    )
    {
        
    }

    public function index()
    {
        return $this->pacienteService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UserStoreRequest $userStoreRequest, ContatoRequest $contatoRequest, EnderecoRequest $enderecoRequest)
    {
        return $this->pacienteService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->pacienteService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, EnderecoUpdateRequest $enderecoRequest, ContatoEditRequest $contatoRequest, string $id)
    {
        return $this->pacienteService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->pacienteService->destroy($id);
    }
}
