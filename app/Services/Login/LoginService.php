<?php

namespace App\Services\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login($data)
    {
        $email = $data['email'];
        $senha = $data['senha'];

        $user = User::where('email', $email)->first();
        
        
        if($this->checkIfUserExist($user) || !$this->checkPassword($senha, $user->senha)){
            $data = [
                "status" => false,
                "message" => [
                    "error" => "Unauthorized"
                ]
            ];
            return response()->json($data, 401);
        }
        
        $token = $user->createToken('Personal Access Token', ['*'])->accessToken;
        
        return response()->json(['token' => $token]);
    }

    private function checkPassword($checkedPassword, $password){
        return Hash::check($checkedPassword, $password);
    }

    private function checkIfUserExist($user){
        return is_null($user);
    }
}