<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'matheusdesenvolvedor011@gmail.com')->first()){
            User::create([
                "nome" => "Jefferson Oliveira",
                "email" => "matheusdesenvolvedor011@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923890",
                "id_endereco" => 1,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 1
            ]);
        }
        if(!User::where('email', 'ruansilva1404@gmail.com')->first()){
            User::create([
                "nome" => "Ruan Luna",
                "email" => "ruansilva1404@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923891",
                "id_endereco" => 2,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 2
            ]);
        }
        if(!User::where('email', 'geovannasilvasousa2@gmail.com')->first()){
            User::create([
                "nome" => "Geovanna Silva",
                "email" => "geovannasilvasousa2@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923892",
                "id_endereco" => 3,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 3
            ]);
        }
        if(!User::where('email', 'arthuralexandredealmeida@gmail.com')->first()){
            User::create([
                "nome" => "Arthur Alexandre",
                "email" => "arthuralexandredealmeida@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923893",
                "id_endereco" => 4,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 4
            ]);
        }
        if(!User::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            User::create([
                "nome" => "João Vitor",
                "email" => "j.vitor.moura.37@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923894",
                "id_endereco" => 5,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 5
            ]);
        }
        if(!User::where('email', 'italo.etec.sp@gmail.com')->first()){
            User::create([
                "nome" => "Italo de Sa",
                "email" => "italo.etec.sp@gmail.com",
                'data_nasc' => "1999-11-29",
                "cpf" => "47608923895",
                "id_endereco" => 6,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 6
            ]);
        }
        if(!User::where('email', 'stellalmeida@gmail.com')->first()){
            User::create([
                "nome" => "Stella Almeida",
                "email" => "stellalmeida@gmail.com",
                'data_nasc' => "2004-05-20",
                "cpf" => "39056855595",
                "id_endereco" => 7,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 7
            ]);
        }
        if(!User::where('email', 'noemigoncalves@gmail.com')->first()){
            User::create([
                "nome" => "Noemi Goncalves",
                "email" => "noemigoncalves@gmail.com",
                'data_nasc' => "1967-03-01",
                "cpf" => "39053652515",
                "id_endereco" => 8,
                'senha' => Hash::make('123456', ['rounds' => 12]),
                "id_contato" => 8
            ]);
        }
    }
}
