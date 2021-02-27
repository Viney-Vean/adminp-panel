<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293903')->references('id')->on('branches');
            $table->unsignedBigInteger('defualt_branch_id')->nullable();
            $table->foreign('defualt_branch_id', 'defualt_branch_fk_3293905')->references('id')->on('branches');
        });
    }
}
