<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3297130')->references('id')->on('branches');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id', 'application_fk_3297209')->references('id')->on('applications');
            $table->unsignedBigInteger('dd_account_id')->nullable();
            $table->foreign('dd_account_id', 'dd_account_fk_3297210')->references('id')->on('accounts');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3297211')->references('id')->on('currencies');
            $table->unsignedBigInteger('loan_product_id')->nullable();
            $table->foreign('loan_product_id', 'loan_product_fk_3297212')->references('id')->on('loan_products');
            $table->unsignedBigInteger('provision_class_id')->nullable();
            $table->foreign('provision_class_id', 'provision_class_fk_3297227')->references('id')->on('provisions');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->foreign('officer_id', 'officer_fk_3297228')->references('id')->on('officers');
        });
    }
}
