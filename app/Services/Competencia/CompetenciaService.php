<?php

namespace App\Services\Competencia;

use App\Http\Resources\CompetenciaResource;
use App\Interfaces\Competencia\CompetenciaInterfaceService;
use App\Models\Competencias;
use Exception;

class CompetenciaService implements CompetenciaInterfaceService
{
    public function index()
    {

    }

    public function show($id)
    {
        try{
            $competencia = Competencias::get()->where('id_profissional', $id);

            $data = [
                "status" => true,
                "message" => "Competências encontradas",
                "data" => $competencia
            ];

            return response()->json(new CompetenciaResource($data), 200);

        } catch(Exception $e){
            $data = [
                'status' => false,
                'message' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response()->json(new CompetenciaResource($data), 404);
        }
    }

    public function store($data)
    {

    }

    public function update($data, $id)
    {

    }

    public function destroy($id)
    {

    }
}
