<?php

namespace App\Services\Competencia;

use App\Http\Resources\CompetenciaResource;
use App\Interfaces\Competencia\CompetenciaInterfaceService;
use App\Models\Competencias;
use Exception;
use Illuminate\Support\Facades\DB;

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
        try{
            DB::beginTransaction();
            $competencia = Competencias::create([
                "competencia" => $data['competencia'], 
                "id_profissional" => $data['id_profissional']
            ]);
            DB::commit();
            $data = [
                "status" => true,
                "message" => "Competência cadastrada!"
            ];
            return response()->json(new CompetenciaResource($data), 201);

        } catch(Exception $e){
            $data = [
                "status" => false,
                "message" => [
                    'error' => $e->getMessage()
                ]
            ];
            return response()->json(new CompetenciaResource($data), 404);
        }
    }

    public function update($data, $competencia) 
    {
        $competencia->update([
            "competencia" => $data['competencia']
        ]);

        $data = [
            "status" => true,
            "message" => "Competência editada com sucesso!"
        ];
        return response()->json(new CompetenciaResource($data), 200);
    }

    public function destroy($competencia)
    {
    
    }
}
