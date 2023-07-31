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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id_ofertas');
            $table->string('curso', 100);
            $table->string('disciplina', 100);
            $table->integer('carga_horaria')->unsigned()->nullable()->default(60);
            $table->foreignId('id_edital')->constrained( table: 'editals', indexName: 'ofertas_id_edital');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
