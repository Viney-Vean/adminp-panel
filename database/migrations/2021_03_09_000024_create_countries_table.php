<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iso_2')->nullable();
            $table->string('iso_3')->nullable();
            $table->string('name_en')->unique();
            $table->string('name_lc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
