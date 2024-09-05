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
                "name" => "Jefferson",
                "email" => "matheusdesenvolvedor011@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'ruansilva1404@gmail.com')->first()){
            User::create([
                "name" => "Ruan",
                "email" => "ruansilva1404@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'geovannasilvasousa2@gmail.com')->first()){
            User::create([
                "name" => "Geovanna",
                "email" => "geovannasilvasousa2@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'arthuralexandredealmeida@gmail.com')->first()){
            User::create([
                "name" => "Arthur",
                "email" => "arthuralexandredealmeida@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            User::create([
                "name" => "João",
                "email" => "j.vitor.moura.37@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'j.vitor.moura.37@gmail.com')->first()){
            User::create([
                "name" => "Italo",
                "email" => "j.vitor.moura.37@gmail.com",
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
    }
}
