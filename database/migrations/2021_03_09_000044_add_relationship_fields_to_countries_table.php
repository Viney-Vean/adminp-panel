<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCountriesTable extends Migration
{
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3378247')->references('id')->on('branches');
            $table->unsignedBigInteger('country_code_id')->nullable();
            $table->foreign('country_code_id', 'country_code_fk_3378248')->references('id')->on('branches');
        });
    }
}
