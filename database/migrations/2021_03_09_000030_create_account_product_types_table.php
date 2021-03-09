<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountProductTypesTable extends Migration
{
    public function up()
    {
        Schema::create('account_product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->unique();
            $table->string('account_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
