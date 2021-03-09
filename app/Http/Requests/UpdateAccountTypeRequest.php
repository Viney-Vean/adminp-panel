<?php

namespace App\Http\Requests;

use App\Models\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_type_edit');
    }

    public function rules()
    {
        return [
            'branch_id'   => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'description' => [
                'string',
                'required',
                'unique:account_types,description,' . request()->route('account_type')->id,
            ],
        ];
    }
}
