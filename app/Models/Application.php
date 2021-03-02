<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Application extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'applications';

    const REPAYMENT_FREQUENCY_SELECT = [

    ];

    protected $appends = [
        'repayment_method_label',
        'repayment_frequency_label',
    ];

    protected $dates = [
        'application_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REPAYMENT_METHOD_SELECT = [
        [
            'label' => 'Annuity',
            'value' => '1',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'customer.customer_name',
        'code',
        'application_date',
        'currency.description',
        'loan_product.description',
        'apply_amount',
        'approve_amount',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'interest_rate',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'customer.customer_name',
        'code',
        'application_date',
        'currency.description',
        'loan_product.description',
        'apply_amount',
        'approve_amount',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'interest_rate',
    ];

    protected $fillable = [
        'branch_id',
        'customer_id',
        'code',
        'application_date',
        'currency_id',
        'loan_product_id',
        'apply_amount',
        'approve_amount',
        'repayment_method',
        'repayment_frequency',
        'frequency',
        'term',
        'installment',
        'interest_rate',
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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getApplicationDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setApplicationDateAttribute($value)
    {
        $this->attributes['application_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function loanProduct()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    public function getRepaymentMethodLabelAttribute()
    {
        return collect(static::REPAYMENT_METHOD_SELECT)->firstWhere('value', $this->repayment_method)['label'] ?? '';
    }

    public function getRepaymentFrequencyLabelAttribute()
    {
        return collect(static::REPAYMENT_FREQUENCY_SELECT)->firstWhere('value', $this->repayment_frequency)['label'] ?? '';
    }
}
