<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->unique();
            $table->float('buy_rate', 20, 9)->nullable();
            $table->float('sell_rate', 20, 9)->nullable();
            $table->string('rnd_mode')->nullable();
            $table->integer('minimum_unit')->nullable();
            $table->integer('decimal_place')->nullable();
            $table->string('currency_sign')->nullable();
            $table->float('revaluation_rate', 20, 9)->nullable();
            $table->float('other_rate', 20, 9)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
