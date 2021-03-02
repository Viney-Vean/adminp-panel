<?php

namespace App\Http\Requests;

use App\Models\SystemSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSystemSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('system_setting_create');
    }

    public function rules()
    {
        return [
            'branch'                     => [
                'string',
                'nullable',
            ],
            'principal_collection'       => [
                'string',
                'nullable',
            ],
            'interest_collection'        => [
                'string',
                'nullable',
            ],
            'admin_fee_collection'       => [
                'string',
                'nullable',
            ],
            'pd_principal_collection'    => [
                'string',
                'nullable',
            ],
            'pd_interest_collection'     => [
                'string',
                'nullable',
            ],
            'charge_collection'          => [
                'string',
                'nullable',
            ],
            'penalty_collection'         => [
                'string',
                'nullable',
            ],
            'loan_accrual_interest'      => [
                'string',
                'nullable',
            ],
            'amendment_add_principal'    => [
                'string',
                'nullable',
            ],
            'amendment_duduct_principal' => [
                'string',
                'nullable',
            ],
            'terminate'                  => [
                'string',
                'nullable',
            ],
            'write_off_charge'           => [
                'string',
                'nullable',
            ],
            'write_off_penalty'          => [
                'string',
                'nullable',
            ],
            'write_off_interest'         => [
                'string',
                'nullable',
            ],
            'write_off_principal'        => [
                'string',
                'nullable',
            ],
            'waive_charge'               => [
                'string',
                'nullable',
            ],
            'waive_penalty'              => [
                'string',
                'nullable',
            ],
        ];
    }
}
