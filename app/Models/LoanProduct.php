<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class LoanProduct extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'loan_products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ADMIN_FEE_ACCRUAL_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    const REGULAR_FEE_ACCUAL_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    protected $appends = [
        'reduce_base_on_label',
        'penalty_reduction_base_on_label',
        'admin_fee_base_on_label',
        'admin_fee_accrual_label',
        'regular_fee_base_on_label',
        'regular_fee_accual_label',
    ];

    const REDUCE_BASE_ON_SELECT = [
        [
            'label' => 'None',
            'value' => '1',
        ],
        [
            'label' => 'Defined Amount',
            'value' => '2',
        ],
        [
            'label' => 'Rate Base',
            'value' => '3',
        ],
        [
            'label' => '% of Outstanding',
            'value' => '4',
        ],
        [
            'label' => '% of Disbursement',
            'value' => '5',
        ],
        [
            'label' => '% of Approval',
            'value' => '6',
        ],
        [
            'label' => '% Loan Balance',
            'value' => '7',
        ],
        [
            'label' => 'Custom',
            'value' => '8',
        ],
    ];

    const ADMIN_FEE_BASE_ON_SELECT = [
        [
            'label' => 'None',
            'value' => '1',
        ],
        [
            'label' => 'Defined Amount',
            'value' => '2',
        ],
        [
            'label' => 'Rate Base',
            'value' => '3',
        ],
        [
            'label' => '% of Outstanding',
            'value' => '4',
        ],
        [
            'label' => '% of Disbursement',
            'value' => '5',
        ],
        [
            'label' => '% of Approval',
            'value' => '6',
        ],
        [
            'label' => '% Loan Balance',
            'value' => '7',
        ],
        [
            'label' => 'Custom',
            'value' => '8',
        ],
    ];

    const REGULAR_FEE_BASE_ON_SELECT = [
        [
            'label' => 'None',
            'value' => '1',
        ],
        [
            'label' => 'Defined Amount',
            'value' => '2',
        ],
        [
            'label' => 'Rate Base',
            'value' => '3',
        ],
        [
            'label' => '% of Outstanding',
            'value' => '4',
        ],
        [
            'label' => '% of Disbursement',
            'value' => '5',
        ],
        [
            'label' => '% of Approval',
            'value' => '6',
        ],
        [
            'label' => '% Loan Balance',
            'value' => '7',
        ],
        [
            'label' => 'Custom',
            'value' => '8',
        ],
    ];

    const PENALTY_REDUCTION_BASE_ON_SELECT = [
        [
            'label' => 'None',
            'value' => '1',
        ],
        [
            'label' => 'Defined Amount',
            'value' => '2',
        ],
        [
            'label' => 'Rate Base',
            'value' => '3',
        ],
        [
            'label' => '% of Outstanding',
            'value' => '4',
        ],
        [
            'label' => '% of Disbursement',
            'value' => '5',
        ],
        [
            'label' => '% of Approval',
            'value' => '6',
        ],
        [
            'label' => '% Loan Balance',
            'value' => '7',
        ],
        [
            'label' => 'Custom',
            'value' => '8',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'description',
        'currency.description',
        'repayment_method',
        'day_basis_top_side',
        'day_basis_down_side',
        'minimum_age',
        'maximum_age',
        'min_interest_rate',
        'max_interest_rate',
        'minimum_amount',
        'maximum_amount',
        'minimum_term_monthly',
        'maximum_term_monthly',
        'minimum_term_weekly',
        'maximum_term_weekly',
        'minimum_term_daily',
        'maximum_term_daily',
        'reduce_base_on',
        'max_reduce_percentage',
        'penalty_reduction_base_on',
        'max_penalty_reduce_percentage',
        'admin_fee_base_on',
        'admin_fee_amount',
        'admin_fee_accrual',
        'regular_fee_base_on',
        'regular_fee_amount',
        'regular_fee_accual',
        'fee_earn_coa.account_title',
        'fee_unearn_coa.account_title',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'description',
        'currency.description',
        'repayment_method',
        'day_basis_top_side',
        'day_basis_down_side',
        'minimum_age',
        'maximum_age',
        'min_interest_rate',
        'max_interest_rate',
        'minimum_amount',
        'maximum_amount',
        'minimum_term_monthly',
        'maximum_term_monthly',
        'minimum_term_weekly',
        'maximum_term_weekly',
        'minimum_term_daily',
        'maximum_term_daily',
        'reduce_base_on',
        'max_reduce_percentage',
        'penalty_reduction_base_on',
        'max_penalty_reduce_percentage',
        'admin_fee_base_on',
        'admin_fee_amount',
        'admin_fee_accrual',
        'regular_fee_base_on',
        'regular_fee_amount',
        'regular_fee_accual',
        'fee_earn_coa.account_title',
        'fee_unearn_coa.account_title',
    ];

    protected $fillable = [
        'branch_id',
        'description',
        'currency_id',
        'repayment_method',
        'day_basis_top_side',
        'day_basis_down_side',
        'minimum_age',
        'maximum_age',
        'min_interest_rate',
        'max_interest_rate',
        'minimum_amount',
        'maximum_amount',
        'minimum_term_monthly',
        'maximum_term_monthly',
        'minimum_term_weekly',
        'maximum_term_weekly',
        'minimum_term_daily',
        'maximum_term_daily',
        'reduce_base_on',
        'max_reduce_percentage',
        'penalty_reduction_base_on',
        'max_penalty_reduce_percentage',
        'admin_fee_base_on',
        'admin_fee_amount',
        'admin_fee_accrual',
        'regular_fee_base_on',
        'regular_fee_amount',
        'regular_fee_accual',
        'fee_earn_coa_id',
        'fee_unearn_coa_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getReduceBaseOnLabelAttribute()
    {
        return collect(static::REDUCE_BASE_ON_SELECT)->firstWhere('value', $this->reduce_base_on)['label'] ?? '';
    }

    public function getPenaltyReductionBaseOnLabelAttribute()
    {
        return collect(static::PENALTY_REDUCTION_BASE_ON_SELECT)->firstWhere('value', $this->penalty_reduction_base_on)['label'] ?? '';
    }

    public function getAdminFeeBaseOnLabelAttribute()
    {
        return collect(static::ADMIN_FEE_BASE_ON_SELECT)->firstWhere('value', $this->admin_fee_base_on)['label'] ?? '';
    }

    public function getAdminFeeAccrualLabelAttribute()
    {
        return collect(static::ADMIN_FEE_ACCRUAL_SELECT)->firstWhere('value', $this->admin_fee_accrual)['label'] ?? '';
    }

    public function getRegularFeeBaseOnLabelAttribute()
    {
        return collect(static::REGULAR_FEE_BASE_ON_SELECT)->firstWhere('value', $this->regular_fee_base_on)['label'] ?? '';
    }

    public function getRegularFeeAccualLabelAttribute()
    {
        return collect(static::REGULAR_FEE_ACCUAL_SELECT)->firstWhere('value', $this->regular_fee_accual)['label'] ?? '';
    }

    public function feeEarnCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function feeUnearnCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }
}
