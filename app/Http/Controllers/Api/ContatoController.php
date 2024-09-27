<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contato\ContatoRequest;
use App\Interfaces\Contato\ContatoServiceInterface;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function __construct(
        private ContatoServiceInterface $contatoService
    ) {}

    public function show($id)
    {
        return $this->contatoService->show($id);
    }

    public function store(ContatoRequest $request)
    {
        return $this->contatoService->store($request->only('telefone', 'celular'));
    }

    public function update(ContatoRequest $request, $id)
    {
        return $this->contatoService->update($request->only('telefone', 'celular'), $id);
    }

    public function destroy($id)
    {
        return $this->contatoService->destroy($id);
    }
}
