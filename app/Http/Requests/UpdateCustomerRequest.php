<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    public function rules()
    {
        return [
            'customer_name'                             => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'customer_last_name'                        => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'customer_nickname'                         => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
            'customer_gender'                           => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Customer::CUSTOMER_GENDER_SELECT, 'value')),
            ],
            'customer_date_of_birth'                    => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'customer_nationality'                      => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
            'customer_phone'                            => [
                'string',
                'min:9',
                'max:15',
                'nullable',
            ],
            'customer_business_phone'                   => [
                'string',
                'min:9',
                'max:15',
                'nullable',
            ],
            'customer_other_phone'                      => [
                'string',
                'min:9',
                'max:15',
                'nullable',
            ],
            'customer_mail'                             => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'customer_identity_type'                    => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Customer::CUSTOMER_IDENTITY_TYPE_SELECT, 'value')),
            ],
            'customer_salary_slip'                      => [
                'numeric',
                'nullable',
            ],
            'customer_id_card'                          => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'customer_back_id_card'                     => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'selfies_photo'                             => [
                'array',
                'nullable',
            ],
            'selfies_photo.*.id'                        => [
                'integer',
                'exists:media,id',
            ],
            'number_of_children'                        => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'number_of_family_member'                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'cbc_check'                                 => [
                'string',
                'nullable',
            ],
            'cbc_scores'                                => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'shift_works'                               => [
                'string',
                'nullable',
            ],
            'businesses_income'                         => [
                'numeric',
                'nullable',
            ],
            'type_of_business_activities'               => [
                'string',
                'nullable',
            ],
            'general_expenses'                          => [
                'string',
                'nullable',
            ],
            'yes_or_no_loan_leasing_repayment_expenses' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Customer::YES_OR_NO_LOAN_LEASING_REPAYMENT_EXPENSES_SELECT, 'value')),
            ],
            'name_of_institution'                       => [
                'string',
                'nullable',
            ],
            'customer_identity_number'                  => [
                'string',
                'nullable',
            ],
            'customer_identity_date'                    => [
                'string',
                'nullable',
            ],
            'customer_vehicle'                          => [
                'string',
                'nullable',
            ],
            'house_no'                                  => [
                'string',
                'nullable',
            ],
            'street_no'                                 => [
                'string',
                'nullable',
            ],
            'address'                                   => [
                'string',
                'nullable',
            ],
            'customer_status'                           => [
                'string',
                'nullable',
            ],
            'customer_blanklist'                        => [
                'string',
                'nullable',
            ],
            'customer_profile'                          => [
                'array',
                'nullable',
            ],
            'customer_profile.*.id'                     => [
                'integer',
                'exists:media,id',
            ],
            'documentations'                            => [
                'array',
                'nullable',
            ],
            'documentations.*.id'                       => [
                'integer',
                'exists:media,id',
            ],
            'customer_occupation'                       => [
                'string',
                'nullable',
            ],
            'customer_income'                           => [
                'string',
                'nullable',
            ],
            'income_from_salary'                        => [
                'string',
                'nullable',
            ],
            'asset_type'                                => [
                'string',
                'nullable',
            ],
            'asset'                                     => [
                'string',
                'nullable',
            ],
            'collateral'                                => [
                'string',
                'nullable',
            ],
            'customer_currency_income'                  => [
                'string',
                'nullable',
            ],
            'spouse_currency_income'                    => [
                'string',
                'nullable',
            ],
            'spouse'                                    => [
                'string',
                'nullable',
            ],
            'spouse_name'                               => [
                'string',
                'nullable',
            ],
            'spouse_gender'                             => [
                'string',
                'nullable',
            ],
            'spouse_date_of_birth'                      => [
                'string',
                'nullable',
            ],
            'spouse_nationality'                        => [
                'string',
                'nullable',
            ],
            'spouse_phone'                              => [
                'string',
                'nullable',
            ],
            'spouse_mail'                               => [
                'string',
                'nullable',
            ],
            'spouse_identity_type'                      => [
                'string',
                'nullable',
            ],
            'spouse_identity_number'                    => [
                'string',
                'nullable',
            ],
            'spouse_identity_date'                      => [
                'string',
                'nullable',
            ],
            'spouse_profile'                            => [
                'array',
                'nullable',
            ],
            'spouse_profile.*.id'                       => [
                'integer',
                'exists:media,id',
            ],
            'spouse_occupation'                         => [
                'string',
                'nullable',
            ],
            'spouse_income'                             => [
                'string',
                'nullable',
            ],
            'is_staff'                                  => [
                'string',
                'nullable',
            ],
            'is_guarantor'                              => [
                'string',
                'nullable',
            ],
            'user'                                      => [
                'string',
                'nullable',
            ],
            'branch'                                    => [
                'string',
                'nullable',
            ],
            'password'                                  => [
                'string',
                'nullable',
            ],
            'remember_token'                            => [
                'string',
                'nullable',
            ],
            'created_by'                                => [
                'string',
                'nullable',
            ],
            'updated_by'                                => [
                'string',
                'nullable',
            ],
            'marital_status'                            => [
                'string',
                'nullable',
            ],
            'customer_living_condition'                 => [
                'string',
                'nullable',
            ],
            'customer_latin_name'                       => [
                'string',
                'nullable',
            ],
            'customer_identity_expired_date'            => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'customer_working_period'                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer_work_experience'                  => [
                'string',
                'nullable',
            ],
            'customer_employment_status'                => [
                'string',
                'nullable',
            ],
            'customer_organization'                     => [
                'string',
                'nullable',
            ],
            'customer_organization_house_no'            => [
                'string',
                'nullable',
            ],
            'customer_organization_street_no'           => [
                'string',
                'nullable',
            ],
            'customer_organization_address'             => [
                'string',
                'nullable',
            ],
            'relationship'                              => [
                'string',
                'nullable',
            ],
            'customer_type'                             => [
                'string',
                'nullable',
            ],
            'scores'                                    => [
                'string',
                'nullable',
            ],
            'is_agree'                                  => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Customer::IS_AGREE_SELECT, 'value')),
            ],
            'recommended'                               => [
                'string',
                'nullable',
            ],
            'percentage'                                => [
                'string',
                'nullable',
            ],
            'number_share'                              => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'member_type'                               => [
                'string',
                'nullable',
            ],
            'investor_type'                             => [
                'string',
                'nullable',
            ],
            'about'                                     => [
                'string',
                'nullable',
            ],
            'qiid'                                      => [
                'string',
                'nullable',
            ],
            'json'                                      => [
                'string',
                'nullable',
            ],
        ];
    }
}
