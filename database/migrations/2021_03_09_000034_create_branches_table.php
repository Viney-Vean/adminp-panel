<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch')->nullable();
            $table->string('branch_manager_en');
            $table->string('branch_manager_lc');
            $table->string('office_phone_number');
            $table->string('mobile_phone');
            $table->string('fax');
            $table->string('facebook')->nullable();
            $table->string('name_en')->unique();
            $table->string('name_lc')->nullable();
            $table->string('email')->nullable();
            $table->longText('address_en')->nullable();
            $table->longText('address_lc')->nullable();
            $table->date('start_operation_date');
            $table->string('salutation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
