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
        'gender_label',
        'active_label',
    ];

    protected $dates = [
        'employment_date',
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

    const GENDER_SELECT = [
        [
            'label' => 'Male',
            'value' => 'M',
        ],
        [
            'label' => 'Female',
            'value' => 'F',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'salutation.label',
        'gender',
        'phone_1',
        'phone_2',
        'unit.label',
        'department.label',
        'id_card_number',
        'employment_date',
        'user.name',
        'active',
        'report_to.given_name_en',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'salutation.label',
        'gender',
        'phone_1',
        'phone_2',
        'unit.label',
        'department.label',
        'id_card_number',
        'employment_date',
        'user.name',
        'active',
        'report_to.given_name_en',
    ];

    protected $fillable = [
        'branch_id',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'sur_name_en',
        'salutation_id',
        'gender',
        'phone_1',
        'phone_2',
        'unit_id',
        'department_id',
        'id_card_number',
        'employment_date',
        'user_id',
        'active',
        'report_to_id',
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

    public function salutation()
    {
        return $this->belongsTo(Option::class);
    }

    public function getGenderLabelAttribute()
    {
        return collect(static::GENDER_SELECT)->firstWhere('value', $this->gender)['label'] ?? '';
    }

    public function unit()
    {
        return $this->belongsTo(Option::class);
    }

    public function department()
    {
        return $this->belongsTo(Option::class);
    }

    public function getEmploymentDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setEmploymentDateAttribute($value)
    {
        $this->attributes['employment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getActiveLabelAttribute()
    {
        return collect(static::ACTIVE_SELECT)->firstWhere('value', $this->active)['label'] ?? '';
    }

    public function reportTo()
    {
        return $this->belongsTo(Officer::class);
    }
}
