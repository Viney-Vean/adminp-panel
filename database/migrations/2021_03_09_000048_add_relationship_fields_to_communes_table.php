<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommunesTable extends Migration
{
    public function up()
    {
        Schema::table('communes', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3378340')->references('id')->on('branches');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id', 'district_fk_3378341')->references('id')->on('districts');
        });
    }
}
