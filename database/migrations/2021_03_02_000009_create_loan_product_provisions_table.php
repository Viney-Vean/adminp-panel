<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanProductProvisionsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_product_provisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('more_than_one_year');
            $table->string('interest_income_recognition');
            $table->float('provision_booking', 5, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
