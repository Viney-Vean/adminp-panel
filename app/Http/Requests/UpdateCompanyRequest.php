<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'branch_id'      => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'name_en'        => [
                'string',
                'required',
                'unique:companies,name_en,' . request()->route('company')->id,
            ],
            'name_lc'        => [
                'string',
                'nullable',
            ],
            'business_type'  => [
                'string',
                'nullable',
            ],
            'industry'       => [
                'string',
                'nullable',
            ],
            'title'          => [
                'string',
                'nullable',
            ],
            'contact_person' => [
                'string',
                'nullable',
            ],
            'job_title'      => [
                'string',
                'nullable',
            ],
            'office_phone'   => [
                'string',
                'nullable',
            ],
            'mobile_phone_1' => [
                'string',
                'nullable',
            ],
            'mobile_phone_2' => [
                'string',
                'nullable',
            ],
            'cp_email'       => [
                'nullable',
            ],
            'email'          => [
                'nullable',
            ],
            'fax'            => [
                'string',
                'nullable',
            ],
            'website'        => [
                'string',
                'nullable',
            ],
            'facebook'       => [
                'string',
                'nullable',
            ],
            'logo'           => [
                'string',
                'nullable',
            ],
            'address'        => [
                'string',
                'nullable',
            ],
            'description'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
