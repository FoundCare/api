<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserEditRequest;
use App\Http\Requests\Endereco\EnderecoRequest;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Contato\ContatoEditRequest;
use App\Http\Requests\Endereco\EnderecoUpdateRequest;
use App\Http\Resources\PacienteResource;
use App\Interfaces\Paciente\PacienteServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteServiceInterface $pacienteService,
        private UserServiceInterface $userService
    )
    {
        
    }

    public function index()
    {
        return $this->pacienteService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UserStoreRequest $userStoreRequest, ContatoRequest $contatoRequest, EnderecoRequest $enderecoRequest)
    {
        return $this->pacienteService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->pacienteService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, EnderecoUpdateRequest $enderecoRequest, ContatoEditRequest $contatoRequest, string $id)
    {
        return $this->pacienteService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
