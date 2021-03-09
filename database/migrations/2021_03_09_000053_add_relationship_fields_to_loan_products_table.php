<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoanProductsTable extends Migration
{
    public function up()
    {
        Schema::table('loan_products', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294201')->references('id')->on('branches');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294202')->references('id')->on('currencies');
            $table->unsignedBigInteger('fee_earn_coa_id')->nullable();
            $table->foreign('fee_earn_coa_id', 'fee_earn_coa_fk_3294203')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('fee_unearn_coa_id')->nullable();
            $table->foreign('fee_unearn_coa_id', 'fee_unearn_coa_fk_3294204')->references('id')->on('chart_of_accounts');
        });
    }
}
