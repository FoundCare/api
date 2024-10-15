<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Especialidade\EspecialidadeRequest;
use App\Http\Requests\Api\Especialidade\EspecialidadeUpdateRequest;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;
use App\Models\Especialidade;
use App\Models\Profissional;

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

    public function update(EspecialidadeUpdateRequest $request, Profissional $profissional, Especialidade $especialidade)
    {
        $data = [
            "especialidade" => $request->get('especialidade'),
            "comprovante" => $request->get('comprovante'),
            "id_profissional" => $profissional->id_profissional
        ];
        return $this->especialidadeService->update($data, $especialidade);
    }

    public function destroy(Profissional $profissional, Especialidade $especialidade)
    {
        return $this->especialidadeService->destroy($especialidade);
    }
}
