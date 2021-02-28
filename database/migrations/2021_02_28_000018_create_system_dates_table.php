<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemDatesTable extends Migration
{
    public function up()
    {
        Schema::create('system_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('current_system_date')->nullable();
            $table->date('next_system_date')->nullable();
            $table->date('next_week_end')->nullable();
            $table->date('next_month_end')->nullable();
            $table->date('next_year_end')->nullable();
            $table->date('previous_year_end')->nullable();
            $table->date('previous_month_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
