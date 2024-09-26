<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EnderecoRequest;
use App\Http\Resources\EnderecoResource;
use App\Interfaces\Endereco\EnderecoServiceInterface;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function __construct(
        private EnderecoServiceInterface $enderecoService
    ) {}

    public function show(string $id): EnderecoResource
    {
        return $this->enderecoService->show($id);
    }
}
