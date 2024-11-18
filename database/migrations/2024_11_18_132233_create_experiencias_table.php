<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id('id_experiencia')->unsigned();
            $table->string('empresa', 80);
            $table->string('cargo', 40);
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->integer('id_profissional');
            $table->foreign('id_profissional')->references('id_profissional')->on('profissionais');
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};
