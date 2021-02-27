<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294272')->references('id')->on('branches');
            $table->unsignedBigInteger('loan_id')->nullable();
            $table->foreign('loan_id', 'loan_fk_3294273')->references('id')->on('contracts');
        });
    }
}
