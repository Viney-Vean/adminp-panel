<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWriteOffsTable extends Migration
{
    public function up()
    {
        Schema::table('write_offs', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294642')->references('id')->on('branches');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294643')->references('id')->on('currencies');
            $table->unsignedBigInteger('dd_account_id')->nullable();
            $table->foreign('dd_account_id', 'dd_account_fk_3294644')->references('id')->on('accounts');
        });
    }
}
