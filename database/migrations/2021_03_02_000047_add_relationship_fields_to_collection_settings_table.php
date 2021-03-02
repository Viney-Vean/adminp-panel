<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCollectionSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('collection_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293900')->references('id')->on('branches');
        });
    }
}
