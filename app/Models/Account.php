<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Account extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'accounts';

    protected $appends = [
        'balance_side_label',
    ];

    protected $dates = [
        'open_date',
        'closing_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const BALANCE_SIDE_SELECT = [
        [
            'label' => 'Debit',
            'value' => 'Dr',
        ],
        [
            'label' => 'Credit',
            'value' => 'Cr',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'customer',
        'account_name',
        'chart_of_account.account_title',
        'balance_side',
        'currency.description',
        'account_product.account_product_title',
        'open_date',
        'balance',
        'available_bal',
        'account_status',
        'blocked_bal',
        'closing_date',
        'block',
        'block_reason',
        'type',
    ];

    protected $fillable = [
        'branch_id',
        'customer',
        'account_name',
        'chart_of_account_id',
        'balance_side',
        'currency_id',
        'account_product_id',
        'open_date',
        'balance',
        'available_bal',
        'account_status',
        'blocked_bal',
        'closing_date',
        'block',
        'block_reason',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'customer',
        'account_name',
        'chart_of_account.account_title',
        'balance_side',
        'currency.description',
        'account_product.account_product_title',
        'open_date',
        'balance',
        'available_bal',
        'account_status',
        'blocked_bal',
        'closing_date',
        'block',
        'block_reason',
        'type',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function chartOfAccount()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function getBalanceSideLabelAttribute()
    {
        return collect(static::BALANCE_SIDE_SELECT)->firstWhere('value', $this->balance_side)['label'] ?? '';
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function accountProduct()
    {
        return $this->belongsTo(AccountProduct::class);
    }

    public function getOpenDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setOpenDateAttribute($value)
    {
        $this->attributes['open_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getClosingDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setClosingDateAttribute($value)
    {
        $this->attributes['closing_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
