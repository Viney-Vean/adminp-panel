<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Branch extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'branches';

    protected $appends = [
        'salutation_label',
    ];

    protected $dates = [
        'start_operation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const SALUTATION_SELECT = [
        [
            'label' => 'Mr',
            'value' => 'Mr',
        ],
        [
            'label' => 'Mrs',
            'value' => 'Mrs',
        ],
        [
            'label' => 'Miss',
            'value' => 'Miss',
        ],
    ];

    protected $orderable = [
        'id',
        'branch',
        'start_operation_date',
        'name_en',
        'name_lc',
        'salutation',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address_en',
        'address_lc',
    ];

    protected $filterable = [
        'id',
        'branch',
        'start_operation_date',
        'name_en',
        'name_lc',
        'salutation',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address_en',
        'address_lc',
    ];

    protected $fillable = [
        'branch',
        'start_operation_date',
        'name_en',
        'name_lc',
        'salutation',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address_en',
        'address_lc',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartOperationDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setStartOperationDateAttribute($value)
    {
        $this->attributes['start_operation_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSalutationLabelAttribute()
    {
        return collect(static::SALUTATION_SELECT)->firstWhere('value', $this->salutation)['label'] ?? '';
    }
}
