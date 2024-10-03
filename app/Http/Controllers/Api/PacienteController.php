<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Endereco\EnderecoRequest;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Contato\ContatoRequest;
use App\Interfaces\Paciente\PacienteServiceInterface;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteServiceInterface $pacienteService
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
