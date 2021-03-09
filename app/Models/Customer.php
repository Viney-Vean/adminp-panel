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
    ];

    protected $dates = [
        'date_of_birth',
        'family_date_of_birth',
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

    protected $orderable = [
        'id',
        'customer_name',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'title',
        'gender.label',
        'date_of_birth',
        'customer_type.label',
        'resident_status.label',
        'education_level.label',
        'officer.label',
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
        'family_id_type',
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
        'company_country',
        'company_province',
        'company_district',
        'company_commune',
        'company_village',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
    ];

    protected $filterable = [
        'id',
        'customer_name',
        'branch.name_en',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'title',
        'gender.label',
        'date_of_birth',
        'customer_type.label',
        'resident_status.label',
        'education_level.label',
        'officer.label',
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
        'family_id_type',
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
        'company_country',
        'company_province',
        'company_district',
        'company_commune',
        'company_village',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
    ];

    protected $fillable = [
        'customer_name',
        'branch_id',
        'given_name_en',
        'surname_en',
        'given_name_lc',
        'surname_lc',
        'title',
        'gender_id',
        'date_of_birth',
        'customer_type_id',
        'resident_status_id',
        'education_level_id',
        'officer_id',
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
        'family_id_type',
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
        'company_country',
        'company_province',
        'company_district',
        'company_commune',
        'company_village',
        'company_street',
        'company_no',
        'company_telephone',
        'company_fax',
        'company_email',
        'year_of_employed',
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

    public function customerType()
    {
        return $this->belongsTo(Option::class);
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

    public function getFamilyDateOfBirthAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setFamilyDateOfBirthAttribute($value)
    {
        $this->attributes['family_date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
