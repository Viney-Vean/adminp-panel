<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('currency_create');
    }

    public function rules()
    {
        return [
            'branch_id'        => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'description'      => [
                'string',
                'required',
                'unique:currencies',
            ],
            'buy_rate'         => [
                'numeric',
                'nullable',
            ],
            'sell_rate'        => [
                'numeric',
                'nullable',
            ],
            'rnd_mode'         => [
                'string',
                'nullable',
            ],
            'minimum_unit'     => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'decimal_place'    => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'currency_sign'    => [
                'string',
                'nullable',
            ],
            'revaluation_rate' => [
                'numeric',
                'nullable',
            ],
            'other_rate'       => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
