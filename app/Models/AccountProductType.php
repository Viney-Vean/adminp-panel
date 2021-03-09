<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AccountProductType extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'account_product_types';

    protected $appends = [
        'account_type_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'description',
        'account_type',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'description',
        'account_type',
    ];

    protected $fillable = [
        'branch_id',
        'description',
        'account_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ACCOUNT_TYPE_SELECT = [
        [
            'label' => 'Vault',
            'value' => '1',
        ],
        [
            'label' => 'Till',
            'value' => '2',
        ],
        [
            'label' => 'Wallet',
            'value' => '3',
        ],
        [
            'label' => 'Draw Down',
            'value' => '4',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getAccountTypeLabelAttribute()
    {
        return collect(static::ACCOUNT_TYPE_SELECT)->firstWhere('value', $this->account_type)['label'] ?? '';
    }
}
