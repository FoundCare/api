<?php

namespace App\Services\Anuncio;

use App\Models\Anuncio;
use App\Models\Competencias;
use Exception;
use Illuminate\Support\Collection;

class AnuncioService
{
    public function index()
    {
        try {
            $anuncios = Anuncio::join('profissionais', 'profissionais.id_profissional', '=', 'anuncios.id_profissional')
                ->join('competencias', 'competencias.id_profissional', '=', 'profissionais.id_profissional')
                ->join('users', 'users.id', '=', 'profissionais.id_usuario')
                ->join('contatos', 'contatos.id_contato', '=', 'users.id_contato')
                ->get([
                    'anuncios.id_anuncios',
                    'anuncios.servicos', 
                    'anuncios.descricao',
                    'contatos.celular', 
                    'competencias.competencia', 
                    'users.nome', 
                    'anuncios.created_at', 
                    'profissionais.id_profissional'])
                ->groupBy('id_anuncios');
            

            $result = $anuncios->map(function (Collection $items) {
                $first = $items->first();
                return [
                    'id_profissional' => $first->id_profissional,
                    'nome' => $first->nome,
                    'created_at' => $first->created_at,
                    'servicos' => $first->servicos,
                    'celular' => $first->celular,
                    'descricao' => $first->descricao,
                    'competencias' => $items->pluck('competencia')->unique()->values()->all(), // Agrupa as competências
                ];
            })->values();

            return response()->json($result);
        } catch (Exception $e) {
            $data = [
                "status" => false,
                "error" => $e->getMessage()
            ];

            return response()->json($data, 404);
        }
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
