<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoveriesTable extends Migration
{
    public function up()
    {
        Schema::create('recoveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('loan')->nullable();
            $table->string('description')->nullable();
            $table->float('recovery_amount', 20, 9)->nullable();
            $table->date('recovery_date')->nullable();
            $table->float('principal_amount', 20, 9)->nullable();
            $table->float('interest_amount', 20, 9)->nullable();
            $table->float('charge_amount', 20, 9)->nullable();
            $table->float('penalty_amount', 20, 9)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
