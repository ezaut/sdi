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
        Schema::create('editals', function (Blueprint $table) {
            $table->bigIncrements('id_edital');
            $table->string('nome_edital', 100);
            $table->date('dt_inicio');
            $table->date('dt_fim');
            $table->foreignId('inscricao_id')->constrained( table: 'inscricao_curriculos_users_editals', indexName: 'editals_inscricao_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editals');
    }
};
