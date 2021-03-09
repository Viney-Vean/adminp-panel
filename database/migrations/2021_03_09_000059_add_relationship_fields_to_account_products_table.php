<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountProductsTable extends Migration
{
    public function up()
    {
        Schema::table('account_products', function (Blueprint $table) {
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->foreign('chart_of_account_id', 'chart_of_account_fk_3294089')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('account_product_type_id')->nullable();
            $table->foreign('account_product_type_id', 'account_product_type_fk_3294090')->references('id')->on('account_product_types');
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->foreign('account_type_id', 'account_type_fk_3294113')->references('id')->on('account_types');
        });
    }
}
