<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Journal extends Model
{
    use HasAdvancedFilter, HasFactory;

    public $table = 'journals';

    protected $appends = [
        'debit_credit_label',
    ];

    protected $dates = [
        'transaction_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DEBIT_CREDIT_SELECT = [
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
        'account.account_name',
        'currency.description',
        'chart_of_account',
        'debit_credit',
        'class.class',
        'transaction_date',
        'transaction_code',
        'operation',
        'module_type',
        'reference',
        'loan_reference',
        'note',
        'amount',
        'lcy_amount',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'account.account_name',
        'currency.description',
        'chart_of_account',
        'debit_credit',
        'class.class',
        'transaction_date',
        'transaction_code',
        'operation',
        'module_type',
        'reference',
        'loan_reference',
        'note',
        'amount',
        'lcy_amount',
    ];

    protected $fillable = [
        'branch_id',
        'account_id',
        'currency_id',
        'chart_of_account',
        'debit_credit',
        'class_id',
        'transaction_date',
        'transaction_code',
        'operation',
        'module_type',
        'reference',
        'loan_reference',
        'note',
        'amount',
        'lcy_amount',
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

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getDebitCreditLabelAttribute()
    {
        return collect(static::DEBIT_CREDIT_SELECT)->firstWhere('value', $this->debit_credit)['label'] ?? '';
    }

    function class()
    {
        return $this->belongsTo(Provision::class);
    }

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
