<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Collateral extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'collaterals';

    protected $dates = [
        'issued_date',
        'issued_place',
        'received_date',
        'withdrawal_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'customer.customer_name',
        'description',
        'collateral',
        'collateral_type',
        'currency',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province',
        'district',
        'commune',
        'village',
        'received_date',
        'withdrawal_date',
    ];

    protected $filterable = [
        'id',
        'customer.customer_name',
        'description',
        'collateral',
        'collateral_type',
        'currency',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province',
        'district',
        'commune',
        'village',
        'received_date',
        'withdrawal_date',
    ];

    protected $fillable = [
        'customer_id',
        'description',
        'collateral',
        'collateral_type',
        'currency',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province',
        'district',
        'commune',
        'village',
        'received_date',
        'withdrawal_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getIssuedDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setIssuedDateAttribute($value)
    {
        $this->attributes['issued_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIssuedPlaceAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setIssuedPlaceAttribute($value)
    {
        $this->attributes['issued_place'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReceivedDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setReceivedDateAttribute($value)
    {
        $this->attributes['received_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getWithdrawalDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setWithdrawalDateAttribute($value)
    {
        $this->attributes['withdrawal_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
