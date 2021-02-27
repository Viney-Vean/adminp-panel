<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no')->nullable();
            $table->date('collection_date')->nullable();
            $table->float('principal', 20, 2)->nullable();
            $table->float('interest', 20, 2)->nullable();
            $table->float('charge', 20, 2)->nullable();
            $table->float('penalty', 20, 2)->nullable();
            $table->float('balance', 20, 2)->nullable();
            $table->integer('num_day')->nullable();
            $table->float('total_amount', 20, 2)->nullable();
            $table->float('paid_amount', 20, 2)->nullable();
            $table->float('waive_interest', 20, 2)->nullable();
            $table->float('waive_charge', 20, 2)->nullable();
            $table->float('waive_penalty', 20, 2)->nullable();
            $table->string('schedule_saved')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
