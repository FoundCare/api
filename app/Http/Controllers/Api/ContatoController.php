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
}
