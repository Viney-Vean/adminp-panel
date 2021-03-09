<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id', 'branch_fk_3332241')->references('id')->on('branches');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id', 'gender_fk_3342595')->references('id')->on('options');
            $table->unsignedBigInteger('customer_type_id')->nullable();
            $table->foreign('customer_type_id', 'customer_type_fk_3342596')->references('id')->on('options');
            $table->unsignedBigInteger('resident_status_id')->nullable();
            $table->foreign('resident_status_id', 'resident_status_fk_3342597')->references('id')->on('options');
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->foreign('education_level_id', 'education_level_fk_3342598')->references('id')->on('options');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->foreign('officer_id', 'officer_fk_3342599')->references('id')->on('options');
        });
    }
}
