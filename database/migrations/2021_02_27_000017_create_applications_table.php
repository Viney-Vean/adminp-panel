<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->date('application_date')->nullable();
            $table->float('apply_amount', 15, 2);
            $table->float('approve_amount', 15, 2)->nullable();
            $table->string('repayment_method')->nullable();
            $table->string('repayment_frequency')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('term')->nullable();
            $table->integer('installment')->nullable();
            $table->float('interest_rate', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
