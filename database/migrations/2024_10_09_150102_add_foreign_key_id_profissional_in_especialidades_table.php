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
        Schema::table('especialidades', function (Blueprint $table) {
            $table->integer("id_profissional")->unsigned();
            $table->foreign("id_profissional")->references("id_profissional")->on("profissionais");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('especialidades', function (Blueprint $table) {
            //
        });
    }
};
