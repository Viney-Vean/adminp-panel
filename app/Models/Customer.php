<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Customer extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'customers';

    protected $dates = [
        'customer_date_of_birth',
        'customer_identity_expired_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const IS_AGREE_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'yes',
        ],
        [
            'label' => 'No',
            'value' => 'no',
        ],
    ];

    const YES_OR_NO_LOAN_LEASING_REPAYMENT_EXPENSES_SELECT = [
        [
            'label' => 'Yes',
            'value' => 'yes',
        ],
        [
            'label' => 'No',
            'value' => 'no',
        ],
    ];

    const CUSTOMER_GENDER_SELECT = [
        [
            'label' => 'Male',
            'value' => 'male',
        ],
        [
            'label' => 'Female',
            'value' => 'female',
        ],
        [
            'label' => 'Others',
            'value' => 'others',
        ],
    ];

    protected $appends = [
        'customer_gender_label',
        'customer_identity_type_label',
        'selfies_photo',
        'yes_or_no_loan_leasing_repayment_expenses_label',
        'customer_profile',
        'documentations',
        'spouse_profile',
        'is_agree_label',
    ];

    const CUSTOMER_IDENTITY_TYPE_SELECT = [
        [
            'label' => 'ID Card',
            'value' => 'id card',
        ],
        [
            'label' => 'Family Book',
            'value' => 'family book',
        ],
        [
            'label' => 'Passport',
            'value' => 'passport',
        ],
        [
            'label' => 'Others',
            'value' => 'others',
        ],
    ];

    protected $orderable = [
        'id',
        'customer_name',
        'customer_last_name',
        'customer_nickname',
        'customer_gender',
        'customer_date_of_birth',
        'customer_nationality',
        'customer_phone',
        'customer_business_phone',
        'customer_other_phone',
        'customer_mail',
        'customer_identity_type',
        'customer_salary_slip',
        'customer_id_card',
        'customer_back_id_card',
        'number_of_children',
        'number_of_family_member',
        'cbc_check',
        'cbc_scores',
        'shift_works',
        'businesses_income',
        'type_of_business_activities',
        'general_expenses',
        'yes_or_no_loan_leasing_repayment_expenses',
        'name_of_institution',
        'customer_identity_number',
        'customer_identity_date',
        'customer_vehicle',
        'house_no',
        'street_no',
        'address',
        'customer_status',
        'customer_blanklist',
        'customer_occupation',
        'customer_income',
        'income_from_salary',
        'asset_type',
        'asset',
        'collateral',
        'customer_currency_income',
        'spouse_currency_income',
        'spouse',
        'spouse_name',
        'spouse_gender',
        'spouse_date_of_birth',
        'spouse_nationality',
        'spouse_phone',
        'spouse_mail',
        'spouse_identity_type',
        'spouse_identity_number',
        'spouse_identity_date',
        'spouse_occupation',
        'spouse_income',
        'is_staff',
        'is_guarantor',
        'user',
        'password',
        'remember_token',
        'created_by',
        'updated_by',
        'marital_status',
        'customer_living_condition',
        'customer_latin_name',
        'customer_identity_expired_date',
        'customer_working_period',
        'customer_work_experience',
        'customer_employment_status',
        'customer_organization',
        'customer_organization_house_no',
        'customer_organization_street_no',
        'customer_organization_address',
        'relationship',
        'customer_type',
        'scores',
        'is_agree',
        'recommended',
        'percentage',
        'number_share',
        'member_type',
        'investor_type',
        'about',
        'qiid',
        'json',
        'branch.name_en',
    ];

    protected $filterable = [
        'id',
        'customer_name',
        'customer_last_name',
        'customer_nickname',
        'customer_gender',
        'customer_date_of_birth',
        'customer_nationality',
        'customer_phone',
        'customer_business_phone',
        'customer_other_phone',
        'customer_mail',
        'customer_identity_type',
        'customer_salary_slip',
        'customer_id_card',
        'customer_back_id_card',
        'number_of_children',
        'number_of_family_member',
        'cbc_check',
        'cbc_scores',
        'shift_works',
        'businesses_income',
        'type_of_business_activities',
        'general_expenses',
        'yes_or_no_loan_leasing_repayment_expenses',
        'name_of_institution',
        'customer_identity_number',
        'customer_identity_date',
        'customer_vehicle',
        'house_no',
        'street_no',
        'address',
        'customer_status',
        'customer_blanklist',
        'customer_occupation',
        'customer_income',
        'income_from_salary',
        'asset_type',
        'asset',
        'collateral',
        'customer_currency_income',
        'spouse_currency_income',
        'spouse',
        'spouse_name',
        'spouse_gender',
        'spouse_date_of_birth',
        'spouse_nationality',
        'spouse_phone',
        'spouse_mail',
        'spouse_identity_type',
        'spouse_identity_number',
        'spouse_identity_date',
        'spouse_occupation',
        'spouse_income',
        'is_staff',
        'is_guarantor',
        'user',
        'password',
        'remember_token',
        'created_by',
        'updated_by',
        'marital_status',
        'customer_living_condition',
        'customer_latin_name',
        'customer_identity_expired_date',
        'customer_working_period',
        'customer_work_experience',
        'customer_employment_status',
        'customer_organization',
        'customer_organization_house_no',
        'customer_organization_street_no',
        'customer_organization_address',
        'relationship',
        'customer_type',
        'scores',
        'is_agree',
        'recommended',
        'percentage',
        'number_share',
        'member_type',
        'investor_type',
        'about',
        'qiid',
        'json',
        'branch.name_en',
    ];

    protected $fillable = [
        'customer_name',
        'customer_last_name',
        'customer_nickname',
        'customer_gender',
        'customer_date_of_birth',
        'customer_nationality',
        'customer_phone',
        'customer_business_phone',
        'customer_other_phone',
        'customer_mail',
        'customer_identity_type',
        'customer_salary_slip',
        'customer_id_card',
        'customer_back_id_card',
        'number_of_children',
        'number_of_family_member',
        'cbc_check',
        'cbc_scores',
        'shift_works',
        'businesses_income',
        'type_of_business_activities',
        'general_expenses',
        'yes_or_no_loan_leasing_repayment_expenses',
        'name_of_institution',
        'customer_identity_number',
        'customer_identity_date',
        'customer_vehicle',
        'house_no',
        'street_no',
        'address',
        'customer_status',
        'customer_blanklist',
        'customer_occupation',
        'customer_income',
        'income_from_salary',
        'asset_type',
        'asset',
        'collateral',
        'customer_currency_income',
        'spouse_currency_income',
        'spouse',
        'spouse_name',
        'spouse_gender',
        'spouse_date_of_birth',
        'spouse_nationality',
        'spouse_phone',
        'spouse_mail',
        'spouse_identity_type',
        'spouse_identity_number',
        'spouse_identity_date',
        'spouse_occupation',
        'spouse_income',
        'is_staff',
        'is_guarantor',
        'user',
        'password',
        'remember_token',
        'created_by',
        'updated_by',
        'marital_status',
        'customer_living_condition',
        'customer_latin_name',
        'customer_identity_expired_date',
        'customer_working_period',
        'customer_work_experience',
        'customer_employment_status',
        'customer_organization',
        'customer_organization_house_no',
        'customer_organization_street_no',
        'customer_organization_address',
        'relationship',
        'customer_type',
        'scores',
        'is_agree',
        'recommended',
        'percentage',
        'number_share',
        'member_type',
        'investor_type',
        'about',
        'qiid',
        'json',
        'branch_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getCustomerGenderLabelAttribute()
    {
        return collect(static::CUSTOMER_GENDER_SELECT)->firstWhere('value', $this->customer_gender)['label'] ?? '';
    }

    public function getCustomerDateOfBirthAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setCustomerDateOfBirthAttribute($value)
    {
        $this->attributes['customer_date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCustomerIdentityTypeLabelAttribute()
    {
        return collect(static::CUSTOMER_IDENTITY_TYPE_SELECT)->firstWhere('value', $this->customer_identity_type)['label'] ?? '';
    }

    public function getSelfiesPhotoAttribute()
    {
        return $this->getMedia('customer_selfies_photo')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getYesOrNoLoanLeasingRepaymentExpensesLabelAttribute()
    {
        return collect(static::YES_OR_NO_LOAN_LEASING_REPAYMENT_EXPENSES_SELECT)->firstWhere('value', $this->yes_or_no_loan_leasing_repayment_expenses)['label'] ?? '';
    }

    public function getCustomerProfileAttribute()
    {
        return $this->getMedia('customer_customer_profile')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getDocumentationsAttribute()
    {
        return $this->getMedia('customer_documentations')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getSpouseProfileAttribute()
    {
        return $this->getMedia('customer_spouse_profile')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getCustomerIdentityExpiredDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setCustomerIdentityExpiredDateAttribute($value)
    {
        $this->attributes['customer_identity_expired_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIsAgreeLabelAttribute()
    {
        return collect(static::IS_AGREE_SELECT)->firstWhere('value', $this->is_agree)['label'] ?? '';
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
