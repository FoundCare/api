<?php

namespace App\Services\Formacao;

use App\Interfaces\Formacao\FormacaoServiceInterface;
use App\Models\Formacao;

class FormacaoService implements FormacaoServiceInterface
{
    public function index()
    {
        //
    }

    public function show($id)
    {

    }
    
    public function store($data)
    {

    }

    public function update($request, $id)
    {
        $formacao = Formacao::findOrFail($id);
        $formacao->update($request->all());

        return $formacao;
    }

    public function destroy($id)
    {
        $formacao = Formacao::findOrFail($id);
        $formacao->delete();

        return response()->json(['message' => 'Formação deletada com sucesso.']);
    }
}