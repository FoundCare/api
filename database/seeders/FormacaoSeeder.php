<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Formacao;

class FormacaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('formacaos')->insert([
            'formacao' => 'Técnico em enfermagem',
            'descricao' => 'Fiz na instituição xxx, possuo muita experiência',
            'data_inicio' => '2018-01-15',
            'data_termino' => '2021-12-10',
            'token_certificado' => 'TOKEN123456',
            'id_profissional' => 1,
        ]);

    }
}
