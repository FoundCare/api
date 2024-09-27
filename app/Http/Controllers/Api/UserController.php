<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserEditRequest;
use App\Http\Requests\Api\UserStoreRequest;
use App\Interfaces\User\UserServiceInterface;
use App\Models\Contato;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    )
    {

    }
    /**
     * Retorna uma lista páginada de usuários
     *
     * Este método recupera uma lista paginada de usuários do banco de dados
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = User::get();

        $body = [true, "Success", $user];

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
    public function show($id)
    {
        return $this->userService->show($id);
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
        DB::beginTransaction();
        try{

            $user->update([
                "name" => $request->name ? : $user->name,
                "email" => $request->email ? : $user->email,
                "password" => $request->password ? : $user->password
            ]);

            DB::commit();

            $body = [
                true,
                "Usuário editado com sucesso!",
                $user
            ];

            return $this->sendResponse($body, 201);

        } catch(Exception $e){
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
