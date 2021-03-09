<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class LoanProductProvision extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'loan_product_provisions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'branch_id',
        'product_id',
        'class_id',
        'outstanding_coa_id',
        'air_coa_id',
        'interest_income_coa_id',
        'interest_in_suspend_coa_id',
        'provision_expense_coa_id',
        'provision_reserve_coa_id',
        'penalty_coa_id',
        'charge_income_coa_id',
        'charge_in_suspend_coa_id',
        'charge_receivable_coa_id',
        'provision_booking',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.branch',
        'product.description',
        'class.class_title',
        'outstanding_coa.account_title',
        'air_coa.account_title',
        'interest_income_coa.account_title',
        'interest_in_suspend_coa.account_title',
        'provision_expense_coa.account_title',
        'provision_reserve_coa.account_title',
        'penalty_coa.account_title',
        'charge_income_coa.account_title',
        'charge_in_suspend_coa.account_title',
        'charge_receivable_coa.account_title',
        'provision_booking',
    ];

    protected $filterable = [
        'id',
        'branch.branch',
        'product.description',
        'class.class_title',
        'outstanding_coa.account_title',
        'air_coa.account_title',
        'interest_income_coa.account_title',
        'interest_in_suspend_coa.account_title',
        'provision_expense_coa.account_title',
        'provision_reserve_coa.account_title',
        'penalty_coa.account_title',
        'charge_income_coa.account_title',
        'charge_in_suspend_coa.account_title',
        'charge_receivable_coa.account_title',
        'provision_booking',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    function class()
    {
        return $this->belongsTo(Provision::class);
    }

    public function outstandingCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function airCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function interestIncomeCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function interestInSuspendCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function provisionExpenseCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function provisionReserveCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function penaltyCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function chargeIncomeCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function chargeInSuspendCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function chargeReceivableCoa()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }
}
