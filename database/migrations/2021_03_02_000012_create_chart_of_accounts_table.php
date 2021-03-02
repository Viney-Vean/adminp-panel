<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartOfAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_title')->nullable();
            $table->string('classification')->nullable();
            $table->string('posting_side')->nullable();
            $table->string('balance_side')->nullable();
            $table->string('allow_posting')->nullable();
            $table->string('allow_direct_posting')->nullable();
            $table->string('active')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
