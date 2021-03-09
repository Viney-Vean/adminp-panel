<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('given_name_en');
            $table->string('surname_en');
            $table->string('given_name_lc')->nullable();
            $table->string('surname_lc')->nullable();
            $table->string('title');
            $table->date('date_of_birth');
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->longText('location_mapping')->nullable();
            $table->string('family_given_name_en')->nullable();
            $table->string('family_surname_en')->nullable();
            $table->string('family_given_name_lc')->nullable();
            $table->string('family_surname_lc')->nullable();
            $table->date('family_date_of_birth')->nullable();
            $table->string('family_nationality')->nullable();
            $table->string('family_id_number')->nullable();
            $table->string('family_issue_place')->nullable();
            $table->string('spouse_employment')->nullable();
            $table->string('family_phone_1')->nullable();
            $table->string('family_phone_2')->nullable();
            $table->string('house_ownership')->nullable();
            $table->integer('family_member')->nullable();
            $table->string('active_member')->nullable();
            $table->string('employment')->nullable();
            $table->string('company_name')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('position')->nullable();
            $table->string('company_street')->nullable();
            $table->string('company_no')->nullable();
            $table->string('company_telephone')->nullable();
            $table->string('company_fax')->nullable();
            $table->string('company_email')->nullable();
            $table->string('year_of_employed')->nullable();
            $table->string('city')->nullable();
            $table->integer('length_of_service')->nullable();
            $table->float('total_monthly_income', 20, 2)->nullable();
            $table->float('total_rent_expense', 20, 2)->nullable();
            $table->float('total_insurance_expense', 20, 2)->nullable();
            $table->float('total_monthly_loan_payment', 20, 2)->nullable();
            $table->float('total_other_expense', 20, 2)->nullable();
            $table->string('block')->nullable();
            $table->longText('block_reason')->nullable();
            $table->date('family_issue_date')->nullable();
            $table->date('family_expiry_date')->nullable();
            $table->float('zee_cash_balance', 20, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
