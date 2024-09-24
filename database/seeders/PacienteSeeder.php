<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paciente::create([
            "id_usuario" => 1
        ]);
        Paciente::create([
            "id_usuario" => 2
        ]);
        Paciente::create([
            "id_usuario" => 3
        ]);
    }
}
