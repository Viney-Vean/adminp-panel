<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastDueDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('past_due_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('due_date')->nullable();
            $table->float('principal_due', 20, 9)->nullable();
            $table->float('out_principal', 20, 9)->nullable();
            $table->float('interest_due', 20, 9)->nullable();
            $table->float('out_interest', 20, 9)->nullable();
            $table->float('accrue_interest_out', 20, 9)->nullable();
            $table->float('charge_due', 20, 9)->nullable();
            $table->float('out_charge', 20, 9)->nullable();
            $table->float('penalty_due', 20, 9)->nullable();
            $table->float('out_penalty', 20, 9)->nullable();
            $table->integer('numday_due')->nullable();
            $table->string('status_due')->nullable();
            $table->float('collect_penalty_amount', 20, 9)->nullable();
            $table->float('collect_interest_amount', 20, 9)->nullable();
            $table->float('collect_charge_amount', 20, 9)->nullable();
            $table->float('waive_penalty_amount', 20, 9)->nullable();
            $table->float('waive_interest_amount', 20, 9)->nullable();
            $table->float('waive_charge_amount', 20, 9)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
