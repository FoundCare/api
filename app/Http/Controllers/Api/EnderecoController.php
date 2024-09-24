<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Endereco;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnderecoController extends Controller
{
    public function index(): JsonResponse
    {
        $endereco = Endereco::get();
        $status = Response::HTTP_FOUND;
        
        if(count($endereco) > 0){
            $body = [
                true,
                "Endereços encontrados!",
                $endereco
            ];
        } else {
            $status = Response::HTTP_NOT_FOUND;
            $body = [
                false,
                "Endereços não encontrados!",
                null
            ];
        }
        
        return $this->sendResponse($body, $status);
    }
}
