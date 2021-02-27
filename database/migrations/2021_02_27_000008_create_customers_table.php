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
            $table->string('customer_name');
            $table->string('customer_last_name');
            $table->string('customer_nickname')->nullable();
            $table->string('customer_gender')->nullable();
            $table->date('customer_date_of_birth')->nullable();
            $table->string('customer_nationality')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_business_phone')->nullable();
            $table->string('customer_other_phone')->nullable();
            $table->string('customer_mail')->nullable();
            $table->string('customer_identity_type')->nullable();
            $table->float('customer_salary_slip', 15, 2)->nullable();
            $table->string('customer_id_card')->nullable();
            $table->string('customer_back_id_card')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->integer('number_of_family_member')->nullable();
            $table->string('cbc_check')->nullable();
            $table->integer('cbc_scores')->nullable();
            $table->string('shift_works')->nullable();
            $table->float('businesses_income', 15, 2)->nullable();
            $table->string('type_of_business_activities')->nullable();
            $table->string('general_expenses')->nullable();
            $table->string('yes_or_no_loan_leasing_repayment_expenses')->nullable();
            $table->string('name_of_institution')->nullable();
            $table->string('customer_identity_number')->nullable();
            $table->string('customer_identity_date')->nullable();
            $table->string('customer_vehicle')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street_no')->nullable();
            $table->string('address')->nullable();
            $table->string('customer_status')->nullable();
            $table->string('customer_blanklist')->nullable();
            $table->string('customer_occupation')->nullable();
            $table->string('customer_income')->nullable();
            $table->string('income_from_salary')->nullable();
            $table->string('asset_type')->nullable();
            $table->string('asset')->nullable();
            $table->string('collateral')->nullable();
            $table->string('customer_currency_income')->nullable();
            $table->string('spouse_currency_income')->nullable();
            $table->string('spouse')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_gender')->nullable();
            $table->string('spouse_date_of_birth')->nullable();
            $table->string('spouse_nationality')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('spouse_mail')->nullable();
            $table->string('spouse_identity_type')->nullable();
            $table->string('spouse_identity_number')->nullable();
            $table->string('spouse_identity_date')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_income')->nullable();
            $table->string('is_staff')->nullable();
            $table->string('is_guarantor')->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('customer_living_condition')->nullable();
            $table->string('customer_latin_name')->nullable();
            $table->date('customer_identity_expired_date')->nullable();
            $table->integer('customer_working_period')->nullable();
            $table->string('customer_work_experience')->nullable();
            $table->string('customer_employment_status')->nullable();
            $table->string('customer_organization')->nullable();
            $table->string('customer_organization_house_no')->nullable();
            $table->string('customer_organization_street_no')->nullable();
            $table->string('customer_organization_address')->nullable();
            $table->string('relationship')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('scores')->nullable();
            $table->string('is_agree')->nullable();
            $table->string('recommended')->nullable();
            $table->string('percentage')->nullable();
            $table->integer('number_share')->nullable();
            $table->string('member_type')->nullable();
            $table->string('investor_type')->nullable();
            $table->string('about')->nullable();
            $table->string('qiid')->nullable();
            $table->string('json')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
