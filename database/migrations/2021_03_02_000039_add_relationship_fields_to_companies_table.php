<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCompaniesTable extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3293867')->references('id')->on('branches');
        });
    }
}
