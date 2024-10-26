<?php

use App\Models\Anuncio;

class AnuncioService
{
    public function index()
    {
        return Anuncio::with('profissional', 'historicoDeProfissionals')->get();
    }

    public function store(array $dados)
    {
        return Anuncio::create($dados);
    }

    public function update($id, array $dados)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->update($dados);
        return $anuncio;
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();
        return ['message' => 'Anúncio deletado com sucesso'];
    }
}
