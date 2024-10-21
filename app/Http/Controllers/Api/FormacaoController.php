<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formacao;
use App\Interfaces\Formacao\FormacaoServiceInterface;
use Illuminate\Http\Request;

class FormacaoController extends Controller
{   
    protected $formacaoService;

    public function __construct(FormacaoServiceInterface $formacaoService)
    {
        $this->formacaoService = $formacaoService;
    }   

    public function getByProfissional($id_profissional)
    {
        return response()->json([
            'data' => $this->formacaoService->getByProfissional($id_profissional),
        ]);
    }

    // Listar todas as formações
    public function index()
    {
        return response()->json($this->formacaoService->index());
    }

    // Mostrar uma formação específica
    public function show($id)
    {
        return $this->formacaoService->show($id);
        return response()->json($formacao);
    }

    // Criar uma nova formação
    public function store(Request $request)
    {
        $data = $request->validate([
            'formacao' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicio' => 'required|date',
            'data_termino' => 'nullable|date|after_or_equal:data_inicio',
            'token_certificado' => 'nullable|string',
            
        ]);

        return $this->formacaoService->store($data);
    }

    // Atualizar uma formação existente
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'formacao' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicio' => 'sometimes|required|date',
            'data_termino' => 'nullable|date|after_or_equal:data_inicio',
            'token_certificado' => 'nullable|string',
        ]);

        return $this->formacaoService->update($request, $id);
    }

    // Deletar uma formação
    public function destroy($id)
    {
        return $this->formacaoService->destroy($id);
    }
}