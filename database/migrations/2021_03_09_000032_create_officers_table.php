<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('given_name_en');
            $table->string('surname_en');
            $table->string('given_name_lc');
            $table->string('sur_name_en');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('active')->nullable();
            $table->string('gender');
            $table->string('id_card_number')->nullable();
            $table->date('employment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
