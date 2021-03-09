<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Country extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'countries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'country_code.branch',
        'iso_2',
        'iso_3',
        'name_en',
        'name_lc',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'country_code.branch',
        'iso_2',
        'iso_3',
        'name_en',
        'name_lc',
    ];

    protected $fillable = [
        'branch_id',
        'country_code_id',
        'iso_2',
        'iso_3',
        'name_en',
        'name_lc',
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

    public function countryCode()
    {
        return $this->belongsTo(Branch::class);
    }
}
