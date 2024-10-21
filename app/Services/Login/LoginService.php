<?php

namespace App\Services\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function logout($user)
    {
        dd($user->tokens());
    }

    public function login($data)
    {
        $email = $data['email'];
        $senha = $data['senha'];

        $user = User::where('email', $email)->first();
        
        if(is_null($user) || !$this->checkPassword($senha, $user->senha)){
            $body = [
                "status" => false,
                "message" => [
                    "error" => "Unauthorized"
                ]
            ];
            return response()->json($body, 401);
        }
        
        if($this->userHaveAToken($user)){
            $body = [
                "status" => false,
                "message" => "Usuário já está logado na plataforma",
            ];
            return response()->json($body, 400);
        }
        
        $token = $user->createToken('Personal Access Token', ['*'])->accessToken;
        
        $body = [
            "status" => true,
            "message" => "Login realizado com sucesso! Por favor copie o token para futuras requisições!",
            "token" => $token
        ];

        return response()->json($body);
    }

    private function userHaveAToken($user)
    {
        if($user->tokens()->where('revoked', false)->first()){
            return true;
        }
    }

    private function checkPassword($checkedPassword, $password)
    {
        return Hash::check($checkedPassword, $password);
    }
}
