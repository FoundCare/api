<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Competencia\CompetenciaRequest;
use App\Interfaces\Competencia\CompetenciaInterfaceService;
use App\Models\Competencias;
use App\Models\Profissional;

class CompetenciaController extends Controller
{
    public function __construct(
        private CompetenciaInterfaceService $competenciaService
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->competenciaService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenciaRequest $request, Profissional $profissional)
    {
        $data = [
            "competencia" => $request->get('competencia'),
            "id_profissional" => $profissional->id_profissional
        ];
        return $this->competenciaService->store($data);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Profissional $profissional)
    {
        return $this->competenciaService->show($profissional->id_profissional);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenciaRequest $request, Profissional $profissional, Competencias $competencia)
    {
        $data = [
            "competencia" => $request->get('competencia'),
            "id_profissional" => $profissional->id_profissional
        ];
        return $this->competenciaService->update($data, $competencia);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profissional $profissional, Competencias $competencia)
    {
        if($profissional->id_profissional !== $competencia->id_profissional){
            $data = [
                "status" => false,
                "message" => [
                    "error" => "Seu usuário não pode realizar essa requisição"
                ]
            ];
            return response()->json($data, 401);
        }
        return $this->competenciaService->destroy($competencia->id_competencia);
    }
}
