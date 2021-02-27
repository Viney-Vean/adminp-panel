<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer')->nullable();
            $table->string('account_name');
            $table->date('open_date')->nullable();
            $table->integer('balance')->nullable();
            $table->float('available_bal', 20, 10)->nullable();
            $table->string('account_status')->nullable();
            $table->float('blocked_bal', 20, 10)->nullable();
            $table->date('closing_date')->nullable();
            $table->string('block')->nullable();
            $table->string('block_reason')->nullable();
            $table->string('type')->nullable();
            $table->string('balance_side')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
