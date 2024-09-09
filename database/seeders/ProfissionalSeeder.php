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
        if(!Profissional::where('email', 'matheusdesenvolvedor011@gmail.com')->first()){
            Profissional::create([
                "name" => "Jefferson",
                "email" => "matheusdesenvolvedor011@gmail.com",
                "cpf" => "47608923890",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "2415876"
            ]);
        }
        if(!Profissional::where('email', 'ruansilva1404@gmail.com')->first()){
            Profissional::create([
                "name" => "Ruan",
                "email" => "ruansilva1404@gmail.com",
                "cpf" => "47608923891",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24154875"
            ]);
        }
        if(!Profissional::where('email', 'geovannasilvasousa2@gmail.com')->first()){
            Profissional::create([
                "name" => "Geovanna",
                "email" => "geovannasilvasousa2@gmail.com",
                "cpf" => "47608923892",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24155874"
            ]);
        }
        if(!Profissional::where('email', 'arthuralexandredealmeida@gmail.com')->first()){
            Profissional::create([
                "name" => "Arthur",
                "email" => "arthuralexandredealmeida@gmail.com",
                "cpf" => "47608923893",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24157873"
            ]);
        }
        if(!Profissional::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            Profissional::create([
                "name" => "João",
                "email" => "j.vitor.moura.37@gmail.com",
                "cpf" => "47608923894",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24154872"
            ]);
        }
        if(!Profissional::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            Profissional::create([
                "name" => "Italo",
                "email" => "j.vitor.moura.37@gmail.com",
                "cpf" => "47608923895",
                "data_nasc" => '1999-11-29',
                "logradouro" => "Rua Inamar N° 25",
                "bairro" => "Diadema",
                "cep" => "09970-342",
                "celular" => "11988745706",
                "cnpj" => "05680926000199",
                "razao_social" => "FOUNDCARE",
                "coren" => "24115871"
            ]);
        }
    }
}
