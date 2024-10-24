<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index()
    {
        return Anuncio::with('profissional', 'historicoDeProfissionais')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'id_profissional' => 'required|exists:profissionais,id',
        ]);

        $anuncio = Anuncio::create($validatedData);

        return response()->json($anuncio, 201);
    }

    public function show($id)
    {
        $anuncio = Anuncio::with('profissional', 'historicoDeProfissionais')->findOrFail($id);
        return response()->json($anuncio);
    }

    public function update(Request $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->update($request->all());

        return response()->json($anuncio);
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();

        return response()->json(['message' => 'Anúncio deletado com sucesso']);
    }
}
