<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User; // Importa o modelo User
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [1, 2, 3]; // IDs dos usuários que você deseja associar

        foreach ($usuarios as $id_usuario) {
            Paciente::firstOrCreate(['id_usuario' => $id_usuario]);
        }
    }
}
