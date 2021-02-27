<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('account_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch')->nullable();
            $table->string('chart_of_account');
            $table->float('amount', 20, 9);
            $table->string('note')->nullable();
            $table->string('transaction_code')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('operation')->nullable();
            $table->string('reference')->nullable();
            $table->string('loan_reference')->nullable();
            $table->string('module_type')->nullable();
            $table->string('debit_credit');
            $table->timestamps();
        });
    }
}
