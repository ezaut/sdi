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
        Schema::create('inscricao_curriculos_users_editals', function (Blueprint $table) {
            $table->bigIncrements('inscricao_id');
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
        Schema::dropIfExists('inscricao_curriculos_users_editals');
    }
};
