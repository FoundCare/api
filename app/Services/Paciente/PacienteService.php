<?php

namespace App\Services\Paciente;

use App\Http\Resources\PacienteResource;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PacienteService implements PacienteServiceInterface
{
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
        dd($data);
    }

    public function update($data, $id)
    {
    }

    public function destroy($id)
    {
    }

    
}