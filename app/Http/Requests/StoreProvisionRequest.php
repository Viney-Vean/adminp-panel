<?php

namespace App\Http\Requests;

use App\Models\Provision;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreProvisionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provision_create');
    }

    public function rules()
    {
        return [
            'branch_id'                   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'class'                       => [
                'string',
                'nullable',
            ],
            'class_title'                 => [
                'string',
                'nullable',
            ],
            'overdue_from'                => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'overdue_to'                  => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'contract_type'               => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Provision::CONTRACT_TYPE_SELECT, 'value')),
            ],
            'more_than_one_year'          => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Provision::MORE_THAN_ONE_YEAR_SELECT, 'value')),
            ],
            'interest_income_recognition' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Provision::INTEREST_INCOME_RECOGNITION_SELECT, 'value')),
            ],
        ];
    }
}
