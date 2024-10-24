<?php

use App\Models\Anuncio;

class AnuncioService
{
    public function listarAnuncios()
    {
        return Anuncio::with('profissional', 'historicoDeProfissionais')->get();
    }

    public function criarAnuncio(array $dados)
    {
        return Anuncio::create($dados);
    }

    public function atualizarAnuncio($id, array $dados)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->update($dados);
        return $anuncio;
    }

    public function deletarAnuncio($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();
        return ['message' => 'Anúncio deletado com sucesso'];
    }
}
