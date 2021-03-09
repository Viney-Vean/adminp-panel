<?php

namespace App\Http\Requests;

use App\Models\Nationality;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNationalityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nationality_create');
    }

    public function rules()
    {
        return [
            'branch_id' => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'name_en'   => [
                'string',
                'required',
                'unique:nationalities',
            ],
            'name_lc'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
