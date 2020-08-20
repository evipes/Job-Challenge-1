<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['cpf', 'cnpj'])->comment('Tipo do documento');
            $table->string('number')->comment('Somente números do documento.');
            $table->unsignedBigInteger('user_id')->index()->comment('Referencia o ID do usuário dono deste documento.');
            $table->timestamps();

            # Chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_documents');
    }
}
