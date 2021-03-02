<?php

namespace App\Http\Requests;

use App\Models\AccountProductType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateAccountProductTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_product_type_edit');
    }

    public function rules()
    {
        return [
            'branch_id'    => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'description'  => [
                'string',
                'required',
                'unique:account_product_types,description,' . request()->route('account_product_type')->id,
            ],
            'account_type' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(AccountProductType::ACCOUNT_TYPE_SELECT, 'value')),
            ],
        ];
    }
}
