<?php

namespace App\Http\Requests;

use App\Models\Position;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('position_edit');
    }

    public function rules()
    {
        return [
            'branch_id'   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'unit'        => [
                'string',
                'nullable',
            ],
            'department'  => [
                'string',
                'nullable',
            ],
            'position_en' => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'position_lc' => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
        ];
    }
}
