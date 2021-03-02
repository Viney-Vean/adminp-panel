<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->float('approve_amount', 20, 9)->nullable();
            $table->float('disburse_amount', 20, 9)->nullable();
            $table->float('outstanding', 20, 9)->nullable();
            $table->float('balance', 20, 9)->nullable();
            $table->date('transaction_date')->nullable();
            $table->date('maturity_date')->nullable();
            $table->float('interest_rate', 5, 2)->nullable();
            $table->string('repayment_method')->nullable();
            $table->string('repayment_frequency')->nullable();
            $table->integer('frequency')->nullable();
            $table->integer('term')->nullable();
            $table->integer('installment')->nullable();
            $table->date('first_collection_date')->nullable();
            $table->string('contract_type')->nullable();
            $table->float('total_interest', 20, 9)->nullable();
            $table->integer('accrue_interest_per_day')->nullable();
            $table->float('interest_income_earn', 20, 9)->nullable();
            $table->float('accrue_interest_receivable', 20, 9)->nullable();
            $table->float('accrue_interest_current_installment', 20, 9)->nullable();
            $table->float('accrue_interest_current_month', 20, 9)->nullable();
            $table->float('accrue_interest_previous_month', 20, 9)->nullable();
            $table->float('accrue_regular_fee_per_day', 20, 9)->nullable();
            $table->float('accrue_regular_fee_receivable', 20, 9)->nullable();
            $table->float('accrue_regular_fee_current_installment', 20, 9)->nullable();
            $table->float('accrue_regular_fee_current_month', 20, 9)->nullable();
            $table->float('accrue_regular_fee_prev_month', 20, 9)->nullable();
            $table->float('admin_fee_earn', 20, 9)->nullable();
            $table->float('admin_fee_unearn', 20, 9)->nullable();
            $table->float('admin_fee_per_day', 20, 9)->nullable();
            $table->date('next_run_date')->nullable();
            $table->float('principal_due', 20, 9)->nullable();
            $table->string('more_than_one_year')->nullable();
            $table->float('interest_due', 20, 9)->nullable();
            $table->float('charge_due', 20, 9)->nullable();
            $table->float('penalty_due', 20, 9)->nullable();
            $table->integer('total_overdue')->nullable();
            $table->integer('num_day_due')->nullable();
            $table->float('provision_amount', 20, 9)->nullable();
            $table->float('provision_amount_lcy', 20, 9)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
