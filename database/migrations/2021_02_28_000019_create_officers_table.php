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
            $table->string('title');
            $table->string('gender');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->date('date_employ');
            $table->string('department');
            $table->string('report_to')->nullable();
            $table->string('active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
