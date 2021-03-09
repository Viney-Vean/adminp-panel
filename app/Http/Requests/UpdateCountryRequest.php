<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_edit');
    }

    public function rules()
    {
        return [
            'branch_id'       => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'country_code_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'iso_2'           => [
                'string',
                'nullable',
            ],
            'iso_3'           => [
                'string',
                'nullable',
            ],
            'name_en'         => [
                'string',
                'required',
                'unique:countries,name_en,' . request()->route('country')->id,
            ],
            'name_lc'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
