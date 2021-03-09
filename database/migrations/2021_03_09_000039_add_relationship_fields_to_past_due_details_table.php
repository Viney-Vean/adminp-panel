<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPastDueDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('past_due_details', function (Blueprint $table) {
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->foreign('schedule_id', 'schedule_fk_3335045')->references('id')->on('schedules');
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id', 'contract_fk_3335046')->references('id')->on('contracts');
        });
    }
}
