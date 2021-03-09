<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('principal_collection')->nullable();
            $table->string('interest_collection')->nullable();
            $table->string('admin_fee_collection')->nullable();
            $table->string('pd_principal_collection')->nullable();
            $table->string('pd_interest_collection')->nullable();
            $table->string('charge_collection')->nullable();
            $table->string('penalty_collection')->nullable();
            $table->string('loan_accrual_interest')->nullable();
            $table->string('amendment_add_principal')->nullable();
            $table->string('amendment_duduct_principal')->nullable();
            $table->string('terminate')->nullable();
            $table->string('write_off_charge')->nullable();
            $table->string('write_off_penalty')->nullable();
            $table->string('write_off_interest')->nullable();
            $table->string('write_off_principal')->nullable();
            $table->string('waive_charge')->nullable();
            $table->string('waive_penalty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
