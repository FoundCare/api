<?php

namespace App\Services\Paciente;

use App\Http\Resources\PacienteResource;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class PacienteService implements PacienteServiceInterface
{
    public function __construct(
        private UserServiceInterface $userService
    )
    {

    }
    public function index()
    {
        try{
            $pacientes = Paciente::
                join("users", "users.id", "=", "pacientes.id_usuario")
                ->join('enderecos', 'users.id_endereco', '=', 'enderecos.id_endereco')
                ->join('contatos', 'users.id_contato', '=', 'contatos.id_contato')
                ->get();

            return response()->json(PacienteResource::collection($pacientes), 200);
        } catch(Exception $e){
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new PacienteResource($data), 404);
        }
    }

    public function show($id)
    {
        try{
            $paciente = Paciente::join("users", "users.id", "=", "pacientes.id_usuario")
                        ->join('enderecos', 'users.id_endereco', '=', 'enderecos.id_endereco')
                        ->join('contatos', 'users.id_contato', '=', 'contatos.id_contato')
                        ->findOrFail($id);

            return response()->json(new PacienteResource($paciente), 200);
        } catch(ModelNotFoundException $e){
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new PacienteResource($data), 404);
        }
    }

    public function store($data)
    {

        $user = $this->userService->store($data);
        try{

        DB::beginTransaction();

        $paciente = Paciente::create([
            "id_usuario" => $user['id']
        ]);

        //$token = $user->createToken('Personal Access Token', ["paciente"])->plainTextToken;

        DB::commit();

        $createdPaciente = Paciente::join("users", "users.id", "=", "pacientes.id_usuario")
                        ->join('enderecos', 'users.id_endereco', '=', 'enderecos.id_endereco')
                        ->join('contatos', 'users.id_contato', '=', 'contatos.id_contato')
                        ->findOrFail($paciente->id_paciente);

        /* Retorne o paciente e o token na resposta
        return response()->json([
            'paciente' => new PacienteResource($createdPaciente),
            'token' => $token, // Inclua o token na resposta
        ], 201);*/

        } catch(Exception $e){
            DB::rollback();
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new PacienteResource($data), 404);
        }
    }

    public function update($data, $id)
    {
        $paciente = $this->userService->update($data, $id);
        return response()->json($paciente, 200);
    }

    public function destroy($id)
    {
        try{
            $paciente = Paciente::findOrFail($id);
            $this->userService->destroy($paciente->id_usuario);
            $paciente->delete();
            $data = [
                "message" => "Usuário deletado com sucesso"
            ];

            return response()->json(new PacienteResource($data), 200);

        } catch(ModelNotFoundException $e){
            $data = [
                'error' => $e->getMessage()
            ];
            return response()->json(new PacienteResource($data), 404);
        } catch(Exception $e){
            $data = [
                'error' => $e->getMessage()
            ];
            return response()->json(new PacienteResource($data), 404);
        }
    }


}
