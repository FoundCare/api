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
            $table->string('cnpj');
            $table->string('razao_social');
            $table->enum('status_validacao', ['pendente', 'negado', 'aprovado'])->default('pendente');
            $table->foreignId('user_id')->constrained('users')->unique(); // Chave estrangeira para 'users'
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
