<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id('idAnuncios');
            $table->string('titulo');
            $table->text('descricao');
            $table->foreignId('id_profissional') // Apenas esta linha é suficiente
                  ->constrained('profissionais')
                  ->onDelete('cascade'); // Remove os anúncios se o profissional for excluído
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
