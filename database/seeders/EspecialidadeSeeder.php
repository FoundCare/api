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
            "especialidade" => "Coren",
            "comprovante" => "215487rs"
        ]);

        Especialidade::create([
            "especialidade" => "Coren",
            "comprovante" => "958874rs"
        ]);

    }
}
