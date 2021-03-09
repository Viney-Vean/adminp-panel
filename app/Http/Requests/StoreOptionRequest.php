<?php

namespace App\Http\Requests;

use App\Models\Option;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('option_create');
    }

    public function rules()
    {
        return [
            'group_id' => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'key'      => [
                'string',
                'required',
                'unique:options',
            ],
            'value'    => [
                'string',
                'required',
            ],
            'label'    => [
                'string',
                'required',
            ],
            'order'    => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
