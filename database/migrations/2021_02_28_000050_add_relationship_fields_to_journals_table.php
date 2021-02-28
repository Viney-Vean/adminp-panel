<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJournalsTable extends Migration
{
    public function up()
    {
        Schema::table('journals', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294245')->references('id')->on('branches');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_3294246')->references('id')->on('accounts');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294247')->references('id')->on('currencies');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id', 'class_fk_3294249')->references('id')->on('provisions');
        });
    }
}
