<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profissional;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
