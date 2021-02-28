<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Recovery extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'recoveries';

    protected $dates = [
        'recovery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'loan',
        'description',
        'customer',
        'currency.description',
        'dd_account.account_name',
        'recovery_amount',
        'recovery_date',
        'principal_amount',
        'interest_amount',
        'charge_amount',
        'penalty_amount',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'loan',
        'description',
        'customer',
        'currency.description',
        'dd_account.account_name',
        'recovery_amount',
        'recovery_date',
        'principal_amount',
        'interest_amount',
        'charge_amount',
        'penalty_amount',
    ];

    protected $fillable = [
        'branch_id',
        'loan',
        'description',
        'customer',
        'currency_id',
        'dd_account_id',
        'recovery_amount',
        'recovery_date',
        'principal_amount',
        'interest_amount',
        'charge_amount',
        'penalty_amount',
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

    public function getRecoveryDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setRecoveryDateAttribute($value)
    {
        $this->attributes['recovery_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
