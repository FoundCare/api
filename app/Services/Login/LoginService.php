<?php

namespace App\Services\Login;

use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function logout($user)
    {
        $user->token()->revoke();
        $body = [
            "status" => true,
            "message" => "Até a próxima!"
        ];
        return response()->json($body, 200);
    }

    public function login($data)
    {
        $email = $data['email'];
        $senha = $data['senha'];

        $user = $this->getUserByEmail($email);
        
        if(!$this->checkPassword($senha, $user->senha)){
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
        
        $tokenResponse = $this->generateUserToken($user);

        if(is_array($tokenResponse)){
            return response()->json($tokenResponse, 400);
        }

        $body = [
            "status" => true,
            "message" => "Login realizado com sucesso! Por favor copie o token para futuras requisições!",
            "token" => $tokenResponse
        ];

        return response()->json($body);
    }

    private function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    private function generateUserToken($user)
    {
        $paciente = $this->verifyIfUserIsPaciente($user->id);
        $profissional = $this->verifyIfUserIsProfissional($user->id);

        if($paciente && $profissional){
            return $user->createToken('Personal Access Token', ["scope_paciente", "scope_profissional"])->accessToken;
        } else if($paciente){
            return $user->createToken('Personal Access Token', ["scope_paciente"])->accessToken;
        } else if($profissional){
            return $user->createToken('Personal Access Token', ["scope_profissional"])->accessToken;
        } else {
            return [
                "status" => false,
                "message" => "Usuário não tem um perfil válido",
            ];
        }
    }

    private function verifyIfUserIsPaciente($userId)
    {
        return Paciente::where('id_usuario', $userId)->exists();
    }

    private function verifyIfUserIsProfissional($userId)
    {
        return Profissional::where('id_usuario', $userId)->exists();
    }

    private function userHaveAToken($user)
    {
        return $user->tokens()->where('revoked', false)->exists();
    }

    private function checkPassword($checkedPassword, $password)
    {
        return Hash::check($checkedPassword, $password);
    }
}
