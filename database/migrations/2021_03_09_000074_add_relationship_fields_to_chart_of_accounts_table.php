<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChartOfAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('chart_of_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293942')->references('id')->on('branches');
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->foreign('account_type_id', 'account_type_fk_3293973')->references('id')->on('account_types');
            $table->unsignedBigInteger('main_account_id')->nullable();
            $table->foreign('main_account_id', 'main_account_fk_3293975')->references('id')->on('chart_of_accounts');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3294025')->references('id')->on('currencies');
        });
    }
}
