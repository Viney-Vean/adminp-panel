<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriteOffsTable extends Migration
{
    public function up()
    {
        Schema::create('write_offs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contract')->nullable();
            $table->float('approve_amount', 20, 9)->nullable();
            $table->float('disburse_amount', 20, 9)->nullable();
            $table->float('balance', 20, 9)->nullable();
            $table->float('accrue_interest_current_installment', 20, 9)->nullable();
            $table->float('principal_due', 20, 9)->nullable();
            $table->float('interest_due', 20, 9)->nullable();
            $table->float('charge_due', 20, 9)->nullable();
            $table->float('penalty_due', 20, 9)->nullable();
            $table->float('orig_balance', 20, 9)->nullable();
            $table->float('orig_accrue_interest_current_installment', 20, 9)->nullable();
            $table->float('orig_charge', 20, 9)->nullable();
            $table->float('orig_principal_due', 20, 9)->nullable();
            $table->float('orig_interest_due', 20, 9)->nullable();
            $table->float('orig_charge_due', 20, 9)->nullable();
            $table->float('orig_penalty_due', 20, 9)->nullable();
            $table->date('write_off_date')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
