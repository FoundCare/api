<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->bigIncrements('id_anuncios');  // BIGINT UNSIGNED por padrão
            $table->string('titulo');
            $table->text('descricao');

            // Define o campo id_profissional como unsignedBigInteger
            $table->unsignedBigInteger('id_profissional');

            // Adiciona a FK para a tabela profissionais
            $table->foreign('id_profissional')
                  ->references('id_profissional')->on('profissionais')
                  ->onDelete('cascade');  // Cascade delete

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
