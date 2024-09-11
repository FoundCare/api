<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create(Request $request)
    {
        $token = $request;
        dd($token);
        

        //return $this->sendResponse([true, 'Token gerado com sucesso!', ["token" => $token->plainTextToken]]);
    }
}
