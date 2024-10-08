<?php

use App\Models\Anuncio;
use App\Models\Profissional;
use App\Models\Paciente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cria a tabela e define todas as colunas e chaves estrangeiras
        Schema::create('historico_de_profissionais', function (Blueprint $table) {
            $table->id("id_historico_profissional");

            // Foreign keys
            $table->foreignIdFor(Paciente::class, "id_paciente")->constrained()->onDelete('cascade');
            $table->foreignIdFor(Anuncio::class, "id_anuncio")->constrained()->onDelete('cascade');
            $table->foreignIdFor(Profissional::class,"id_profissional")->constrained()->onDelete('cascade');

            // Outros campos
            $table->date("data_contato")->default(Carbon::now()->toDateString());

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deleta a tabela
        Schema::dropIfExists('historico_de_profissionais');
    }
};
