<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class WriteOff extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'write_offs';

    protected $dates = [
        'write_off_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'contract',
        'currency.description',
        'dd_account.account_name',
        'approve_amount',
        'disburse_amount',
        'balance',
        'accrue_interest_current_installment',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'orig_balance',
        'orig_accrue_interest_current_installment',
        'orig_charge',
        'orig_principal_due',
        'orig_interest_due',
        'orig_charge_due',
        'orig_penalty_due',
        'write_off_date',
        'description',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'contract',
        'currency.description',
        'dd_account.account_name',
        'approve_amount',
        'disburse_amount',
        'balance',
        'accrue_interest_current_installment',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'orig_balance',
        'orig_accrue_interest_current_installment',
        'orig_charge',
        'orig_principal_due',
        'orig_interest_due',
        'orig_charge_due',
        'orig_penalty_due',
        'write_off_date',
        'description',
    ];

    protected $fillable = [
        'branch_id',
        'contract',
        'currency_id',
        'dd_account_id',
        'approve_amount',
        'disburse_amount',
        'balance',
        'accrue_interest_current_installment',
        'principal_due',
        'interest_due',
        'charge_due',
        'penalty_due',
        'orig_balance',
        'orig_accrue_interest_current_installment',
        'orig_charge',
        'orig_principal_due',
        'orig_interest_due',
        'orig_charge_due',
        'orig_penalty_due',
        'write_off_date',
        'description',
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

    public function ddAccount()
    {
        return $this->belongsTo(Account::class);
    }

    public function getWriteOffDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setWriteOffDateAttribute($value)
    {
        $this->attributes['write_off_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
