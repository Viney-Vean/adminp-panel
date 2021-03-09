<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class AccountEntry extends Model
{
    use HasAdvancedFilter, HasFactory;

    public $table = 'account_entries';

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
        'branch.name_en',
        'account.account_name',
        'chart_of_account.account_title',
        'currency.description',
        'debit_credit',
        'amount',
        'note',
        'transaction_code',
        'transaction_date',
        'operation',
        'reference',
        'loan_reference',
        'module_type',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'account.account_name',
        'chart_of_account.account_title',
        'currency.description',
        'debit_credit',
        'amount',
        'note',
        'transaction_code',
        'transaction_date',
        'operation',
        'reference',
        'loan_reference',
        'module_type',
    ];

    protected $fillable = [
        'branch_id',
        'account_id',
        'chart_of_account_id',
        'currency_id',
        'debit_credit',
        'amount',
        'note',
        'transaction_code',
        'transaction_date',
        'operation',
        'reference',
        'loan_reference',
        'module_type',
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

    public function chartOfAccount()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getDebitCreditLabelAttribute()
    {
        return collect(static::DEBIT_CREDIT_SELECT)->firstWhere('value', $this->debit_credit)['label'] ?? '';
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
