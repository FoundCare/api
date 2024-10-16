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
                "coren" => "2415876"
            ]);
        
            Profissional::create([
                "id_usuario" => 2,
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24154875"
            ]);
        
            Profissional::create([
                "id_usuario" => 3,
                "cnpj" => "88888888000188",
                "razao_social" => "FOUNDCARE",
                "coren" => "24157873"
            ]);
        
           
        
    }
}
