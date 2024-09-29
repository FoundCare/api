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
        Schema::table('historico_de_profissionais', function (Blueprint $table) {
            $table->integer("id_paciente")->unsigned();
            $table->foreign("id_paciente")->references("id_paciente")->on("pacientes")->onDelete("cascade");
            $table->integer("id_anuncio")->unsigned();
            $table->foreign("id_anuncio")->references("id_anuncio")->on("anuncios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historico_de_profissionais', function (Blueprint $table) {
            //
        });
    }
};
