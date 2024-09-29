<?php

namespace App\Services\User;

use App\Http\Resources\UserResource;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return 'FUNFOU';
        // return User::all();
    }
    public function show($id)
    {
        try{
            $usuario = User::findOrFail($id);
            return response()->json(new UserResource($usuario));
        } catch(ModelNotFoundException $e){
            $data = [
                "error" => $e->getMessage()
            ];
            return response()->json(new UserResource($data), 404);
        }
    }
    public function store($data)
    {

    }
    public function update($data, $id)
    {

    }
    public function destroy($id)
    {

    }
}
