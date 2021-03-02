<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountProductsTable extends Migration
{
    public function up()
    {
        Schema::create('account_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch')->nullable();
            $table->string('currency')->nullable();
            $table->float('interest_rate', 20, 9)->nullable();
            $table->float('charged_rate', 20, 9)->nullable();
            $table->float('tax_rate', 20, 9)->nullable();
            $table->float('balance_define', 20, 9)->nullable();
            $table->float('interest_day_basis', 20, 9)->nullable();
            $table->float('interest_accrual_basis', 20, 9)->nullable();
            $table->float('interest_capitalization', 20, 9)->nullable();
            $table->string('dormant_day')->nullable();
            $table->string('interest_expense_coa')->nullable();
            $table->string('interest_payable_coa')->nullable();
            $table->string('interest_income_coa')->nullable();
            $table->string('interest_receivable_coa')->nullable();
            $table->string('account_product_title')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
