<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserEditRequest;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Contato\ContatoRequest;
use App\Http\Requests\Endereco\EnderecoRequest;
use App\Http\Requests\Endereco\EnderecoUpdateRequest;
use App\Interfaces\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function index()
    {
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
    public function store(UserStoreRequest $request, EnderecoRequest $enderecoRequest, ContatoRequest $contatoRequest)
    {
        return $this->userService->store($request);
    }

    /**
     * Este método é responsável por editar um usuário existente no banco de dados
     *
     * @param UserStoreRequest
     * @param User
     *
     * @return JsonResponse
     */
    public function update(UserEditRequest $request, EnderecoUpdateRequest $enderecoRequest, ContatoRequest $contatoRequest, $id)
    {
        return $this->userService->update($request, $id);
    }

    /**
     * Este método faz a exclusão do usuário no banco de dados
     *
     * @param \App\Models\User
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->userService->destroy($id);
    }

}
