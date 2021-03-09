<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
    }

    public function rules()
    {
        return [
            'customer_name'        => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'branch_id'            => [
                'integer',
                'exists:branches,id',
                'required',
            ],
            'given_name_en'        => [
                'string',
                'required',
            ],
            'surname_en'           => [
                'string',
                'required',
            ],
            'given_name_lc'        => [
                'string',
                'nullable',
            ],
            'surname_lc'           => [
                'string',
                'nullable',
            ],
            'title'                => [
                'required',
                'in:' . implode(',', Arr::pluck(Customer::TITLE_SELECT, 'value')),
            ],
            'gender_id'            => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'date_of_birth'        => [
                'date_format:' . config('project.date_format'),
                'required',
            ],
            'customer_type_id'     => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'resident_status_id'   => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'education_level_id'   => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'officer_id'           => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'house_no'             => [
                'string',
                'nullable',
            ],
            'street'               => [
                'string',
                'nullable',
            ],
            'phone_1'              => [
                'string',
                'nullable',
            ],
            'phone_2'              => [
                'string',
                'nullable',
            ],
            'facebook'             => [
                'string',
                'nullable',
            ],
            'email'                => [
                'nullable',
            ],
            'location_mapping'     => [
                'string',
                'nullable',
            ],
            'family_given_name_en' => [
                'string',
                'nullable',
            ],
            'family_surname_en'    => [
                'string',
                'nullable',
            ],
            'family_given_name_lc' => [
                'string',
                'nullable',
            ],
            'family_surname_lc'    => [
                'string',
                'nullable',
            ],
            'family_date_of_birth' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'family_nationality'   => [
                'string',
                'nullable',
            ],
            'family_id_type'       => [
                'string',
                'nullable',
            ],
            'family_id_number'     => [
                'string',
                'nullable',
            ],
            'family_issue_place'   => [
                'string',
                'nullable',
            ],
            'family_issue_date'    => [
                'string',
                'nullable',
            ],
            'family_expiry_date'   => [
                'string',
                'nullable',
            ],
            'spouse_employment'    => [
                'string',
                'nullable',
            ],
            'family_phone_1'       => [
                'string',
                'nullable',
            ],
            'family_phone_2'       => [
                'string',
                'nullable',
            ],
            'house_ownership'      => [
                'string',
                'nullable',
            ],
            'family_member'        => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'active_member'        => [
                'string',
                'nullable',
            ],
            'employment'           => [
                'string',
                'nullable',
            ],
            'company_name'         => [
                'string',
                'nullable',
            ],
            'employer_name'        => [
                'string',
                'nullable',
            ],
            'business_type'        => [
                'string',
                'nullable',
            ],
            'position'             => [
                'string',
                'nullable',
            ],
            'company_country'      => [
                'string',
                'nullable',
            ],
            'company_province'     => [
                'string',
                'nullable',
            ],
            'company_district'     => [
                'string',
                'nullable',
            ],
            'company_commune'      => [
                'string',
                'nullable',
            ],
            'company_village'      => [
                'string',
                'nullable',
            ],
            'company_street'       => [
                'string',
                'nullable',
            ],
            'company_no'           => [
                'string',
                'nullable',
            ],
            'company_telephone'    => [
                'string',
                'nullable',
            ],
            'company_fax'          => [
                'string',
                'nullable',
            ],
            'company_email'        => [
                'nullable',
            ],
            'year_of_employed'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
