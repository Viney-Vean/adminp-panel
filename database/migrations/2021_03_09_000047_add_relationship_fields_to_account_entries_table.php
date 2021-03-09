<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('account_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_3294242')->references('id')->on('accounts');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_fk_3294243')->references('id')->on('currencies');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id', 'branch_fk_3331900')->references('id')->on('branches');
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->foreign('chart_of_account_id', 'chart_of_account_fk_3331901')->references('id')->on('chart_of_accounts');
        });
    }
}
