<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentsTable extends Migration
{

    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->morphs('documentable');
            $table->enum('type', ['cpf', 'cnpj'])->comment('Tipo do documento');
            $table->string('number')->comment('Somente números do documento.');

            $table->timestamps();


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
