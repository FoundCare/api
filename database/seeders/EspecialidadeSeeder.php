<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especialidade::create([
            "id_profissional" => 1,
            "especialidade" => "Coren",
            "comprovante" => "88888rs"
        ]);

        Especialidade::create([
            "id_profissional" => 1,
            "especialidade" => "Coren",
            "comprovante" => "88887rs"
        ]);

        Especialidade::create([
            "id_profissional" => 2,
            "especialidade" => "Coren",
            "comprovante" => "99999rs"
        ]);

        Especialidade::create([
            "id_profissional" => 2,
            "especialidade" => "Coren",
            "comprovante" => "99998rs"
        ]);

        Especialidade::create([
            "id_profissional" => 3,
            "especialidade" => "Coren",
            "comprovante" => "777777rs"
        ]);

        Especialidade::create([
            "id_profissional" => 3,
            "especialidade" => "Coren",
            "comprovante" => "777776rs"
        ]);
    }
}
