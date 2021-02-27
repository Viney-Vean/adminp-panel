<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chart_of_account')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('transaction_code')->nullable();
            $table->string('operation')->nullable();
            $table->string('module_type')->nullable();
            $table->string('reference')->nullable();
            $table->string('loan_reference')->nullable();
            $table->string('note')->nullable();
            $table->float('amount', 20, 9)->nullable();
            $table->float('lcy_amount', 20, 9)->nullable();
            $table->string('debit_credit')->nullable();
            $table->timestamps();
        });
    }
}
