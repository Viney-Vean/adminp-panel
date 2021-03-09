<?php

namespace App\Http\Requests;

use App\Models\District;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDistrictRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('district_edit');
    }

    public function rules()
    {
        return [
            'branch_id'   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'province_id' => [
                'integer',
                'exists:provinces,id',
                'required',
            ],
            'name_en'     => [
                'string',
                'required',
            ],
            'name_lc'     => [
                'string',
                'nullable',
            ],
            'code'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
