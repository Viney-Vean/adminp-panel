<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollateralsTable extends Migration
{
    public function up()
    {
        Schema::create('collaterals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('collateral')->nullable();
            $table->string('collateral_type')->nullable();
            $table->string('currency')->nullable();
            $table->float('purchase_price', 20, 9)->nullable();
            $table->float('valuation_price', 20, 9)->nullable();
            $table->string('valuer')->nullable();
            $table->date('issued_date')->nullable();
            $table->date('issued_place')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('collateral_number')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();
            $table->date('received_date')->nullable();
            $table->date('withdrawal_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
