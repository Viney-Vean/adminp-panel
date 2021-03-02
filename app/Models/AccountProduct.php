<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AccountProduct extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'account_products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch',
        'account_product_title',
        'chart_of_account.account_title',
        'currency',
        'account_product_type.description',
        'account_type.description',
        'interest_rate',
        'charged_rate',
        'tax_rate',
        'balance_define',
        'interest_day_basis',
        'interest_accrual_basis',
        'interest_capitalization',
        'dormant_day',
        'interest_expense_coa',
        'interest_payable_coa',
        'interest_income_coa',
        'interest_receivable_coa',
    ];

    protected $filterable = [
        'id',
        'branch',
        'account_product_title',
        'chart_of_account.account_title',
        'currency',
        'account_product_type.description',
        'account_type.description',
        'interest_rate',
        'charged_rate',
        'tax_rate',
        'balance_define',
        'interest_day_basis',
        'interest_accrual_basis',
        'interest_capitalization',
        'dormant_day',
        'interest_expense_coa',
        'interest_payable_coa',
        'interest_income_coa',
        'interest_receivable_coa',
    ];

    protected $fillable = [
        'branch',
        'account_product_title',
        'chart_of_account_id',
        'currency',
        'account_product_type_id',
        'account_type_id',
        'interest_rate',
        'charged_rate',
        'tax_rate',
        'balance_define',
        'interest_day_basis',
        'interest_accrual_basis',
        'interest_capitalization',
        'dormant_day',
        'interest_expense_coa',
        'interest_payable_coa',
        'interest_income_coa',
        'interest_receivable_coa',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function chartOfAccount()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function accountProductType()
    {
        return $this->belongsTo(AccountProductType::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }
}
