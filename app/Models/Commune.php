<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Commune extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'communes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'district.name_en',
        'name_en',
        'name_lc',
        'code',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'district.name_en',
        'name_en',
        'name_lc',
        'code',
    ];

    protected $fillable = [
        'branch_id',
        'district_id',
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

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
