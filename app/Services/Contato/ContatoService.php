<?php

namespace App\Services\Contato;

use App\Http\Resources\ContatoResource;
use App\Http\Resources\EnderecoResource;
use App\Interfaces\Contato\ContatoServiceInterface;
use App\Models\Contato;
use App\Models\Endereco;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ContatoService implements ContatoServiceInterface
{
    public function index()
    {

    }

    public function show($id)
    {
        try {
            $contato = Contato::findOrFail($id);
            return new ContatoResource($contato);
        } catch(ModelNotFoundException $e){
            $data = ["error" => $e->getMessage()];
            return new ContatoResource($data);
        }
    }

    public function store($data)
    {
        try{
            DB::beginTransaction();

            $body = [
                "telefone" => $data['telefone'] ?? null,
                "celular" => $data['celular']
            ];

            $contato = Contato::create($body);

            DB::commit();

            return new EnderecoResource($contato);
        } catch(Exception $e){
            DB::rollBack();
            $data = [
                "message" => $e->getMessage()
            ];
            return new EnderecoResource($data);
        }
    }

    public function update($request, $id)
    {

    }

    public function destroy($id)

    {

    }

}
