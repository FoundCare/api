<?php

namespace App\Services\Experiencia;

use App\Http\Resources\EnderecoResource;
use App\Interfaces\Experiencia\ExperienciaInterfaceService;
use App\Models\Experiencia;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExperienciaService implements ExperienciaInterfaceService
{
    public function index()
    {
        return Experiencia::all();
    }

    public function show($id)
    {
        try {
            $experiencias = Experiencia::where('id_profissional', $id)->get();
            
            $data = [
                "status" => true,
                'data' => $experiencias
            ];
            return response()->json(new EnderecoResource($data), 200);

        } catch(ModelNotFoundException $e){
            $data = [
                "status" => false,
                "message" => "Usuário não possui experiências cadastradas",
                "data" => $e->getMessage()
            ];

            return response()->json(new EnderecoResource($data), 404);
        } catch(Exception $e){
            $data = [
                "status" => false,
                "message" => "Erro no servidor",
                "data" => $e->getMessage()
            ];

            return response()->json(new EnderecoResource($data), 500);
        } 
    }

    public function store($data)
    {}

    public function update($data, $id)
    {

    }

    public function destroy($id)
    {
        try {
            $experiencia = Experiencia::findOrFail($id);

            $experiencia->delete();

            $data = [
                'status' => true,
                'message' => "Experiencia cadastrada com sucesso!"
            ];
            return response()->json(new EnderecoResource($data), 200);
        } catch(ModelNotFoundException $e){
            $data = [
                "status" => false,
                "message" => "Usuário não possui experiências cadastradas",
                "data" => $e->getMessage()
            ];

            return response()->json(new EnderecoResource($data), 404);
        } catch(Exception $e){
            $data = [
                "status" => false,
                "message" => "Erro no servidor",
                "data" => $e->getMessage()
            ];

            return response()->json(new EnderecoResource($data), 500);
        } 
    }
}