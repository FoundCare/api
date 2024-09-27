<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\User\UserServiceInterface;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    ) {

    }

    public function teste()
    {
        return $this->userService->index();
    }
}
