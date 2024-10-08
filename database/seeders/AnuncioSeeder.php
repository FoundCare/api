<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    public function run(): void
    {
        Anuncio::create([
            'id_profissional' => 1,
            'descricao' => 'Descrição do anúncio 1',
            'titulo' => 'Título do anúncio 1',
        ]);

        Anuncio::create([
            'id_profissional' => 2,
            'descricao' => 'Descrição do anúncio 2',
            'titulo' => 'Título do anúncio 2',
        ]);

        Anuncio::create([
            'id_profissional' => 3,
            'descricao' => 'Descrição do anúncio 3',
            'titulo' => 'Título do anúncio 3',
        ]);

        Anuncio::create([
            'id_profissional' => 4,
            'descricao' => 'Descrição do anúncio 4',
            'titulo' => 'Título do anúncio 4',
        ]);

        Anuncio::create([
            'id_profissional' => 5,
            'descricao' => 'Descrição do anúncio 5',
            'titulo' => 'Título do anúncio 5',
        ]);
    }
}
