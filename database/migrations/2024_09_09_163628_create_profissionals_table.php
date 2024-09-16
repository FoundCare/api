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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->date('data_nasc');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cep');
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->string('coren')->unique();
            $table->enum('status_validacao', ['pendente', 'negado', 'aprovado'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
