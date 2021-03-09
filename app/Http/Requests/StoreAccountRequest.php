<?php

namespace App\Http\Requests;

use App\Models\Account;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_create');
    }

    public function rules()
    {
        return [
            'branch_id'           => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'customer'            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'account_name'        => [
                'string',
                'required',
            ],
            'chart_of_account_id' => [
                'integer',
                'exists:chart_of_accounts,id',
                'nullable',
            ],
            'balance_side'        => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Account::BALANCE_SIDE_SELECT, 'value')),
            ],
            'currency_id'         => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'open_date'           => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'balance'             => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'available_bal'       => [
                'numeric',
                'nullable',
            ],
            'account_status'      => [
                'string',
                'nullable',
            ],
            'blocked_bal'         => [
                'numeric',
                'nullable',
            ],
            'closing_date'        => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'block'               => [
                'string',
                'nullable',
            ],
            'block_reason'        => [
                'string',
                'nullable',
            ],
            'type'                => [
                'string',
                'nullable',
            ],
            'account_product_id'  => [
                'integer',
                'exists:account_products,id',
                'nullable',
            ],
        ];
    }
}
