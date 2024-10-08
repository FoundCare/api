<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use App\Models\Profissional;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnuncioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Pegando todos os profissionais para associar com anúncios
        $profissionais = Profissional::all();

        foreach ($profissionais as $profissional) {
            // Criando entre 1 e 3 anúncios por profissional
            for ($i = 0; $i < rand(1, 3); $i++) {
                Anuncio::create([
                    'titulo' => $faker->sentence(3),
                    'descricao' => $faker->paragraph,
                    'id_profissional' => $profissional->id,
                ]);
            }
        }
    }
}
