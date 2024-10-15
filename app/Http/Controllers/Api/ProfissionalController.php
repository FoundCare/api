<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfissionalEditRequest;
use App\Http\Requests\Api\ProfissionalStoreRequest;
use App\Services\Profissional\ProfissionalService; 
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProfissionalController extends Controller
{
    protected $profissionalService;

    public function __construct(ProfissionalService $profissionalService)
    {
        $this->profissionalService = $profissionalService; // Injeção de dependência
    }

    public function index(): JsonResponse
    {   
        $profissionais = $this->profissionalService->index(); 
        $status = $profissionais->isEmpty() ? Response::HTTP_NOT_FOUND : Response::HTTP_OK;

        $body = [
            'success' => !$profissionais->isEmpty(),
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

    public function store(Request $request): JsonResponse
{
    $validatedData = $request->validate([
        'id_usuario' => 'required|exists:users,id|unique:profissionais,id_usuario',
        'cnpj' => 'nullable|string',
        'razao_social' => 'nullable|string',
        'coren' => 'required|string|unique:profissionais,coren',
    ], [
        'id_usuario.required' => 'O campo id_usuario é obrigatório.',
        'id_usuario.exists' => 'O usuário não existe.',
        'id_usuario.unique' => 'Este usuário já está registrado como profissional.',
        'coren.required' => 'O campo coren é obrigatório.',
        'coren.unique' => 'Este coren já está em uso.',
    ]);

    try {
        $profissional = $this->profissionalService->store($validatedData); 

        return response()->json([
            'success' => true,
            'message' => "Profissional cadastrado com sucesso!",
            'data' => $profissional
        ], Response::HTTP_CREATED);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
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
                'success' => true,
                'message' => "Usuário editado com sucesso!",
                'data' => $profissional
            ];
            $status = Response::HTTP_OK;
        } catch (Exception $e) {
            $body = [
                'success' => false,
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
                'success' => true,
                'message' => "Profissional deletado com sucesso!",
            ];
            $status = Response::HTTP_OK;
        } catch (Exception $e) {
            $body = [
                'success' => false,
                'message' => "Erro ao deletar profissional!",
                'error' => $e->getMessage()
            ];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($body, $status);
    }
}
