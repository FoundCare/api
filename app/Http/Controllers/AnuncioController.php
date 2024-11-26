<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Anuncio\AnuncioRequest;
use App\Services\Anuncio\AnuncioService;

class AnuncioController extends Controller
{
    public function __construct(
        private AnuncioService $anuncioService
    )
    {
    }
    
    public function index()
    {
        return $this->anuncioService->index();
        
    }

    public function getByProfissional($id_profissional)
    {
        $anuncios = Anuncio::where('id_profissional', $id_profissional)->get();

        if ($anuncios->isEmpty()) {
            return response()->json(['message' => 'Nenhum anúncio encontrado para este profissional.'], 404);
        }

        return response()->json($anuncios, 200);
    }

    public function store(AnuncioRequest $request)

    {

        Log::info('Dados recebidos no store:', $request->all());
        $validatedData = $request->validate([
            'servicos' => 'required|string|max:255',
            'descricao' => 'required|string',
            'id_profissional' => 'required|exists:profissionais,id_profissional',
        ]);

        $anuncio = Anuncio::create($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Anúncio criado com sucesso!',
            'data' => $anuncio,
        ], 201);
    }

    public function show($id)
    {
        $anuncio = Anuncio::with('profissional', 'historicoDeProfissionals')->findOrFail($id);
        return response()->json($anuncio);
    }

    public function update(AnuncioRequest $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);

        $data = [
            'servicos' => $request->input('servicos'),
            'descricao' => $request->input('descricao'),
            'id_profissional' => $request->input('id_profissional')
        ];

        $anuncio->update($data);

        return response()->json([
            'message' => 'Anúncio atualizado com sucesso.',
            'anuncio' => $anuncio
        ], 200);
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();

        return response()->json(['message' => 'Anúncio deletado com sucesso']);
    }
}
