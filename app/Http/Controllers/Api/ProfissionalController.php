<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contato\ContatoRequest;
use App\Http\Requests\Api\Endereco\EnderecoRequest;
use App\Http\Requests\Api\Profissional\ProfissionalEditRequest;
use App\Http\Requests\Api\Profissional\ProfissionalStoreRequest;
use App\Http\Requests\Api\User\UserStoreRequest;
use App\Interfaces\User\UserServiceInterface;
use App\Services\Profissional\ProfissionalService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProfissionalController extends Controller
{
    protected $profissionalService;

    public function __construct(
        ProfissionalService $profissionalService,
        private UserServiceInterface $userService
    ) {
        $this->profissionalService = $profissionalService; // Injeção de dependência
    }

    public function index(): JsonResponse
    {
        $profissionais = $this->profissionalService->index();
        $status = $profissionais->isEmpty() ? Response::HTTP_NOT_FOUND : Response::HTTP_OK;

        $body = [
            'status' => !$profissionais->isEmpty(),
            'message' => $profissionais->isEmpty() ? "Nenhum usuário encontrado" : "Usuários encontrados",
            'data' => $profissionais
        ];

        return response()->json($body, $status);
    }

    public function show(string $id): JsonResponse
    {
        try {
            $profissional = $this->profissionalService->show($id);

            $body = [
                'success' => true,
                'message' => "Profissional encontrado!",
                'data' => $profissional
            ];
            $status = Response::HTTP_OK;
        } catch (Exception $e) {
            $body = [
                'success' => false,
                'message' => "Não encontrado!",
                'data' => []
            ];
            $status = Response::HTTP_NOT_FOUND;
        }

        return response()->json($body, $status);
    }

    public function store(UserStoreRequest $request, ContatoRequest $contatoRequest, EnderecoRequest $enderecoRequest, ProfissionalStoreRequest $profissionalRequest): JsonResponse
    {

        $user = $this->userService->store($request);
        try {

            $data = [
                "id" => $user["id"],
                "cnpj" => $request->get('cnpj'),
                "razao_social" => $request->get("razao_social")
            ];

            $this->profissionalService->store($data);

            $token = $user->createToken("Personal Access Token", ['profissional']);

            $data = [
                'status' => true,
                'message' => "Profissional cadastrado com sucesso!",
                'data' => [
                    "user_id" => $token->token->user_id,
                    "accessToken" => $token->accessToken,
                    "scopes" => $token->token['scopes']
                ]
            ];

            return response()->json($data, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Erro ao cadastrar o profissional.",
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ProfissionalEditRequest $request, string $id): JsonResponse
    {
        try {
            $profissional = $this->profissionalService->update($request, $id);

            $body = [
                'status' => true,
                'message' => "Usuário editado com sucesso!",
                'data' => $profissional
            ];
            $status = Response::HTTP_OK;
        } catch (Exception $e) {
            $body = [
                'status' => false,
                'message' => "Usuário não editado",
                'error' => $e->getMessage()
            ];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($body, $status);
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $this->profissionalService->destroy($id);

            $body = [
                'status' => true,
                'message' => "Profissional deletado com sucesso!",
            ];
            $status = Response::HTTP_OK;
        } catch (Exception $e) {
            $body = [
                'status' => false,
                'message' => "Erro ao deletar profissional!",
                'error' => $e->getMessage()
            ];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($body, $status);
    }
}
