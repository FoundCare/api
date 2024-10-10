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
            $table->integer('id_usuario')->unsigned()->unique();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->string('coren')->unique();
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
