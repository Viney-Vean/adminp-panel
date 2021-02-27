<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Position extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'positions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'position_en',
        'position_lc',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'position_en',
        'position_lc',
    ];

    protected $fillable = [
        'branch_id',
        'position_en',
        'position_lc',
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
}
