<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsProductsTable extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_code', '6')->nullable()->after('id');
            $table->longText('description')->after('amount');
            $table->mediumText('tag_line')->after('description');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_code');
            $table->dropColumn('description');
            $table->dropColumn('tag_line');
        });
    }
}
