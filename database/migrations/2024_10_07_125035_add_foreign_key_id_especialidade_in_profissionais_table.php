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
        Schema::table('profissionais', function (Blueprint $table) {
            $table->integer("id_especialidade")->unsigned()->unique();
            $table->foreign("id_especialidade")->references("id_especialidade")->on("especialidades")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profissionais', function (Blueprint $table) {
            //
        });
    }
};
