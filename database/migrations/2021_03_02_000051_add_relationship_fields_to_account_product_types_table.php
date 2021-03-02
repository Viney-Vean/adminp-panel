<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountProductTypesTable extends Migration
{
    public function up()
    {
        Schema::table('account_product_types', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_3294065')->references('id')->on('branches');
        });
    }
}
