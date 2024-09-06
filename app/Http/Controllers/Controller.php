<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Este método é responsável por converter um array em JSON
     * 
     * Este método é responsável por enviar uma resposta em formato JSON
     * Contendo todos os dados que forem solicitados.
     * 
     * @param array $data - array de Dados que precisam ser enviados pela API
     * @param int $status - status da solicitação que será enviado para o solicitante da API 
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse(array $data = [null, null, []], int $status = 200): JsonResponse
    {
        $bodyResponse = [
            "status" => $data[0],
            "message" => $data[1],
            "body" => $data[2],
        ];

        return response()->json($bodyResponse, $status);
    }
}
