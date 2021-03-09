<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PastDueDetail extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'past_due_details';

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'schedule.no',
        'contract.code',
        'due_date',
        'principal_due',
        'out_principal',
        'interest_due',
        'out_interest',
        'accrue_interest_out',
        'charge_due',
        'out_charge',
        'penalty_due',
        'out_penalty',
        'numday_due',
        'status_due',
        'collect_penalty_amount',
        'collect_interest_amount',
        'collect_charge_amount',
        'waive_penalty_amount',
        'waive_interest_amount',
        'waive_charge_amount',
    ];

    protected $filterable = [
        'id',
        'schedule.no',
        'contract.code',
        'due_date',
        'principal_due',
        'out_principal',
        'interest_due',
        'out_interest',
        'accrue_interest_out',
        'charge_due',
        'out_charge',
        'penalty_due',
        'out_penalty',
        'numday_due',
        'status_due',
        'collect_penalty_amount',
        'collect_interest_amount',
        'collect_charge_amount',
        'waive_penalty_amount',
        'waive_interest_amount',
        'waive_charge_amount',
    ];

    protected $fillable = [
        'schedule_id',
        'contract_id',
        'due_date',
        'principal_due',
        'out_principal',
        'interest_due',
        'out_interest',
        'accrue_interest_out',
        'charge_due',
        'out_charge',
        'penalty_due',
        'out_penalty',
        'numday_due',
        'status_due',
        'collect_penalty_amount',
        'collect_interest_amount',
        'collect_charge_amount',
        'waive_penalty_amount',
        'waive_interest_amount',
        'waive_charge_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
