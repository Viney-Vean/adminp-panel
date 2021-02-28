<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Officer extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'officers';

    protected $appends = [
        'active_label',
    ];

    protected $dates = [
        'date_employ',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ACTIVE_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'yes',
        ],
        [
            'label' => 'No',
            'value' => 'no',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'title',
        'gender',
        'phone_1',
        'phone_2',
        'date_employ',
        'department',
        'report_to',
        'active',
        'user.name',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'title',
        'gender',
        'phone_1',
        'phone_2',
        'date_employ',
        'department',
        'report_to',
        'active',
        'user.name',
    ];

    protected $fillable = [
        'branch_id',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'title',
        'gender',
        'phone_1',
        'phone_2',
        'date_employ',
        'department',
        'report_to',
        'active',
        'user_id',
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

    public function getDateEmployAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setDateEmployAttribute($value)
    {
        $this->attributes['date_employ'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getActiveLabelAttribute()
    {
        return collect(static::ACTIVE_SELECT)->firstWhere('value', $this->active)['label'] ?? '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
