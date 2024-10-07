<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function __construct(
        private EspecialidadeServiceInterface $especialidadeService
    ) {}

    public function show($id)
    {
        return $this->especialidadeService->show($id);
    }

    public function store(Request $request)
    {
        return $this->especialidadeService->store($request->only('especialidade', 'comprovante'));
    }
}
