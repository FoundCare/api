<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profissional;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return [
            "success" => "it's working!"
        ];
    }
}
