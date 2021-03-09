<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Customer extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'customers';

    protected $appends = [
        'title_label',
        'block_label',
    ];

    const BLOCK_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'Y',
        ],
        [
            'label' => 'No',
            'value' => 'N',
        ],
    ];

    protected $dates = [
        'date_of_birth',
        'family_date_of_birth',
        'family_issue_date',
        'family_expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TITLE_SELECT = [
        [
            'label' => 'Mr',
            'value' => 'Mr',
        ],
        [
            'label' => 'Miss',
            'value' => 'Ms',
        ],
        [
            'label' => 'Mrs',
            'value' => 'Mrs',
        ],
    ];

    protected $fillable = [
        'branch_id',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'customer_type_id',
        'title',
        'gender_id',
        'date_of_birth',
        'country_of_birth_id',
        'province_of_birth_id',
        'district_of_birth_id',
        'commune_of_birth_id',
        'village_of_birth_id',
        'resident_status_id',
        'education_level_id',
        'officer_id',
        'province_id',
        'district_id',
        'commune_id',
        'village_id',
        'city',
        'house_no',
        'street',
        'phone_1',
        'phone_2',
        'facebook',
        'email',
        'location_mapping',
        'family_given_name_en',
        'family_surname_en',
        'family_given_name_lc',
        'family_surname_lc',
        'family_date_of_birth',
        'family_nationality',
        'family_id_type_id',
        'family_id_number',
        'family_issue_place',
        'family_issue_date',
        'family_expiry_date',
        'spouse_employment',
        'family_phone_1',
        'family_phone_2',
        'house_ownership',
        'family_member',
        'active_member',
        'employment',
        'company_name',
        'employer_name',
        'business_type',
        'position',
        'company_country_id',
        'company_province_id',
        'company_district_id',
        'company_commune_id',
        'company_village_id',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
        'length_of_service',
        'company_currency_id',
        'total_monthly_income',
        'total_rent_expense',
        'total_insurance_expense',
        'total_monthly_loan_payment',
        'total_other_expense',
        'zee_cash_balance',
        'block',
        'block_reason',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'customer_type.label',
        'title',
        'gender.label',
        'date_of_birth',
        'country_of_birth.name_en',
        'province_of_birth.name_en',
        'district_of_birth.name_en',
        'commune_of_birth.name_en',
        'village_of_birth.name_en',
        'resident_status.label',
        'education_level.label',
        'officer.label',
        'province.name_en',
        'district.name_en',
        'commune.name_en',
        'village.name_en',
        'city',
        'house_no',
        'street',
        'phone_1',
        'phone_2',
        'facebook',
        'email',
        'family_given_name_en',
        'family_surname_en',
        'family_given_name_lc',
        'family_surname_lc',
        'family_date_of_birth',
        'family_nationality',
        'family_id_type.label',
        'family_id_number',
        'family_issue_place',
        'family_issue_date',
        'family_expiry_date',
        'spouse_employment',
        'family_phone_1',
        'family_phone_2',
        'house_ownership',
        'family_member',
        'active_member',
        'employment',
        'company_name',
        'employer_name',
        'business_type',
        'position',
        'company_country.name_en',
        'company_province.name_en',
        'company_district.name_en',
        'company_commune.name_en',
        'company_village.name_en',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
        'length_of_service',
        'company_currency.description',
        'total_monthly_income',
        'total_rent_expense',
        'total_insurance_expense',
        'total_monthly_loan_payment',
        'total_other_expense',
        'zee_cash_balance',
        'block',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'customer_type.label',
        'title',
        'gender.label',
        'date_of_birth',
        'country_of_birth.name_en',
        'province_of_birth.name_en',
        'district_of_birth.name_en',
        'commune_of_birth.name_en',
        'village_of_birth.name_en',
        'resident_status.label',
        'education_level.label',
        'officer.label',
        'province.name_en',
        'district.name_en',
        'commune.name_en',
        'village.name_en',
        'city',
        'house_no',
        'street',
        'phone_1',
        'phone_2',
        'facebook',
        'email',
        'family_given_name_en',
        'family_surname_en',
        'family_given_name_lc',
        'family_surname_lc',
        'family_date_of_birth',
        'family_nationality',
        'family_id_type.label',
        'family_id_number',
        'family_issue_place',
        'family_issue_date',
        'family_expiry_date',
        'spouse_employment',
        'family_phone_1',
        'family_phone_2',
        'house_ownership',
        'family_member',
        'active_member',
        'employment',
        'company_name',
        'employer_name',
        'business_type',
        'position',
        'company_country.name_en',
        'company_province.name_en',
        'company_district.name_en',
        'company_commune.name_en',
        'company_village.name_en',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
        'length_of_service',
        'company_currency.description',
        'total_monthly_income',
        'total_rent_expense',
        'total_insurance_expense',
        'total_monthly_loan_payment',
        'total_other_expense',
        'zee_cash_balance',
        'block',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customerType()
    {
        return $this->belongsTo(Option::class);
    }

    public function getTitleLabelAttribute()
    {
        return collect(static::TITLE_SELECT)->firstWhere('value', $this->title)['label'] ?? '';
    }

    public function gender()
    {
        return $this->belongsTo(Option::class);
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function countryOfBirth()
    {
        return $this->belongsTo(Country::class);
    }

    public function provinceOfBirth()
    {
        return $this->belongsTo(Province::class);
    }

    public function districtOfBirth()
    {
        return $this->belongsTo(District::class);
    }

    public function communeOfBirth()
    {
        return $this->belongsTo(Commune::class);
    }

    public function villageOfBirth()
    {
        return $this->belongsTo(Village::class);
    }

    public function residentStatus()
    {
        return $this->belongsTo(Option::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(Option::class);
    }

    public function officer()
    {
        return $this->belongsTo(Option::class);
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

    public function getFamilyDateOfBirthAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setFamilyDateOfBirthAttribute($value)
    {
        $this->attributes['family_date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function familyIdType()
    {
        return $this->belongsTo(Option::class);
    }

    public function getFamilyIssueDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setFamilyIssueDateAttribute($value)
    {
        $this->attributes['family_issue_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFamilyExpiryDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setFamilyExpiryDateAttribute($value)
    {
        $this->attributes['family_expiry_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function companyCountry()
    {
        return $this->belongsTo(Country::class);
    }

    public function companyProvince()
    {
        return $this->belongsTo(Province::class);
    }

    public function companyDistrict()
    {
        return $this->belongsTo(District::class);
    }

    public function companyCommune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function companyVillage()
    {
        return $this->belongsTo(Village::class);
    }

    public function companyCurrency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getBlockLabelAttribute()
    {
        return collect(static::BLOCK_SELECT)->firstWhere('value', $this->block)['label'] ?? '';
    }
}
