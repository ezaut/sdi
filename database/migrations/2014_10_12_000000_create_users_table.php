//database/migrations/create_users_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('cpf')->unsigned()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nome_mae', 100)->nullable();
            $table->date('dt_nascimento')->nullable();
            $table->string('escolaridade', 100)->nullable();
            $table->string('grupo', 100)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('cep')->length(10)->nullable();
            $table->integer('rg')->unsigned()->nullable();
            $table->string('org_exp')->nullable();
            $table->date('dt_emissao')->nullable();
            $table->string('telefone')->nullable();
            $table->char('sexo', 1 )->nullable();
            $table->boolean('type')->default(false); //add type boolean Users: 0=>User, 1=>Admin, 2=>Manager
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
