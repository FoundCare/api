<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Endereco;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnderecoController extends Controller
{
    public function index(): JsonResponse
    {
        $endereco = Endereco::get();
        $status = Response::HTTP_FOUND;

        if (count($endereco) > 0) {
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

    public function show(string $id)
    {
        try {
            $endereco = Endereco::where("id_endereco", $id)->first();

            if (isset($endereco)) {
                $status = Response::HTTP_FOUND;
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
        } catch (Exception $e) {
            $status = Response::HTTP_SERVICE_UNAVAILABLE;
            $body = [
                true,
                "Endereços não encontrados!",
                $e->getMessage()
            ];
            
        } finally {
            return $this->sendResponse($body, $status);
        }
    }
}
