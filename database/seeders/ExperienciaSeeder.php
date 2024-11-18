<?php

namespace Database\Seeders;

use App\Models\Experiencia;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Auxiliar de Enfermagem",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 1,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Enfermeiro",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 1,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Auxiliar em Enfermagem",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 2,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Técnico em Enfermagem",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 2,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Personal Trainer",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 3,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
        Experiencia::create([
            'empresa' => 'FoundCARE',
            'cargo' => "Fisioterapeuta",
            'data_inicio' => '2024-11-18',
            'data_fim' => null,
            'id_profissional' => 3,
            'descricao' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nulla et lacus placerat cursus. Curabitur sit amet eros eget nisi aliquam efficitur. Donec suscipit sapien id sapien fermentum, nec venenatis lorem venenatis. Integer ac augue dictum, dictum felis at, suscipit eros. Nam consequat."
        ]);
    }
}
