<?php

namespace App\Http\Requests;

use App\Models\Officer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateOfficerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('officer_edit');
    }

    public function rules()
    {
        return [
            'branch_id'       => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'given_name_en'   => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'surname_en'      => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'given_name_lc'   => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'sur_name_en'     => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'salutation_id'   => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'gender'          => [
                'required',
                'in:' . implode(',', Arr::pluck(Officer::GENDER_SELECT, 'value')),
            ],
            'phone_1'         => [
                'string',
                'min:9',
                'max:15',
                'required',
            ],
            'phone_2'         => [
                'string',
                'min:9',
                'max:15',
                'nullable',
            ],
            'unit_id'         => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'department_id'   => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'id_card_number'  => [
                'string',
                'nullable',
            ],
            'employment_date' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'user_id'         => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'active'          => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Officer::ACTIVE_SELECT, 'value')),
            ],
            'report_to_id'    => [
                'integer',
                'exists:officers,id',
                'nullable',
            ],
        ];
    }
}
