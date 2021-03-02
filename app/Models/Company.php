<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Company extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'companies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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
        'cp_email',
        'email',
        'fax',
        'website',
        'facebook',
        'logo',
        'address',
        'description',
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
        'cp_email',
        'email',
        'fax',
        'website',
        'facebook',
        'logo',
        'address',
        'description',
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
        'cp_email',
        'email',
        'fax',
        'website',
        'facebook',
        'logo',
        'address',
        'description',
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
}
