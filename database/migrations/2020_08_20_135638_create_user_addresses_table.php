<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Lista de estados do Brasil
     *
     * @var array
     */
    private $statesAllowed = [
        "AC", "AL", "AP", "AM",
        "BA", "CE", "DF", "ES",
        "GO", "MA", "MT", "MS",
        "MG", "PA", "PB", "PR",
        "PE", "PI", "RJ", "RN",
        "RS", "RO", "RR", "SC",
        "SP", "SE", "TO",
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street_name')->comment('Nome da rua');
            $table->string('street_number', 10)->default('S/N')->comment('Número da casa');
            $table->string('complement')->nullable()->comment('Complemento da casa');
            $table->string('neighborhood')->comment('Bairro do endereço');
            $table->string('city')->comment('Nome da cidade do endereço');
            $table->enum('state', $this->statesAllowed)->comment('Sigla de dois dígitos referente ao ');
            $table->unsignedBigInteger('user_id')->index();
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
        Schema::dropIfExists('user_addresses');
    }
}
