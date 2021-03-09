<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id', 'branch_fk_3332241')->references('id')->on('branches');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id', 'gender_fk_3342595')->references('id')->on('options');
            $table->unsignedBigInteger('customer_type_id')->nullable();
            $table->foreign('customer_type_id', 'customer_type_fk_3342596')->references('id')->on('options');
            $table->unsignedBigInteger('resident_status_id')->nullable();
            $table->foreign('resident_status_id', 'resident_status_fk_3342597')->references('id')->on('options');
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->foreign('education_level_id', 'education_level_fk_3342598')->references('id')->on('options');
            $table->unsignedBigInteger('officer_id')->nullable();
            $table->foreign('officer_id', 'officer_fk_3342599')->references('id')->on('options');
            $table->unsignedBigInteger('country_of_birth_id')->nullable();
            $table->foreign('country_of_birth_id', 'country_of_birth_fk_3378415')->references('id')->on('countries');
            $table->unsignedBigInteger('province_of_birth_id')->nullable();
            $table->foreign('province_of_birth_id', 'province_of_birth_fk_3378416')->references('id')->on('provinces');
            $table->unsignedBigInteger('district_of_birth_id')->nullable();
            $table->foreign('district_of_birth_id', 'district_of_birth_fk_3378417')->references('id')->on('districts');
            $table->unsignedBigInteger('commune_of_birth_id')->nullable();
            $table->foreign('commune_of_birth_id', 'commune_of_birth_fk_3378418')->references('id')->on('communes');
            $table->unsignedBigInteger('village_of_birth_id')->nullable();
            $table->foreign('village_of_birth_id', 'village_of_birth_fk_3378419')->references('id')->on('villages');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'province_fk_3378519')->references('id')->on('provinces');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id', 'district_fk_3378520')->references('id')->on('districts');
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id', 'commune_fk_3378521')->references('id')->on('communes');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id', 'village_fk_3378522')->references('id')->on('villages');
            $table->unsignedBigInteger('company_country_id')->nullable();
            $table->foreign('company_country_id', 'company_country_fk_3378524')->references('id')->on('countries');
            $table->unsignedBigInteger('company_province_id')->nullable();
            $table->foreign('company_province_id', 'company_province_fk_3378525')->references('id')->on('provinces');
            $table->unsignedBigInteger('company_district_id')->nullable();
            $table->foreign('company_district_id', 'company_district_fk_3378526')->references('id')->on('districts');
            $table->unsignedBigInteger('company_commune_id')->nullable();
            $table->foreign('company_commune_id', 'company_commune_fk_3378527')->references('id')->on('communes');
            $table->unsignedBigInteger('company_village_id')->nullable();
            $table->foreign('company_village_id', 'company_village_fk_3378528')->references('id')->on('villages');
            $table->unsignedBigInteger('company_currency_id')->nullable();
            $table->foreign('company_currency_id', 'company_currency_fk_3378530')->references('id')->on('currencies');
            $table->unsignedBigInteger('family_id_type_id')->nullable();
            $table->foreign('family_id_type_id', 'family_id_type_fk_3378646')->references('id')->on('options');
        });
    }
}
