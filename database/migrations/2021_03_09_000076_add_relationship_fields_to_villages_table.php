<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVillagesTable extends Migration
{
    public function up()
    {
        Schema::table('villages', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3378349')->references('id')->on('branches');
            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id', 'commune_fk_3378350')->references('id')->on('communes');
        });
    }
}
