<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $seeders = [
            ContatoSeeder::class,
            EnderecoSeeder::class,
            UserSeeder::class,
            PacienteSeeder::class,
            EspecialidadeSeeder::class
        ];

        $this->call($seeders);
    }
}
