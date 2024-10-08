<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Endereco;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enderecos = Endereco::all();

        if ($enderecos->isEmpty()) {
            throw new \Exception('Não existem endereços disponíveis para associar ao usuário.');
        }

        // Escolha um endereço aleatório
        $endereco = $enderecos->random();



        if(!User::where('email', 'matheusdesenvolvedor011@gmail.com')->first()){
            User::create([
                "name" => "Jefferson",
                "email" => "matheusdesenvolvedor011@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923890",
                "id_endereco" => 1,
                'password' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 1
            ]);
        }
        if(!User::where('email', 'ruansilva1404@gmail.com')->first()){
            User::create([
                "name" => "Ruan",
                "email" => "ruansilva1404@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923891",
                "id_endereco" => 2,
                'password' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 2
            ]);
        }
        if(!User::where('email', 'geovannasilvasousa2@gmail.com')->first()){
            User::create([
                "name" => "Geovanna",
                "email" => "geovannasilvasousa2@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923892",
                "id_endereco" => 3,
                'password' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 3
            ]);
        }
        if(!User::where('email', 'arthuralexandredealmeida@gmail.com')->first()){
            User::create([
                "name" => "Arthur",
                "email" => "arthuralexandredealmeida@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923893",
                "id_endereco" => 4,
                'password' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 4
            ]);
        }
        if(!User::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            User::create([
                "name" => "João",
                "email" => "j.vitor.moura.37@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923894",
                "id_endereco" => 5,
                'password' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 5
            ]);
        }
        
    }
}
