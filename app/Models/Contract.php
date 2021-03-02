<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Contract extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'contracts';

    const REPAYMENT_METHOD_SELECT = [
        [
            'label' => 'Annuity',
            'value' => '1',
        ],
    ];

    protected $appends = [
        'repayment_method_label',
        'repayment_frequency_label',
        'contract_type_label',
        'more_than_one_year_label',
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

    const CONTRACT_TYPE_SELECT = [
        [
            'label' => 'Normal',
            'value' => 'N',
        ],
        [
            'label' => 'Restructure',
            'value' => 'R',
        ],
    ];

    protected $dates = [
        'transaction_date',
        'maturity_date',
        'first_collection_date',
        'next_run_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REPAYMENT_FREQUENCY_SELECT = [
        [
            'label' => 'None',
            'value' => '1',
        ],
        [
            'label' => 'Daily',
            'value' => '2',
        ],
        [
            'label' => 'Weekly',
            'value' => '3',
        ],
        [
            'label' => 'Monthly',
            'value' => '4',
        ],
    ];

    protected $fillable = [
        'branch_id',
        'customer_id',
        'code',
        'application_id',
        'dd_account_id',
        'currency_id',
        'loan_product_id',
        'approve_amount',
        'disburse_amount',
        'outstanding',
        'balance',
        'transaction_date',
        'maturity_date',
        'interest_rate',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'first_collection_date',
        'contract_type',
        'more_than_one_year',
        'provision_class_id',
        'officer_id',
        'total_interest',
        'accrue_interest_per_day',
        'interest_income_earn',
        'accrue_interest_receivable',
        'accrue_interest_current_installment',
        'accrue_interest_current_month',
        'accrue_interest_previous_month',
        'accrue_regular_fee_per_day',
        'accrue_regular_fee_receivable',
        'accrue_regular_fee_current_installment',
        'accrue_regular_fee_current_month',
        'accrue_regular_fee_prev_month',
        'admin_fee_earn',
        'admin_fee_unearn',
        'admin_fee_per_day',
        'next_run_date',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'total_overdue',
        'num_day_due',
        'provision_amount',
        'provision_amount_lcy',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'customer.customer_name',
        'code',
        'application.code',
        'dd_account.account_name',
        'currency.description',
        'loan_product.description',
        'approve_amount',
        'disburse_amount',
        'outstanding',
        'balance',
        'transaction_date',
        'maturity_date',
        'interest_rate',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'first_collection_date',
        'contract_type',
        'more_than_one_year',
        'provision_class.class',
        'officer.given_name_en',
        'total_interest',
        'accrue_interest_per_day',
        'interest_income_earn',
        'accrue_interest_receivable',
        'accrue_interest_current_installment',
        'accrue_interest_current_month',
        'accrue_interest_previous_month',
        'accrue_regular_fee_per_day',
        'accrue_regular_fee_receivable',
        'accrue_regular_fee_current_installment',
        'accrue_regular_fee_current_month',
        'accrue_regular_fee_prev_month',
        'admin_fee_earn',
        'admin_fee_unearn',
        'admin_fee_per_day',
        'next_run_date',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'total_overdue',
        'num_day_due',
        'provision_amount',
        'provision_amount_lcy',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'customer.customer_name',
        'code',
        'application.code',
        'dd_account.account_name',
        'currency.description',
        'loan_product.description',
        'approve_amount',
        'disburse_amount',
        'outstanding',
        'balance',
        'transaction_date',
        'maturity_date',
        'interest_rate',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'first_collection_date',
        'contract_type',
        'more_than_one_year',
        'provision_class.class',
        'officer.given_name_en',
        'total_interest',
        'accrue_interest_per_day',
        'interest_income_earn',
        'accrue_interest_receivable',
        'accrue_interest_current_installment',
        'accrue_interest_current_month',
        'accrue_interest_previous_month',
        'accrue_regular_fee_per_day',
        'accrue_regular_fee_receivable',
        'accrue_regular_fee_current_installment',
        'accrue_regular_fee_current_month',
        'accrue_regular_fee_prev_month',
        'admin_fee_earn',
        'admin_fee_unearn',
        'admin_fee_per_day',
        'next_run_date',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'total_overdue',
        'num_day_due',
        'provision_amount',
        'provision_amount_lcy',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function ddAccount()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function loanProduct()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMaturityDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setMaturityDateAttribute($value)
    {
        $this->attributes['maturity_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRepaymentMethodLabelAttribute()
    {
        return collect(static::REPAYMENT_METHOD_SELECT)->firstWhere('value', $this->repayment_method)['label'] ?? '';
    }

    public function getRepaymentFrequencyLabelAttribute()
    {
        return collect(static::REPAYMENT_FREQUENCY_SELECT)->firstWhere('value', $this->repayment_frequency)['label'] ?? '';
    }

    public function getFirstCollectionDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setFirstCollectionDateAttribute($value)
    {
        $this->attributes['first_collection_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getContractTypeLabelAttribute()
    {
        return collect(static::CONTRACT_TYPE_SELECT)->firstWhere('value', $this->contract_type)['label'] ?? '';
    }

    public function getMoreThanOneYearLabelAttribute()
    {
        return collect(static::MORE_THAN_ONE_YEAR_SELECT)->firstWhere('value', $this->more_than_one_year)['label'] ?? '';
    }

    public function provisionClass()
    {
        return $this->belongsTo(Provision::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function getNextRunDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setNextRunDateAttribute($value)
    {
        $this->attributes['next_run_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
