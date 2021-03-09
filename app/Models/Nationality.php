<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Nationality extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'nationalities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'name_en',
        'name_lc',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'name_en',
        'name_lc',
    ];

    protected $fillable = [
        'branch_id',
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
}
