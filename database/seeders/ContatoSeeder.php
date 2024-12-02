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
        Contato::create([
            "celular" => "11988745706"
        ]);
        Contato::create([
            "celular" => "11981745163"
        ]);
        Contato::create([
            "celular" => "11957134523"
        ]);
        Contato::create([
            "celular" => "11942823661"
        ]);
        Contato::create([
            "celular" => "11969649063"
        ]);
        Contato::create([
            "celular" => "11966691208"
        ]);
    }
}
