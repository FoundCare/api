<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserEditRequest;
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
        $user = User::orderBy('id', 'ASC')->get();

        // Formato da mensagem de resposta
        $body = [true, "Success", $user];

        // Retorna a resposta em formato Json
        return $this->sendResponse($body, 200);
    }

    /**
     * Retorna um usuário específico
     * 
     * Este método recupera um usuário específico com base no id
     * 
     * @param App\Models\User;
     * @return \Illuminate\Http\JsonResponse;
     */
    public function show(User $user): JsonResponse
    {
        $body = [
            true, 
            "Success", 
            $user
        ];

        return $this->sendResponse($body, 200);
    }

    /**
     * Este método é responsável por gravar um usuário no banco
     * 
     * @param App\Http\Requests\Api\UserStoreRequest;
     * @return Illuminate\Http\JsonResponse;
     */
    public function store(UserStoreRequest $request): JsonResponse
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

            $body = [
                true, 
                "Usuário cadastrado com sucesso!", 
                $user
            ];
    
            return $this->sendResponse($body, 201);

        } catch(Exception $e){
            // Operação não concluída com êxito
            DB::rollBack();

            $body = [
                true, 
                "Usuário não cadastrado", 
                $user
            ];
    
            return $this->sendResponse($body, 403);
        }
  
    }   

    /**
     * Este método é responsável por editar um usuário existente no banco de dados 
     * 
     * @param UserStoreRequest
     * @param User
     * 
     * @return JsonResponse
     */
    public function update(UserEditRequest $request, User $user): JsonResponse
    {
        // Iniciar transação
        DB::beginTransaction();

        $params = $request->collect();
        try{
            switch($params){
                case isset($params['name'], $params['email'], $params['password']):
                    $user->update([
                        "name" => $request->name,
                        "email" => $request->email,
                        "password" => $request->password
                    ]);
                    break;
                case isset($params['name'], $params['email']):
                    $user->update([
                        "name" => $request->name,
                        "email" => $request->email
                    ]);
                    break;
                case isset($params['name'], $params['password']):
                    $user->update([
                        "name" => $request->name,
                        "password" => $request->password
                    ]);
                    break;
                case isset($params['email'], $params['password']):
                    $user->update([
                        "email" => $request->email,
                        "password" => $request->password
                    ]);
                    break;
                case isset($params['name']):
                    $user->update([
                        "name" => $request->name
                    ]);
                    break;
                case isset($params['email']):
                    $user->update([
                        "email" => $request->email
                    ]);
                    break;
                case isset($params['password']):
                    $user->update([
                        "password" => $request->password
                    ]);
                    break;
                default:

                    $body = [
                        false,
                        "É necessário informar ao menos um parâmetro para edição",
                        null
                    ];

                    return $this->sendResponse($body, 400);
                    
                    break;
                    
            }   
            // Editar o registro no banco
            

            // Commita as alterações concluídas
            DB::commit();

            $body = [
                true,
                "Usuário editado com sucesso!",
                $user
            ];

            return $this->sendResponse($body, 201);

        } catch(Exception $e){

            // Operação não foi concluída
            DB::rollBack();

            $body = [
                false,
                "Usuário não editado",
                $e
            ];

            return $this->sendResponse($body, 400);
        }
    }

    /**
     * Este método faz a exclusão do usuário no banco de dados
     * 
     * @param \App\Models\User
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try{

            $user->delete();

            $data = [
                true,
                "Usuário deletado com sucesso!",
                $user
            ];
            return $this->sendResponse($data, 200);
        }
        catch(Exception $e){

            $data = [
                false,
                "Usuário não deletado!",
                []
            ];
            return $this->sendResponse($data, 200);
        }
    }
    
}
