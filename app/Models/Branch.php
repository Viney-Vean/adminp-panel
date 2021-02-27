<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Branch extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'branches';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch',
        'name_en',
        'name_lc',
        'title',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address',
    ];

    protected $filterable = [
        'id',
        'branch',
        'name_en',
        'name_lc',
        'title',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address',
    ];

    protected $fillable = [
        'branch',
        'name_en',
        'name_lc',
        'title',
        'branch_manager_en',
        'branch_manager_lc',
        'office_phone_number',
        'mobile_phone',
        'email',
        'fax',
        'facebook',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
