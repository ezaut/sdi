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
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id();
            $table->string('grupo', 100)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->string('link_documento', 100)->nullable();
            $table->integer('pontos')->unsigned()->nullable()->default(0);
            $table->boolean('valido_invalido')->nullable()->default(false);
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculos');
    }
};
