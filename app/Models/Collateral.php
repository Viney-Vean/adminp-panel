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
        'customer.given_name_en',
        'description',
        'collateral_type.label',
        'currency.description',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province.name_en',
        'district.name_en',
        'commune.name_en',
        'village.name_en',
        'received_date',
        'withdrawal_date',
    ];

    protected $fillable = [
        'customer_id',
        'description',
        'collateral_type_id',
        'currency_id',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province_id',
        'district_id',
        'commune_id',
        'village_id',
        'received_date',
        'withdrawal_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'customer.given_name_en',
        'description',
        'collateral_type.label',
        'currency.description',
        'purchase_price',
        'valuation_price',
        'valuer',
        'issued_date',
        'issued_place',
        'issued_by',
        'collateral_number',
        'province.name_en',
        'district.name_en',
        'commune.name_en',
        'village.name_en',
        'received_date',
        'withdrawal_date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function collateralType()
    {
        return $this->belongsTo(Option::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
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

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
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
