<?php

namespace App\Services\Formacao;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Formacao\FormacaoServiceInterface;
use App\Models\Formacao;

class FormacaoService implements FormacaoServiceInterface
{
    public function index()
    {
        return Formacao::all();
    }

    public function show($id)
    {
        return Formacao::findOrFail($id);

    }
    
    public function getByProfissional($id_profissional)
    {
        return DB::table('formacao')->where('id_profissional', $id_profissional)->get();
    }

    public function store($data)
    {
        return Formacao::create($data);
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