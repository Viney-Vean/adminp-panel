<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class District extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'districts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'province.name_en',
        'name_en',
        'name_lc',
        'code',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'province.name_en',
        'name_en',
        'name_lc',
        'code',
    ];

    protected $fillable = [
        'branch_id',
        'province_id',
        'name_en',
        'name_lc',
        'code',
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

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
