<?php

namespace Database\Seeders;

use App\Models\Contato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contato::firstOrCreate([
            "celular" => "11988745701"
        ]);
        Contato::firstOrCreate([
            "celular" => "11988745702"
        ]);
        Contato::firstOrCreate([
            "celular" => "11988745703"
        ]);
        Contato::firstOrCreate([
            "celular" => "11988745704"
        ]);
        Contato::firstOrCreate([
            "celular" => "11988745705"
        ]);
        
    }
}
