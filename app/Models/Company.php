<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use \DateTimeInterface;

class Company extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'companies';

    protected $appends = [
        'tax_regime_label',
        'logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TAX_REGIME_SELECT = [
        [
            'label' => 'Small',
            'value' => 'small',
        ],
        [
            'label' => 'Medium',
            'value' => 'medium',
        ],
        [
            'label' => 'Large',
            'value' => 'large',
        ],
    ];

    protected $orderable = [
        'id',
        'branch.name_en',
        'name_en',
        'name_lc',
        'business_type',
        'industry',
        'title',
        'contact_person',
        'job_title',
        'office_phone',
        'mobile_phone_1',
        'mobile_phone_2',
        'email',
        'fax',
        'website',
        'facebook',
        'address_en',
        'address_lc',
        'description',
        'contact_person_email',
        'registration_number',
        'tax_regime',
        'vat',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'name_en',
        'name_lc',
        'business_type',
        'industry',
        'title',
        'contact_person',
        'job_title',
        'office_phone',
        'mobile_phone_1',
        'mobile_phone_2',
        'email',
        'fax',
        'website',
        'facebook',
        'address_en',
        'address_lc',
        'description',
        'contact_person_email',
        'registration_number',
        'tax_regime',
        'vat',
    ];

    protected $fillable = [
        'branch_id',
        'name_en',
        'name_lc',
        'business_type',
        'industry',
        'title',
        'contact_person',
        'job_title',
        'office_phone',
        'mobile_phone_1',
        'mobile_phone_2',
        'email',
        'fax',
        'website',
        'facebook',
        'address_en',
        'address_lc',
        'description',
        'contact_person_email',
        'registration_number',
        'tax_regime',
        'vat',
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

    public function getTaxRegimeLabelAttribute()
    {
        return collect(static::TAX_REGIME_SELECT)->firstWhere('value', $this->tax_regime)['label'] ?? '';
    }

    public function getLogoAttribute()
    {
        return $this->getMedia('company_logo')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }
}
