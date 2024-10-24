<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    public function run()
    {
        Anuncio::create([
            'titulo' => 'Aulas de Inglês',
            'descricao' => 'Aulas particulares de inglês para iniciantes e avançados.',
            'id_profissional' => 1,
        ]);

        Anuncio::create([
            'titulo' => 'Serviço de Design Gráfico',
            'descricao' => 'Criação de logotipos, banners e material publicitário.',
            'id_profissional' => 2,
        ]);
    }
}
