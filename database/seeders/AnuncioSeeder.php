<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    public function run()
    {
        Anuncio::create([
            'titulo' => 'Cuidador de idosos',
            'descricao' => 'Possuo experiência em cuidar de idosos desde 2003, possuo formação adequada e empatia!',
            'id_profissional' => 1,
        ]);

        Anuncio::create([
            'titulo' => 'Serviço de HomeCare',
            'descricao' => 'Tenho facilidae em tratamento terapêutico para crianças atípicas',
            'id_profissional' => 2,
        ]);
    }
}
