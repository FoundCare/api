<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Competencia\CompetenciaInterfaceService;
use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\Profissional;

class CompetenciaController extends Controller
{
    public function __construct(
        private CompetenciaInterfaceService $competenciaService
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->competenciaService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'competencia' => 'required|string|max:255',
        ]);

        // Criação da nova competência
        $competencia = Competencias::create($validatedData);
        return response()->json($competencia, 201); // Retorna a competência criada com status 201
    }

    /**
     * Display the specified resource.
     */
    public function show(Profissional $profissional)
    {
        return $this->competenciaService->show($profissional->id_profissional);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $competencia = Competencias::findOrFail($id);

        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'competencia' => 'required|string|max:255',
        ]);

        // Atualiza a competência
        $competencia->update($validatedData);
        return response()->json($competencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competencia = Competencias::findOrFail($id);
        $competencia->delete();

        return response()->json(null, 204); // Retorna 204 No Content
    }
}
