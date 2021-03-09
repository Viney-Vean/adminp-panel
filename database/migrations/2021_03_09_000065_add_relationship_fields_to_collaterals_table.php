<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCollateralsTable extends Migration
{
    public function up()
    {
        Schema::table('collaterals', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_3294250')->references('id')->on('customers');
            $table->unsignedBigInteger('collateral_type_id')->nullable();
            $table->foreign('collateral_type_id', 'collateral_type_fk_3378538')->references('id')->on('options');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_3378539')->references('id')->on('currencies');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_3378540')->references('id')->on('provinces');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id', 'district_fk_3378541')->references('id')->on('districts');
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id', 'commune_fk_3378542')->references('id')->on('communes');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id', 'village_fk_3378543')->references('id')->on('villages');
        });
    }
}
