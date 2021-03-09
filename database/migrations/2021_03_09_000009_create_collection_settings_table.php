<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('collection_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pre_grace')->nullable();
            $table->integer('grace')->nullable();
            $table->string('past_due')->nullable();
            $table->string('collection_order')->nullable();
            $table->string('terminate_insufficient_fund')->nullable();
            $table->string('penalty_collection_option')->nullable();
            $table->string('penalty_method')->nullable();
            $table->string('penalty_calculation_base')->nullable();
            $table->integer('max_day_penalty_calculation')->nullable();
            $table->string('write_off_class')->nullable();
            $table->string('pd_collection_method')->nullable();
            $table->string('pre_termination_option')->nullable();
            $table->string('pre_termination_duration')->nullable();
            $table->string('pre_terminationd_type')->nullable();
            $table->float('pre_termination_percentage', 15, 2)->nullable();
            $table->string('amend_deduct_option')->nullable();
            $table->float('amend_deduct_duration', 15, 2)->nullable();
            $table->string('amend_deductd_type')->nullable();
            $table->string('amend_deduct_percentage')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
