<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en')->unique();
            $table->string('name_lc')->nullable();
            $table->string('business_type')->nullable();
            $table->string('industry')->nullable();
            $table->string('title')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('job_title')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('mobile_phone_1')->nullable();
            $table->string('mobile_phone_2')->nullable();
            $table->string('cp_email')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
