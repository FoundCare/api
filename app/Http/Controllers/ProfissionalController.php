<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profissional;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os profissionais
        return Profissional::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|unique:profissionais',
            'email' => 'required|string|email|max:255|unique:profissionais',
            'data_nasc' => 'required|date',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:9',
            'celular' => 'required|string|max:15',
            'cnpj' => 'required|string|max:18',
            'razao_social' => 'required|string|max:255',
            'coren' => 'required|string|unique:profissionais|max:10',
            'status_validacao' => 'in:pendente,negado,aprovado',
        ]);

        // Criação do novo profissional
        $profissional = Profissional::create($validatedData);
        return response()->json($profissional, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o profissional pelo ID
        $profissional = Profissional::findOrFail($id);
        return response()->json($profissional);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Busca o profissional pelo ID
        $profissional = Profissional::findOrFail($id);

        // Valida os dados recebidos para atualização
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'cpf' => 'sometimes|required|string|unique:profissionais,cpf,'.$id,
            'email' => 'sometimes|required|string|email|max:255|unique:profissionais,email,'.$id,
            'data_nasc' => 'sometimes|required|date',
            'logradouro' => 'sometimes|required|string|max:255',
            'bairro' => 'sometimes|required|string|max:255',
            'cep' => 'sometimes|required|string|max:9',
            'celular' => 'sometimes|required|string|max:15',
            'cnpj' => 'sometimes|required|string|max:18',
            'razao_social' => 'sometimes|required|string|max:255',
            'coren' => 'sometimes|required|string|unique:profissionais,coren,'.$id,
            'status_validacao' => 'in:pendente,negado,aprovado',
        ]);

        // Atualiza os dados do profissional
        $profissional->update($validatedData);
        return response()->json($profissional);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca o profissional pelo ID
        $profissional = Profissional::findOrFail($id);
        $profissional->delete();

        return response()->json(null, 204);
    }
}