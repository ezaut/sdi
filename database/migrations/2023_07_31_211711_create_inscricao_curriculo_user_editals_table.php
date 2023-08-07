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
            $table->id();
            $table->foreignId('edital_id')->constrained();
            $table->foreignId('curriculo_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
