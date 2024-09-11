<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $status = Response::HTTP_ACCEPTED;

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

    public function store(Request $request)
    {
        /**
         * {
         *    "name": "Novo profissional",
         *    "cpf": "00000000000",
         *    "email": "jeff@gmail.com",
         *    "data_nasc": "1999-11-29",
         *    "logradouro": "Rua dos bobos n°0",
         *    "bairro": "Diadema",
         *    "cep": "09970-342",
         *    "telefone": null,
         *    "celular": "11988745706",
         *    "cnpj": "05",
         *    "razao_social": "FOUNDCARE",
         *    "coren": "24158767"
         *}
         */
        // Iniciar a transação
        DB::beginTransaction();
        dd($request->all());
        try{
            $profissional = Profissional::create([
                "name" => $request->name
            ]);

        } catch(Exception $e){
            // Operação não concluída com êxito
            DB::rollBack();

            $body = [
                false, 
                "Profissional não cadastrado", 
                []
            ];
    
            return $this->sendResponse($body, 403);
        }

        return [
            "success" => "it's working!"
        ];
    }
}
