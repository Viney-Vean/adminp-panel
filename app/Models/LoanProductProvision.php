<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class LoanProductProvision extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'loan_product_provisions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'more_than_one_year_label',
        'interest_income_recognition_label',
    ];

    const MORE_THAN_ONE_YEAR_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    const INTEREST_INCOME_RECOGNITION_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    protected $fillable = [
        'branch_id',
        'product_id',
        'class_id',
        'outstanding_coa_id',
        'air_coa_id',
        'int_income_coa_id',
        'interest_in_suspend_coa_id',
        'provision_expense_coa_id',
        'provision_reserve_coa_id',
        'penalty_coa_id',
        'income_charge_coa_id',
        'in_suspend_charge_coa_id',
        'charge_receivable_coa_id',
        'provision_booking',
        'more_than_one_year',
        'interest_income_recognition',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'product.description',
        'class.class_title',
        'outstanding_coa.account_title',
        'air_coa.account_title',
        'int_income_coa.account_title',
        'interest_in_suspend_coa.account_title',
        'provision_expense_coa.account_title',
        'provision_reserve_coa.account_title',
        'penalty_coa.account_title',
        'income_charge_coa.account_title',
        'in_suspend_charge_coa.account_title',
        'charge_receivable_coa.account_title',
        'provision_booking',
        'more_than_one_year',
        'interest_income_recognition',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'product.description',
        'class.class_title',
        'outstanding_coa.account_title',
        'air_coa.account_title',
        'int_income_coa.account_title',
        'interest_in_suspend_coa.account_title',
        'provision_expense_coa.account_title',
        'provision_reserve_coa.account_title',
        'penalty_coa.account_title',
        'income_charge_coa.account_title',
        'in_suspend_charge_coa.account_title',
        'charge_receivable_coa.account_title',
        'provision_booking',
        'more_than_one_year',
        'interest_income_recognition',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    function class()
    {
        return $this->belongsTo(Provision::class);
    }

    public function outstandingCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function airCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function intIncomeCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function interestInSuspendCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function provisionExpenseCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function provisionReserveCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function penaltyCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function incomeChargeCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function inSuspendChargeCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function chargeReceivableCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function getMoreThanOneYearLabelAttribute()
    {
        return collect(static::MORE_THAN_ONE_YEAR_SELECT)->firstWhere('value', $this->more_than_one_year)['label'] ?? '';
    }

    public function getInterestIncomeRecognitionLabelAttribute()
    {
        return collect(static::INTEREST_INCOME_RECOGNITION_SELECT)->firstWhere('value', $this->interest_income_recognition)['label'] ?? '';
    }
}
