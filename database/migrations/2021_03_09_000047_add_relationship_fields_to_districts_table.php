<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDistrictsTable extends Migration
{
    public function up()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3378318')->references('id')->on('branches');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id', 'province_fk_3378319')->references('id')->on('provinces');
        });
    }
}
