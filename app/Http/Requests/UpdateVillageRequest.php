<?php

namespace App\Http\Requests;

use App\Models\Village;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVillageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('village_edit');
    }

    public function rules()
    {
        return [
            'branch_id'  => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'commune_id' => [
                'integer',
                'exists:communes,id',
                'required',
            ],
            'name_en'    => [
                'string',
                'required',
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
