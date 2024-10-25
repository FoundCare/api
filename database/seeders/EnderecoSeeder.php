<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endereco::create([
            "logradouro" => "Rua inamar n° 25",
            "bairro" => "Inamar",
            'cep' => "09970342",
            "cidade" => "Diadema",
            "Estado" => "SP"
        ]);
        Endereco::create([
            "logradouro" => "Rua Dos apostolos n° 25",
            "bairro" => "Eldorado",
            'cep' => "09970352",
            "cidade" => "Diadema",
            "Estado" => "MG"
        ]);
        Endereco::create([
            "logradouro" => "Rua Dos Apostatas n° 35",
            "bairro" => "Inamar",
            'cep' => "09970362",
            "cidade" => "Diadema",
            "Estado" => "SC"
        ]);
        Endereco::create([
            "logradouro" => "Rua inamar",
            "bairro" => "Inamar",
            'cep' => "09970372",
            "cidade" => "Diadema",
            "Estado" => "TR"
        ]);
        Endereco::create([
            "logradouro" => "Rua inamar",
            "bairro" => "Inamar",
            'cep' => "09970382",
            "cidade" => "Diadema",
            "Estado" => "TT"
        ]);
        Endereco::create([
            "logradouro" => "ETECJK",
            "bairro" => "Inamar",
            'cep' => "09970382",
            "cidade" => "Diadema",
            "Estado" => "TT"
        ]);

    }
}
