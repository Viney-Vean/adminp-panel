<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRecoveriesTable extends Migration
{
    public function up()
    {
        Schema::table('recoveries', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294274')->references('id')->on('branches');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294275')->references('id')->on('currencies');
            $table->unsignedBigInteger('dd_account_id')->nullable();
            $table->foreign('dd_account_id', 'dd_account_fk_3294276')->references('id')->on('accounts');
        });
    }
}
