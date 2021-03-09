<?php

namespace App\Http\Requests;

use App\Models\Commune;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommuneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commune_create');
    }

    public function rules()
    {
        return [
            'branch_id'   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'district_id' => [
                'integer',
                'exists:districts,id',
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
