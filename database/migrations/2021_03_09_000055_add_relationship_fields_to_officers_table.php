<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOfficersTable extends Migration
{
    public function up()
    {
        Schema::table('officers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_3290519')->references('id')->on('users');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293895')->references('id')->on('branches');
            $table->unsignedBigInteger('report_to_id')->nullable();
            $table->foreign('report_to_id', 'report_to_fk_3337337')->references('id')->on('officers');
            $table->unsignedBigInteger('salutation_id')->nullable();
            $table->foreign('salutation_id', 'salutation_fk_3337347')->references('id')->on('options');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id', 'unit_fk_3337348')->references('id')->on('options');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_3337349')->references('id')->on('options');
        });
    }
}
