<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contato\ContatoEditRequest;
use App\Http\Requests\Api\Contato\ContatoRequest;
use App\Http\Requests\Api\Endereco\EnderecoRequest;
use App\Http\Requests\Api\Endereco\EnderecoUpdateRequest;
use App\Http\Requests\Api\User\UserEditRequest;
use App\Http\Requests\Api\User\UserStoreRequest;
use App\Interfaces\Paciente\PacienteServiceInterface;

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
