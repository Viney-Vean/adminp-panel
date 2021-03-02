<?php

namespace App\Http\Requests;

use App\Models\CollectionSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCollectionSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('collection_setting_create');
    }

    public function rules()
    {
        return [
            'past_due'                    => [
                'string',
                'nullable',
            ],
            'pre_grace'                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'grace'                       => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'branch_id'                   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'collection_order'            => [
                'string',
                'nullable',
            ],
            'terminate_insufficient_fund' => [
                'string',
                'nullable',
            ],
            'penalty_collection_option'   => [
                'string',
                'nullable',
            ],
            'penalty_method'              => [
                'string',
                'nullable',
            ],
            'penalty_calculation_base'    => [
                'string',
                'nullable',
            ],
            'max_day_penalty_calculation' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'write_off_class'             => [
                'string',
                'nullable',
            ],
            'pd_collection_method'        => [
                'string',
                'nullable',
            ],
            'pre_termination_option'      => [
                'string',
                'nullable',
            ],
            'pre_termination_duration'    => [
                'string',
                'nullable',
            ],
            'pre_terminationd_type'       => [
                'string',
                'nullable',
            ],
            'pre_termination_percentage'  => [
                'numeric',
                'nullable',
            ],
            'amend_deduct_option'         => [
                'string',
                'nullable',
            ],
            'amend_deduct_duration'       => [
                'numeric',
                'nullable',
            ],
            'amend_deductd_type'          => [
                'string',
                'nullable',
            ],
            'amend_deduct_percentage'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
