<?php

namespace App\Services\Especialidade;

use App\Http\Resources\EnderecoResource;
use App\Http\Resources\EspecialidadeResource;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;
use App\Models\Especialidade;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class EspecialidadeService implements EspecialidadeServiceInterface
{
    public function index() {}

    public function show($id)
    {
        try {
            $especialidade = Especialidade::get()->where("id_profissional", $id);

            return new EspecialidadeResource($especialidade);
        } catch (ModelNotFoundException $e) {
            $data = [
                "error" => $e->getMessage()
            ];
            throw new ModelNotFoundException($data['error']);
        }
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $especialidade = Especialidade::create([
                "id_profissional" => $data["id_profissional"],
                "especialidade" => $data["especialidade"],
                "comprovante" => $data["comprovante"]
            ]);
            DB::commit();

            $body = [
                "status" => true,
                "message" => "Especialidade cadastrada com sucesso!",
                "data" => $especialidade
            ];

            return response()->json(new EnderecoResource($body), 201);
        } catch (Exception $e) {
            DB::rollBack();
            $body = [
                "status" => false,
                "message" => [
                    "error" => $e->getMessage()
                ]
            ];
            return response()->json($body, 404);
        }
    }

    public function update($data, $especialidade)
    {
        if ($data['id_profissional'] !== $especialidade->id_profissional) {

            $body = [
                "status" => false,
                "message" => [
                    "error" => "Operação não permitida para esse usuário"
                ]
            ];

            return response()->json($body, 403);
        }

        try {

            $especialidade->update([
                "especialidade" => $data['especialidade'],
                "comprovante" => $data['comprovante']
            ]);

            $body = [
                "status" => true,
                "message" => "Especialidade editada com sucesso!",
                "data" => $especialidade
            ];

            return response()->json($body, 200);
        } catch (Exception $e) {
            $body = [
                'status' => false,
                "message" => [
                    "error" => $e->getMessage()
                ]
            ];

            return response()->json(new EspecialidadeResource($body), 404);
        }
    }

    public function destroy($especialidade)
    {
        try {
            
            $especialidade->delete();

            $body = [
                "status" => true,
                "message" => "Especialidade deletada com sucesso!"
            ];
            return response()->json($body, 200);
        } catch (Exception $e) {
            $body = [
                "status" => false,
                "message" => [
                    "error" => $e->getMessage()
                ]
            ];

            return response()->json($body, 500);
        }
    }
}
