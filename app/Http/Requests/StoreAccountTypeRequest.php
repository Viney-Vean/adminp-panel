<?php

namespace App\Http\Requests;

use App\Models\AccountType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAccountTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_type_create');
    }

    public function rules()
    {
        return [
            'description' => [
                'string',
                'required',
                'unique:account_types',
            ],
        ];
    }
}
