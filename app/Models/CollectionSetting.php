<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CollectionSetting extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'collection_settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'past_due',
        'pre_grace',
        'grace',
        'branch.branch',
        'collection_order',
        'terminate_insufficient_fund',
        'penalty_collection_option',
        'penalty_method',
        'penalty_calculation_base',
        'max_day_penalty_calculation',
        'write_off_class',
        'pd_collection_method',
        'pre_termination_option',
        'pre_termination_duration',
        'pre_terminationd_type',
        'pre_termination_percentage',
        'amend_deduct_option',
        'amend_deduct_duration',
        'amend_deductd_type',
        'amend_deduct_percentage',
    ];

    protected $filterable = [
        'id',
        'past_due',
        'pre_grace',
        'grace',
        'branch.branch',
        'collection_order',
        'terminate_insufficient_fund',
        'penalty_collection_option',
        'penalty_method',
        'penalty_calculation_base',
        'max_day_penalty_calculation',
        'write_off_class',
        'pd_collection_method',
        'pre_termination_option',
        'pre_termination_duration',
        'pre_terminationd_type',
        'pre_termination_percentage',
        'amend_deduct_option',
        'amend_deduct_duration',
        'amend_deductd_type',
        'amend_deduct_percentage',
    ];

    protected $fillable = [
        'past_due',
        'pre_grace',
        'grace',
        'branch_id',
        'collection_order',
        'terminate_insufficient_fund',
        'penalty_collection_option',
        'penalty_method',
        'penalty_calculation_base',
        'max_day_penalty_calculation',
        'write_off_class',
        'pd_collection_method',
        'pre_termination_option',
        'pre_termination_duration',
        'pre_terminationd_type',
        'pre_termination_percentage',
        'amend_deduct_option',
        'amend_deduct_duration',
        'amend_deductd_type',
        'amend_deduct_percentage',
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
}
