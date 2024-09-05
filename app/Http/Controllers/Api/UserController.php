<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserStoreRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Retorna uma lista páginada de usuários
     * 
     * Este método recupera uma lista paginada de usuários do banco de dados
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // Recupera os usuários de forma páginada e ordenados pelo ID
        $user = User::orderBy('id', 'ASC')->paginate(10);

        // Formato da mensagem de resposta
        $data = [
            'status' => true,
            'body' => $user
        ];

        // Retorna a resposta em formato Json
        return $this->sendResponse($data, 200);
    }

    /**
     * Retorna um usuário específico
     * 
     * Este método recupera um usuário específico com base no id
     * 
     * @param User $user - O usuário que será enviado na resposta
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {

        $data = [
            "status" => true,
            "body" => $user
        ];

        return $this->sendResponse($data, 200);
    }

    public function store(UserStoreRequest $request)
    {
        // Iniciar transação
        DB::beginTransaction();

        try{

            
            
            // Cria o usuário no banco de dados
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]);

            // Confirma o cadastro no banco de dados
            DB::commit();

            $data = [
                "status" => true,
                "message" => "Usuário cadastrado com sucesso!",
                "body" => $user
            ];
    
            return $this->sendResponse($data, 201);

        } catch(Exception $e){
            // Operação não concluída com êxito
            DB::rollBack();

            $data = [
                "status" => false,
                "message" => "Usuário não cadastrado!",
                "error" => $e->getMessage()
            ];

            return $this->sendResponse($data, 400);
        }
  
    }

    
}
