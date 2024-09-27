<?php

namespace App\Services\User;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return 'FUNFOU';
        // return User::all();
    }
    public function show($id)
    {
        return User::find($id);
    }
    public function store($data)
    {
        
    }
    public function update($id)
    {

    }
    public function destroy($id)
    {

    }
}