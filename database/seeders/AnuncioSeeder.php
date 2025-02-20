<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    public function run()
    {
        Anuncio::create([
            'servicos' => 'Cuidador de idosos', // Alterado de 'titulo' para 'servicos'
            'descricao' => 'Possuo experiência em cuidar de idosos desde 2003, possuo formação adequada e empatia!',
            'id_profissional' => 1,
        ]);

        Anuncio::create([
            'servicos' => 'Serviço de HomeCare', // Alterado de 'titulo' para 'servicos'
            'descricao' => 'Tenho facilidade em tratamento terapêutico para crianças atípicas',
            'id_profissional' => 2,
        ]);

        Anuncio::create([
            'servicos' => 'Serviço de Vacinas', // Alterado de 'titulo' para 'servicos'
            'descricao' => 'Tenho facilidade em tratamento terapêutico para crianças atípicas e neurodivergentes',
            'id_profissional' => 3,
        ]);
        Anuncio::create([
            'servicos' => 'Serviço de Vacinas', // Alterado de 'titulo' para 'servicos'
            'descricao' => 'O Reiki é um fascinante sistema natural de harmonização e reposição energética que nos proporciona mais qualidade de vida, saúde e muita paz de espírito. Assim como outras terapias energéticas',
            'id_profissional' => 4
        ]);
        Anuncio::create([
            'servicos' => 'Serviço de Vacinas', // Alterado de 'titulo' para 'servicos'
            'descricao' => 'Tenho facilidade em tratamento terapêutico para crianças atípicas e neurodivergentes',
            'id_profissional' => 5,
        ]);
    }
}
