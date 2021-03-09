<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Provision extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'provisions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'contract_type_label',
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

    protected $orderable = [
        'id',
        'branch.branch',
        'class',
        'class_title',
        'overdue_from',
        'overdue_to',
        'contract_type',
        'more_than_one_year',
        'interest_income_recognition',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'class',
        'class_title',
        'overdue_from',
        'overdue_to',
        'contract_type',
        'more_than_one_year',
        'interest_income_recognition',
    ];

    protected $fillable = [
        'branch_id',
        'class',
        'class_title',
        'overdue_from',
        'overdue_to',
        'contract_type',
        'more_than_one_year',
        'interest_income_recognition',
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

    public function getContractTypeLabelAttribute()
    {
        return collect(static::CONTRACT_TYPE_SELECT)->firstWhere('value', $this->contract_type)['label'] ?? '';
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
