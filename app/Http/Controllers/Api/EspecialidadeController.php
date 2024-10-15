<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Especialidade\EspecialidadeRequest;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;

class EspecialidadeController extends Controller
{
    public function __construct(
        private EspecialidadeServiceInterface $especialidadeService
    ) {}

    public function show($id)
    {
        return $this->especialidadeService->show($id);
    }

    public function store(EspecialidadeRequest $request, $id)
    {
        $data = [
            "id_profissional" => $id,
            "especialidade" => $request->get('especialidade'),
            "comprovante" => $request->get('comprovante')
        ];

        return $this->especialidadeService->store($data);
    }
}
