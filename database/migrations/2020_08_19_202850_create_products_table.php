<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index()->comment('Código do produto, pelo qual será procurado.');
            $table->string('name')->comment('Nome do produto, informado pelo vendedor.');
            $table->decimal('amount', 10, 2)->comment('Valor do produto em reais.');
            $table->unsignedBigInteger('user_id')->index()->comment('ID referente ao usuário dono do produto.');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
