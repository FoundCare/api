<?php

namespace Database\Seeders;

use App\Models\Competencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencias::create([
            'id_profissional' => 1,
            'competencia' => 'Trabalha com Idosos'
        ]);
        Competencias::create([
            'id_profissional' => 1,
            'competencia' => 'Trabalho com Autistas'
        ]);

        Competencias::create([
            'id_profissional' => 2,
            'competencia' => 'Comunicação Verbal'
        ]);

        Competencias::create([
            'id_profissional' => 2,
            'competencia' => 'Higiene Pessoal'
        ]);

        Competencias::create([
            'id_profissional' => 3,
            'competencia' => 'Especialista em HomeCare'
        ]);

        Competencias::create([
            'id_profissional' => 3,
            'competencia' => 'Vacina'
        ]);
    }
}
