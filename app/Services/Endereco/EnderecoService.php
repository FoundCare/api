<?php

namespace App\Services\Endereco;

use App\Http\Resources\EnderecoResource;
use App\Interfaces\Endereco\EnderecoServiceInterface;
use App\Models\Endereco;
use Exception;
use Illuminate\Support\Facades\DB;

class EnderecoService implements EnderecoServiceInterface
{
    public function index()
    {
        //
    }

    public function show($id)
    {
        try {
            $endereco = Endereco::where("id_endereco", $id)->first();

            if (!isset($endereco)) {
                $endereco = ["Nenhum registro encontrado!"];
            }
            return new EnderecoResource($endereco);
        } catch (Exception $e) {
            $endereco = [$e->getMessage()];
            return new EnderecoResource($endereco);
        }
    }

    public function store($data)
    {
        try{
            DB::beginTransaction();

            $body = [
                "logradouro" => $data['logradouro'],
                "bairro" => $data['bairro'],
                "cep" => $data['cep'],
                "cidade" => $data['cidade'],
                "estado" => $data['estado']
            ];
            $endereco = Endereco::create($body);

            DB::commit();

            return new EnderecoResource($endereco);

        } catch(Exception $e){
            DB::rollBack();
            $data = [$e->getMessage()];
            return new EnderecoResource($data);
        }
    }

    public function update($data, $id)
    {
        try{
            DB::beginTransaction();

            $endereco = Endereco::where("id_endereco", $id)->findOrFail($id);
            dd($endereco);
            
            $body = [
                "logradouro" => $data['logradouro'] ? : $endereco['logradouro'],
                "bairro" => $data['bairro'] ? : $endereco['bairro'],
                "cep" => $data['cep'] ? : $endereco['cep'],
                "cidade" => $data['cidade'] ? : $endereco['cidade'],
                "estado" => $data['estado'] ? : $endereco['bairro']
            ];
            $endereco->update($body);

            DB::commit();

            return new EnderecoResource($endereco);

        } catch(Exception $e){
            DB::rollBack();
            $data = [$e->getMessage()];
            return new EnderecoResource($data);
        }
        
    }

    public function destroy($id)
    {
    }
}