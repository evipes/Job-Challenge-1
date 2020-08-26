<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2)->comment('Valor da venda, pago pelo cliente.');
            $table->smallInteger('quantity')->comment('Quantidade de produtos à serem entregues, pago pelo cliente.');
            $table->enum('status', ['approved', 'rejected', 'pending'])->comment('Status do pagamento da transação.');
            $table->integer('installments')->comment('Número de parcelas que o cliente escolheu pagar.');
            $table->unsignedBigInteger('product_id')->index()->comment('ID referente à tabela de produtos.');
            $table->unsignedBigInteger('user_id')->index()->comment('ID referente à tabela de usuários. Usuário quem comprou.');
            $table->timestamps();

            # Chaves estrangeiras
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('sales');
    }
}
