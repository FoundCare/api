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
        Schema::table('users', function (Blueprint $table) {
            $table->integer("id_endereco")->unsigned();
            $table->foreign("id_endereco")->references("id_endereco")->on("enderecos")->onDelete("cascade");
            $table->integer("id_contato")->unsigned();
            $table->foreign("id_contato")->references("id_contato")->on("contatos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
