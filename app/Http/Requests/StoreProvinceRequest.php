<?php

namespace App\Http\Requests;

use App\Models\Province;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProvinceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('province_create');
    }

    public function rules()
    {
        return [
            'branch_id'  => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'country_id' => [
                'integer',
                'exists:countries,id',
                'required',
            ],
            'name_en'    => [
                'string',
                'required',
                'unique:provinces',
            ],
            'name_lc'    => [
                'string',
                'nullable',
            ],
            'code'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
