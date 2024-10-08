<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profissional;
use App\Models\User; // Adicionei a importação do modelo User

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os profissionais, incluindo dados do usuário
        return Profissional::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Verifica se o user_id existe
            'cnpj' => 'required|string|max:18',
            'razao_social' => 'required|string|max:255',
            'status_validacao' => 'in:pendente,negado,aprovado',
        ]);

        // Busca o usuário para obter os dados
        $user = User::find($validatedData['user_id']);

        // Criação do novo profissional
        $profissional = Profissional::create([
            'user_id' => $validatedData['user_id'], // Adicionando o user_id ao Profissional
            'cnpj' => $validatedData['cnpj'],
            'razao_social' => $validatedData['razao_social'],
            'status_validacao' => $validatedData['status_validacao'],
        ]);

        return response()->json($profissional, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o profissional pelo ID, incluindo o usuário
        $profissional = Profissional::with('user')->findOrFail($id);
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
            'user_id' => 'sometimes|required|exists:users,id', // Verifica se o user_id existe
            'cnpj' => 'sometimes|required|string|max:18',
            'razao_social' => 'sometimes|required|string|max:255',
            'status_validacao' => 'in:pendente,negado,aprovado',
        ]);

        // Se user_id for fornecido, busque o usuário
        if (isset($validatedData['user_id'])) {
            $user = User::find($validatedData['user_id']);
            $profissional->name = $user->nome; // Atualiza o nome do profissional com o do usuário
            $profissional->cpf = $user->cpf; // Atualiza o CPF
            $profissional->email = $user->email; // Atualiza o e-mail
        }

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
