<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Option extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'options';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'group.label',
        'key',
        'value',
        'label',
        'order',
    ];

    protected $filterable = [
        'id',
        'group.label',
        'key',
        'value',
        'label',
        'order',
    ];

    protected $fillable = [
        'group_id',
        'key',
        'value',
        'label',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function group()
    {
        return $this->belongsTo(Option::class);
    }
}
