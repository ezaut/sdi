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
        Schema::create('inscricao_curriculo_user_editals', function (Blueprint $table) {
            $table->bigIncrements('inscricao_id');
            $table->foreignId('id_edital')->constrained( table: 'editals', indexName: 'inscricao_curriculo_user_editals_id_edital');
            $table->foreignId('id_curriculo')->constrained( table: 'curriculos', indexName: 'inscricao_curriculo_user_editals_id_curriculo');
            $table->foreignId('cpf')->constrained( table: 'users', indexName: 'inscricao_curriculo_user_editals_cpf');
            $table->string('vaga_escolhida', 100)->nullable();
            $table->dateTime('dt_inscricao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao_curriculo_user_editals');
    }
};
