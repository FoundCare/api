<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Profissional;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id("id_anuncio");
            $table->string("titulo", 45);
            $table->string("descricao", 250);
            $table->foreignIdFor(Profissional::class, 'id_profissional')->constrained()->onDelete('cascade'); // Criação da chave estrangeira com constrains
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
