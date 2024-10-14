<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfissionalEditRequest;
use App\Http\Requests\Api\ProfissionalStoreRequest;
use App\Models\Profissional;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProfissionalController extends Controller
{
    /**
     * Este método está responsável por trazer todos os profissionais, idenpendente do status de validação
     * 
     * @return JsonResponse
     * 
     */
    public function index(): JsonResponse
{   
    $profissionais = Profissional::get();
    $status = 200;

    if (count($profissionais) > 0) {
        $body = [
            'success' => true,
            'message' => "Usuários encontrados",
            'data' => $profissionais
        ];
    } else {
        $body = [
            'success' => false,
            'message' => "Nenhum usuário encontrado",
            'data' => []
        ]; 
        $status = 404;
    }

    return response()->json($body, $status);
}


    /**
     * Este método é responsável por trazer apenas um resultado
     * 
     * @param string $id -> ID do usuário
     * 
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $profissional = Profissional::find($id);
        $status = Response::HTTP_OK;
    
        if (!$profissional) {
            $body = [
                'success' => false,
                'message' => "Não encontrado!",
                'data' => []
            ];
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $body = [
                'success' => true,
                'message' => "Profissional encontrado!",
                'data' => $profissional
            ];
        }
    
        return response()->json($body, $status);
    }
    

    /**
     * Este método é responsável por gravar um profissional no banco
     * 
     * @param App\Http\Requests\Api\ProfissionalStoreRequest;
     * @return Illuminate\Http\JsonResponse;
     */
    public function store(ProfissionalStoreRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $profissional = Profissional::create($request->all());
    
            DB::commit();
    
            $body = [
                'success' => true,
                'message' => "Profissional cadastrado!",
                'data' => $profissional
            ];
            $status = Response::HTTP_CREATED;
    
        } catch (Exception $e) {
            DB::rollBack();
    
            $body = [
                'success' => false,
                'message' => "Profissional não cadastrado",
                'error' => $e->getMessage()
            ];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
    
        return response()->json($body, $status);
    }
    

    /**
     * Este método é responsável por editar um usuário existente no banco de dados 
     * 
     * @param Profissional
     * @param ProfissionalEditRequest
     * 
     * @return JsonResponse
     */
    public function update(ProfissionalEditRequest $request, Profissional $profissional): JsonResponse
{
    DB::beginTransaction();
    try {
        $profissional->update($request->only([
            'name', 'cpf', 'email', 'logradouro', 'bairro', 'cep', 'telefone', 'cnpj'
        ]));

        DB::commit();

        $body = [
            'success' => true,
            'message' => "Usuário editado com sucesso!",
            'data' => $profissional
        ];
        $status = Response::HTTP_OK;

    } catch (Exception $e) {
        DB::rollBack();

        $body = [
            'success' => false,
            'message' => "Usuário não editado",
            'error' => $e->getMessage()
        ];
        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    return response()->json($body, $status);
}


    /**
     * Este método é responsável por aplicar um softDelete no usuário existente no banco de dados
     */
    public function destroy(string $id): JsonResponse
{
    try {
        $profissional = Profissional::find($id);

        if (!$profissional) {
            $body = [
                'success' => false,
                'message' => "Profissional não encontrado!",
                'data' => []
            ];
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $profissional->delete();

            $body = [
                'success' => true,
                'message' => "Profissional deletado com sucesso!",
                'data' => $profissional
            ];
            $status = Response::HTTP_OK;
        }

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
