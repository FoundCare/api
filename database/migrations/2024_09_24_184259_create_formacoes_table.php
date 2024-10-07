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
        Schema::create('formacoes', function (Blueprint $table) {
            $table->id("id_formacao");
            $table->string('formacao');
            $table->text('descricao');
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->string('token_certificado')->nullable();
            $table->integer('id_profissional');
            $table->foreign('id_profissional')->references('id_profissional')->on('profissionais');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacoes');
    }
};
