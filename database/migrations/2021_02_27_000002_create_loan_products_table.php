<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanProductsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('repayment_method')->nullable();
            $table->integer('day_basis_top_side')->nullable();
            $table->integer('day_basis_down_side')->nullable();
            $table->integer('minimum_age')->nullable();
            $table->integer('maximum_age')->nullable();
            $table->float('min_interest_rate', 20, 9)->nullable();
            $table->float('max_interest_rate', 20, 9)->nullable();
            $table->float('minimum_amount', 20, 9)->nullable();
            $table->float('maximum_amount', 20, 9)->nullable();
            $table->integer('minimum_term_monthly')->nullable();
            $table->integer('maximum_term_monthly')->nullable();
            $table->integer('minimum_term_weekly')->nullable();
            $table->integer('maximum_term_weekly')->nullable();
            $table->integer('minimum_term_daily')->nullable();
            $table->integer('maximum_term_daily')->nullable();
            $table->string('reduce_base_on')->nullable();
            $table->float('max_reduce_percentage', 20, 9)->nullable();
            $table->string('penalty_reduction_base_on')->nullable();
            $table->float('max_penalty_reduce_percentage', 20, 9)->nullable();
            $table->string('admin_fee_base_on')->nullable();
            $table->float('admin_fee_amount', 20, 9)->nullable();
            $table->string('admin_fee_accrual')->nullable();
            $table->string('regular_fee_base_on')->nullable();
            $table->float('regular_fee_amount', 20, 9)->nullable();
            $table->string('regular_fee_accual')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
