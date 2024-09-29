<?php

use App\Models\Anuncio;
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
        Schema::create('historico_de_profissionais', function (Blueprint $table) {
            $table->id("id_historico_profissional");
            //$table->foreignIdFor(Paciente::class, "id_paciente");
            //$table->foreignIdFor(Anuncio::class, "id_anuncio");
            $table->date("data_contato")->default(Carbon::now()->toDateString());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_de_profissionals');
    }
};
