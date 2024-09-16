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
        $profissional = Profissional::get();
        $status = 200;

        if(count($profissional) > 0){
            $body = [
                true,
                "Usuários encontrados",
                $profissional
            ];
        } else {
            $body = [
                true,
                "Nenhum usuário encontrado",
                array()
            ]; 
            $status = 404;
        }

        return $this->sendResponse($body, $status);
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
        $profissional = Profissional::where('id', $id)->get();
        $status = Response::HTTP_FOUND;

        if(count($profissional) <= 0){
            $body = [
                false,
                "Não encontrado!",
                []
            ];
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $body = [
                true,
                "Profissional encontrado!",
                $profissional
            ];
        }

        return $this->sendResponse($body, $status);
    }

    /**
     * Este método é responsável por gravar um profissional no banco
     * 
     * @param App\Http\Requests\Api\ProfissionalStoreRequest;
     * @return Illuminate\Http\JsonResponse;
     */
    public function store(ProfissionalStoreRequest $request): JsonResponse
    {
        // Iniciar a transação
        DB::beginTransaction();

        try{
            $profissional = Profissional::create([
                "name" => $request->name,
                "cpf" => $request->cpf,
                "email" => $request->email,
                "data_nasc" => $request->data_nasc,
                "logradouro" => $request->logradouro,
                "bairro" => $request->bairro,
                "cep" => $request->cep,
                "telefone" => $request->telefone,
                "celular" => $request->celular,
                "cnpj" => $request->cnpj,
                "razao_social" => $request->razao_social,
                "coren" => $request->coren
            ]);

            DB::commit();

            $body = [
                true,
                "Profissional cadastrado!",
                $profissional
            ];

            return $this->sendResponse($body, 201);

        } catch(Exception $e){
            // Operação não concluída com êxito
            DB::rollBack();

            $body = [
                false, 
                "Profissional não cadastrado", 
                [$e->getMessage()]
            ];
    
            return $this->sendResponse($body, 403);
        }

        return [
            "success" => "it's working!"
        ];
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
        // Iniciar transação
        DB::beginTransaction();
        try{
           
            // Editar o registro no banco
            $profissional->update([
                "name" => $request->name ? : $profissional->name,
                "cpf" => $request->cpf ? : $profissional->cpf,
                "email" => $request->email ? : $profissional->email,
                "logradouro" => $request->logradouro ? : $profissional->logradouro,
                "bairro" => $request->bairro ? : $profissional->bairro,
                "cep" => $request->cep ? : $profissional->cep,
                "telefone" => $request->cep ? : $profissional->telefone,
                "cnpj" => $request->cnpj ? : $profissional->cnpj
            ]);
            
            // Commita as alterações concluídas
            DB::commit();

            $body = [
                true,
                "Usuário editado com sucesso!",
                $profissional
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
     * Este método é responsável por aplicar um softDelete no usuário existente no banco de dados
     */
    public function destroy(string $id): JsonResponse
    {
        try{
            $profissional = Profissional::where("id", $id)->first();
            $status = Response::HTTP_FOUND;
            $body = [
                true,
                "Profissional deletado com sucesso!",
                $profissional
            ];

            if(!isset($profissional)){
                $body[1] = "Profissional não encontrado!";
            } else {
                $profissional->delete();
            }

            return $this->sendResponse($body, $status);
            
        } catch(Exception $e){
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $body = [
                false,
                "Usuário não deletado!",
                []
            ];
            return $this->sendResponse($body, $status);
        }
        
    }
}
