<?php

namespace App\Http\Requests;

use App\Models\Officer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreOfficerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('officer_create');
    }

    public function rules()
    {
        return [
            'branch_id'     => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'given_name_en' => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'surname_en'    => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'given_name_lc' => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'sur_name_en'   => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'title'         => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'gender'        => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'phone_1'       => [
                'string',
                'min:9',
                'max:15',
                'required',
            ],
            'phone_2'       => [
                'string',
                'min:9',
                'max:15',
                'required',
            ],
            'date_employ'   => [
                'date_format:' . config('project.date_format'),
                'required',
            ],
            'department'    => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'report_to'     => [
                'string',
                'min:5',
                'max:100',
                'nullable',
            ],
            'active'        => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Officer::ACTIVE_SELECT, 'value')),
            ],
            'user_id'       => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
