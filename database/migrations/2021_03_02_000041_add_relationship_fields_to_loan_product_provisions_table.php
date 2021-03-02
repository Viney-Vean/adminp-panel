<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoanProductProvisionsTable extends Migration
{
    public function up()
    {
        Schema::table('loan_product_provisions', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294207')->references('id')->on('branches');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_3294208')->references('id')->on('loan_products');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id', 'class_fk_3294209')->references('id')->on('provisions');
            $table->unsignedBigInteger('outstanding_coa_id');
            $table->foreign('outstanding_coa_id', 'outstanding_coa_fk_3294210')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('air_coa_id');
            $table->foreign('air_coa_id', 'air_coa_fk_3294211')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('int_income_coa_id');
            $table->foreign('int_income_coa_id', 'int_income_coa_fk_3294212')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('interest_in_suspend_coa_id');
            $table->foreign('interest_in_suspend_coa_id', 'interest_in_suspend_coa_fk_3294213')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('provision_expense_coa_id');
            $table->foreign('provision_expense_coa_id', 'provision_expense_coa_fk_3294214')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('provision_reserve_coa_id');
            $table->foreign('provision_reserve_coa_id', 'provision_reserve_coa_fk_3294215')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('penalty_coa_id');
            $table->foreign('penalty_coa_id', 'penalty_coa_fk_3294216')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('income_charge_coa_id');
            $table->foreign('income_charge_coa_id', 'income_charge_coa_fk_3294217')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('in_suspend_charge_coa_id');
            $table->foreign('in_suspend_charge_coa_id', 'in_suspend_charge_coa_fk_3294218')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('charge_receivable_coa_id');
            $table->foreign('charge_receivable_coa_id', 'charge_receivable_coa_fk_3294219')->references('id')->on('chart_of_accounts');
        });
    }
}
