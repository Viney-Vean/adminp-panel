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
        });
    }
}
