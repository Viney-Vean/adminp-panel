<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3296761')->references('id')->on('branches');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_3296762')->references('id')->on('customers');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_fk_3296994')->references('id')->on('currencies');
            $table->unsignedBigInteger('loan_product_id')->nullable();
            $table->foreign('loan_product_id', 'loan_product_fk_3296995')->references('id')->on('loan_products');
        });
    }
}
