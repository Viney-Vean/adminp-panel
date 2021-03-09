<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SystemSetting extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'system_settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch_manager_en',
        'principal_collection',
        'interest_collection',
        'admin_fee_collection',
        'pd_principal_collection',
        'pd_interest_collection',
        'charge_collection',
        'penalty_collection',
        'loan_accrual_interest',
        'amendment_add_principal',
        'amendment_duduct_principal',
        'terminate',
        'write_off_charge',
        'write_off_penalty',
        'write_off_interest',
        'write_off_principal',
        'waive_charge',
        'waive_penalty',
    ];

    protected $filterable = [
        'id',
        'branch.branch_manager_en',
        'principal_collection',
        'interest_collection',
        'admin_fee_collection',
        'pd_principal_collection',
        'pd_interest_collection',
        'charge_collection',
        'penalty_collection',
        'loan_accrual_interest',
        'amendment_add_principal',
        'amendment_duduct_principal',
        'terminate',
        'write_off_charge',
        'write_off_penalty',
        'write_off_interest',
        'write_off_principal',
        'waive_charge',
        'waive_penalty',
    ];

    protected $fillable = [
        'branch_id',
        'principal_collection',
        'interest_collection',
        'admin_fee_collection',
        'pd_principal_collection',
        'pd_interest_collection',
        'charge_collection',
        'penalty_collection',
        'loan_accrual_interest',
        'amendment_add_principal',
        'amendment_duduct_principal',
        'terminate',
        'write_off_charge',
        'write_off_penalty',
        'write_off_interest',
        'write_off_principal',
        'waive_charge',
        'waive_penalty',
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
