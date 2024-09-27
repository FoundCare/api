<?php

namespace App\Services\Contato;

use App\Http\Resources\ContatoResource;
use App\Interfaces\Contato\ContatoServiceInterface;
use App\Models\Contato;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContatoService implements ContatoServiceInterface
{
    public function index()
    {

    }
    
    public function show($id)
    {
        try {
            $contato = Contato::findOrFail($id)->get();
            return new ContatoResource($contato);
        } catch(ModelNotFoundException $e){
            $data = ["error" => $e->getMessage()];
            return new ContatoResource($data);
        }
    }

    public function store($data)
    {

    }

    public function update($request, $id)
    {

    }

    public function destroy($id)

    {

    }

}
