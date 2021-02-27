<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293916')->references('id')->on('branches');
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->foreign('chart_of_account_id', 'chart_of_account_fk_3294053')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294055')->references('id')->on('currencies');
            $table->unsignedBigInteger('account_product_id')->nullable();
            $table->foreign('account_product_id', 'account_product_fk_3294056')->references('id')->on('account_products');
        });
    }
}
