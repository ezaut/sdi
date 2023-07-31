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
        Schema::create('pontuacoes', function (Blueprint $table) {
            $table->bigIncrements('id_pontuacao');
            $table->string('grupo', 100);
            $table->integer('pontos')->unsigned()->default(10);
            $table->string('descricao', 100);
            $table->foreignId('id_ofertas')->constrained( table: 'ofertas', indexName: 'pontuacoes_id_ofertas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontuacoes');
    }
};
