<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProvincesTable extends Migration
{
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3378257')->references('id')->on('branches');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_fk_3378338')->references('id')->on('countries');
        });
    }
}
