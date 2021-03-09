<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Schedule extends Model
{
    use HasAdvancedFilter, HasFactory;

    public $table = 'schedules';

    protected $appends = [
        'status_label',
    ];

    protected $dates = [
        'collection_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'loan.code',
        'no',
        'collection_date',
        'principal',
        'interest',
        'charge',
        'penalty',
        'balance',
        'num_day',
        'total_amount',
        'paid_amount',
        'waive_interest',
        'waive_charge',
        'waive_penalty',
        'status',
        'schedule_saved',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'loan.code',
        'no',
        'collection_date',
        'principal',
        'interest',
        'charge',
        'penalty',
        'balance',
        'num_day',
        'total_amount',
        'paid_amount',
        'waive_interest',
        'waive_charge',
        'waive_penalty',
        'status',
        'schedule_saved',
    ];

    protected $fillable = [
        'branch_id',
        'loan_id',
        'no',
        'collection_date',
        'principal',
        'interest',
        'charge',
        'penalty',
        'balance',
        'num_day',
        'total_amount',
        'paid_amount',
        'waive_interest',
        'waive_charge',
        'waive_penalty',
        'status',
        'schedule_saved',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        [
            'label' => 'Not Yet Due',
            'value' => '1',
        ],
        [
            'label' => 'Due Today',
            'value' => '2',
        ],
        [
            'label' => 'Fully Paid On Time',
            'value' => '3',
        ],
        [
            'label' => 'Fully Paid But Late',
            'value' => '4',
        ],
        [
            'label' => 'Partial Paid',
            'value' => '5',
        ],
        [
            'label' => 'Past Due',
            'value' => '6',
        ],
        [
            'label' => 'Prepayment',
            'value' => '7',
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

    public function loan()
    {
        return $this->belongsTo(Contract::class);
    }

    public function getCollectionDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setCollectionDateAttribute($value)
    {
        $this->attributes['collection_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_SELECT)->firstWhere('value', $this->status)['label'] ?? '';
    }
}
