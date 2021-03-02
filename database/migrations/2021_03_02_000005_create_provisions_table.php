<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvisionsTable extends Migration
{
    public function up()
    {
        Schema::create('provisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class')->nullable();
            $table->string('class_title')->nullable();
            $table->integer('overdue_from')->nullable();
            $table->integer('overdue_to')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('more_than_one_year')->nullable();
            $table->string('interest_income_recognition')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
