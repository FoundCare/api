<?php

use App\Models\User;
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
            $table->id('id_profissional');
            $table->unsignedBigInteger('id_usuario')->unique(); // Certifique-se de usar 'unsignedBigInteger'
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('cnpj');
            $table->string('razao_social');
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
