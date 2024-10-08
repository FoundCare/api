<?php

namespace Database\Seeders;

use App\Models\Profissional;
use App\Models\User; // Importar a classe User
use Illuminate\Database\Seeder;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa a tabela profissionais
        Profissional::truncate();

        // Busca ou cria um usuário para associar
        $users = User::all();
        if ($users->isEmpty()) {
            $user = User::create([
                'name' => 'Usuário de Exemplo',
                'email' => 'exemplo@teste.com',
                'data_nasc' => '1999-o1-o1',
                'password' => bcrypt('senha123'),
            ]);
        } else {
            $user = $users->random(); // Escolhe um usuário aleatório para associar
        }

        // Lista de profissionais
        $profissionais = [
            [
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
                "coren" => "2415876",
                "user_id" => 1
            ],
            [
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
                "coren" => "24154875",
                "user_id" => 2
            ],
            [
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
                "coren" => "24155874",
                "user_id" => 3
            ],
            [
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
                "coren" => "24157873",
                "user_id" => 4
            ],
            [
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
                "coren" => "24154872",
                "user_id" => 5
            ],
        ];

        foreach ($profissionais as $profissionalData) {
            // Cria um novo usuário
            $user = User::create([
                'name' => $profissionalData['name'],
                'email' => $profissionalData['email'],
                'data_nasc' => $profissionalData['data_nasc'], 
                'cpf' => $profissionalData['cpf'], // Inclua o CPF aqui
                'password' => bcrypt('senha123'), // Ou outra lógica de senha
                'id_endereco' => $profissionalData['id_endereco'], // Inclua o id_endereco aqui
            ]);
    
            // Cria o profissional associado ao usuário
            Profissional::create(array_merge($profissionalData, ['user_id' => $user->id]));
        }
    }
}
