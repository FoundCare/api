<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->bigIncrements('id_anuncios');
            $table->string('servicos');  // Alterado de 'titulo' para 'servicos'
            $table->text('descricao');

            $table->unsignedBigInteger('id_profissional');
            $table->foreign('id_profissional')
                  ->references('id_profissional')->on('profissionais')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
