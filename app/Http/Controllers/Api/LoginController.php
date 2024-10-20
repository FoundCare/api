<?php

namespace App\Http\Controllers\Api;

use App\Services\Login\LoginService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct(
        private LoginService $loginService
    ){}

    public function login(Request $request)
    {
        return $this->loginService->login($request->only('email', 'senha'));
    }

}
