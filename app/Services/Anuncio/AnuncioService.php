<?php

namespace App\Services;

use App\Models\Anuncio;
use Illuminate\Support\Facades\DB;
use Exception;

class AnuncioService implements AnuncioServiceInterface
{
    public function __construct(
        private UserServiceInterface $userService
    )
    {

    }

    public function index()
    {
        try{
            $anuncio = Anuncio::
                join('profissionais', 'anuncios.id_profissional', '=', 'profissionais.id')
                ->select('anuncios.id','anuncios.titulo','anuncios.descricao',
                'profissionais.name as profissional_nome')
                ->get();

            return response()->json(AnuncioResource::collection($anuncio), 200);
            } catch(Exception $e){
                $data = [
                    "error" => $e->getMessage()
                ];
                return response()-> json(new AnuncioResource($data),404);
            }
    }

    public function show($id)
    {
        // Retorna os detalhes completos de um único anúncio
        try {
            $anuncio = Anuncio::join('profissionais', 'anuncios.id_profissional', '=', 'profissionais.id')
                ->leftJoin('historico_profissionais', 'historico_profissionais.id_profissional', '=', 'profissionais.id') // Exemplo de outra relação
                ->select(
                    'anuncios.id',
                    'anuncios.titulo',
                    'anuncios.descricao',
                    'profissionais.name as profissional_nome',
                    'historico_profissionais.detalhes as historico_detalhes' // Exemplo de informação extra
                )
                ->where('anuncios.id', $id)
                ->firstOrFail();

            return response()->json(new AnuncioResource($anuncio), 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();

            // Criando o anúncio
            $anuncio = Anuncio::create([
                'titulo' => $data['titulo'],
                'descricao' => $data['descricao'],
                'id_profissional' => $data['id_profissional'],
            ]);

            DB::commit();

            // Retornando os dados do anúncio com o nome do profissional
            return Anuncio::join('profissionais', 'anuncios.id_profissional', '=', 'profissionais.id')
                          ->select(
                              'anuncios.id',
                              'anuncios.titulo',
                              'anuncios.descricao',
                              'profissionais.name as profissional_nome'
                          )
                          ->where('anuncios.id', $anuncio->id)
                          ->firstOrFail();

        } catch (Exception $e) {
            DB::rollBack();
            return ['error' => $e->getMessage()];
        }
    }

    public function update($data, $id)
    {
        try {
            DB::beginTransaction();

            // Atualizando o anúncio
            $anuncio = Anuncio::findOrFail($id);
            $anuncio->update([
                'titulo' => $data['titulo'] ?? $anuncio->titulo,
                'descricao' => $data['descricao'] ?? $anuncio->descricao,
                'id_profissional' => $data['id_profissional'] ?? $anuncio->id_profissional,
            ]);

            DB::commit();

            // Retornando os dados do anúncio com o nome do profissional atualizado
            return Anuncio::join('profissionais', 'anuncios.id_profissional', '=', 'profissionais.id')
                          ->select(
                              'anuncios.id',
                              'anuncios.titulo',
                              'anuncios.descricao',
                              'profissionais.name as profissional_nome'
                          )
                          ->where('anuncios.id', $anuncio->id)
                          ->firstOrFail();

        } catch (Exception $e) {
            DB::rollBack();
            return ['error' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            $anuncio = Anuncio::findOrFail($id);
            $anuncio->delete();

            return ['message' => 'Anúncio deletado com sucesso!'];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

