<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Currency extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'currencies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'description',
        'buy_rate',
        'sell_rate',
        'rnd_mode',
        'minimum_unit',
        'decimal_place',
        'currency_sign',
        'revaluation_rate',
        'other_rate',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'description',
        'buy_rate',
        'sell_rate',
        'rnd_mode',
        'minimum_unit',
        'decimal_place',
        'currency_sign',
        'revaluation_rate',
        'other_rate',
    ];

    protected $fillable = [
        'branch_id',
        'description',
        'buy_rate',
        'sell_rate',
        'rnd_mode',
        'minimum_unit',
        'decimal_place',
        'currency_sign',
        'revaluation_rate',
        'other_rate',
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
