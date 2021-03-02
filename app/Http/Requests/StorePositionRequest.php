<?php

namespace App\Http\Requests;

use App\Models\Position;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('position_create');
    }

    public function rules()
    {
        return [
            'branch_id'   => [
                'integer',
                'exists:branches,id',
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
