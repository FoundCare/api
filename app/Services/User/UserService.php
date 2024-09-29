<?php

namespace App\Services\User;

use App\Http\Resources\UserResource;
use App\Interfaces\Contato\ContatoServiceInterface;
use App\Interfaces\Endereco\EnderecoServiceInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function __construct(
        private EnderecoServiceInterface $enderecoService,
        private ContatoServiceInterface $contatoService
    )
    {
        
    }
    public function index()
    {
        return 'FUNFOU';
        // return User::all();
    }
    public function show($id)
    {
        try{
            $usuario = User::findOrFail($id);
            return response()->json(new UserResource($usuario));
        } catch(ModelNotFoundException $e){
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new UserResource($data), 404);
        }
    }
    public function store($data)
    {
        try{
            $enderecoRequest = $data->only('logradouro', 'bairro', 'cep', 'cidade', 'estado');
            $contatoRequest = $data->only('telefone', 'celular');
            $userRequest = $data->only("nome", "email", "data_nasc", "cpf", "senha");

            $endereco = $this->enderecoService->store($enderecoRequest);
            
            $contato = $this->contatoService->store($contatoRequest);

            DB::beginTransaction();

            $user = User::create([
                "nome" => $userRequest['nome'],
                "email" => $userRequest['email'],
                "cpf" => $userRequest['cpf'],
                "data_nasc" => $userRequest['data_nasc'],
                "senha" => Hash::make($userRequest['senha'], ['rounds' => 12]),
                "id_endereco" => $endereco['id_endereco'],
                "id_contato" => $contato['id_contato']
            ]);
            
            DB::commit();

            return response()->json(new UserResource($user));

        } catch(Exception $e){
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new UserResource($data), 404);
        }
        
    }
    public function update($data, $id)
    {

    }
    public function destroy($id)
    {

    }
}
