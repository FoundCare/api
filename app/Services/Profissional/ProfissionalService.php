<?php

namespace App\Services\Profissional;

use App\Interfaces\Profissional\ProfissionalServiceInterface;
use App\Models\Profissional;

class ProfissionalService implements ProfissionalServiceInterface
{
    public function index()
    {
        $profissionais = Profissional::all();
        return $profissionais;
    }

    public function show($id)
    {
        return Profissional::findOrFail($id);
    }

    public function store($data)
{
    return Profissional::create([
        'id_usuario' => $data["id"],
        'cnpj' => $data['cnpj'],
        'razao_social' => $data['razao_social']
    ]);
}


    public function update($request, $id)
    {
        $profissional = Profissional::findOrFail($id);
        $profissional->update($request->all());
        return $profissional;
    }

    public function destroy($id)
    {
        $profissional = Profissional::findOrFail($id);
        $profissional->delete();
        return response()->json(['message' => 'Profissional removido com sucesso'], 200);
    }
}
