<?php

namespace Database\Seeders;

use App\Models\Profissional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Profissional::create([
                "id_usuario" => 1,
                "cnpj" => "99999999000199",
                "razao_social" => "FOUNDCARE",
            ]);

            Profissional::create([
                "id_usuario" => 2,
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
            ]);

            Profissional::create([
                "id_usuario" => 3,
                "cnpj" => "88888888000188",
                "razao_social" => "FOUNDCARE",
            ]);

            Profissional::create([
                "id_usuario" => 7,
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
            ]);

            Profissional::create([
                "id_usuario" => 8,
                "cnpj" => "05682157000199",
                "razao_social" => "FOUNDCARE",
            ]);
    }
}
