<?php

namespace App\Http\Controllers\Api;

use App\Services\Login\LoginService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct(
        private LoginService $loginService
    ){}

    public function login(Request $request)
    {
        return $this->loginService->login($request->only('email', 'senha'));
    }

    public function logout(Request $request,)
    {
        return $this->loginService->logout($request->user());
    }

}
