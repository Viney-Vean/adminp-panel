<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ChartOfAccount extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'chart_of_accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ACTIVE_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    const ALLOW_POSTING_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    const BALANCE_SIDE_SELECT = [
        [
            'label' => 'Debit',
            'value' => 'Dr',
        ],
        [
            'label' => 'Credit',
            'value' => 'Cr',
        ],
    ];

    const ALLOW_DIRECT_POSTING_SELECT = [
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
        'classification_label',
        'posting_side_label',
        'balance_side_label',
        'allow_posting_label',
        'allow_direct_posting_label',
        'active_label',
    ];

    const POSTING_SIDE_SELECT = [
        [
            'label' => 'Debit',
            'value' => 'Dr',
        ],
        [
            'label' => 'Credit',
            'value' => 'Cr',
        ],
        [
            'label' => 'Both',
            'value' => 'Both',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'account_title',
        'account_type.description',
        'classification',
        'main_account.account_title',
        'currency.description',
        'posting_side',
        'balance_side',
        'allow_posting',
        'allow_direct_posting',
        'active',
        'description',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'account_title',
        'account_type.description',
        'classification',
        'main_account.account_title',
        'currency.description',
        'posting_side',
        'balance_side',
        'allow_posting',
        'allow_direct_posting',
        'active',
        'description',
    ];

    protected $fillable = [
        'branch_id',
        'account_title',
        'account_type_id',
        'classification',
        'main_account_id',
        'currency_id',
        'posting_side',
        'balance_side',
        'allow_posting',
        'allow_direct_posting',
        'active',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CLASSIFICATION_SELECT = [
        [
            'label' => 'Assets',
            'value' => 'A',
        ],
        [
            'label' => 'Liability',
            'value' => 'L',
        ],
        [
            'label' => 'Capital Equity',
            'value' => 'C',
        ],
        [
            'label' => 'Income',
            'value' => 'I',
        ],
        [
            'label' => 'Expense',
            'value' => 'E',
        ],
        [
            'label' => 'Off Balance Sheet',
            'value' => 'O',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function getClassificationLabelAttribute()
    {
        return collect(static::CLASSIFICATION_SELECT)->firstWhere('value', $this->classification)['label'] ?? '';
    }

    public function mainAccount()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getPostingSideLabelAttribute()
    {
        return collect(static::POSTING_SIDE_SELECT)->firstWhere('value', $this->posting_side)['label'] ?? '';
    }

    public function getBalanceSideLabelAttribute()
    {
        return collect(static::BALANCE_SIDE_SELECT)->firstWhere('value', $this->balance_side)['label'] ?? '';
    }

    public function getAllowPostingLabelAttribute()
    {
        return collect(static::ALLOW_POSTING_SELECT)->firstWhere('value', $this->allow_posting)['label'] ?? '';
    }

    public function getAllowDirectPostingLabelAttribute()
    {
        return collect(static::ALLOW_DIRECT_POSTING_SELECT)->firstWhere('value', $this->allow_direct_posting)['label'] ?? '';
    }

    public function getActiveLabelAttribute()
    {
        return collect(static::ACTIVE_SELECT)->firstWhere('value', $this->active)['label'] ?? '';
    }
}
