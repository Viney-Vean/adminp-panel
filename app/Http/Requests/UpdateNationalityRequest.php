<?php

namespace App\Http\Requests;

use App\Models\Nationality;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNationalityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nationality_edit');
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
                'unique:nationalities,name_en,' . request()->route('nationality')->id,
            ],
            'name_lc'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
