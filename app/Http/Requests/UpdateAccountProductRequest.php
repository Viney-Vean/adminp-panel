<?php

namespace App\Http\Requests;

use App\Models\AccountProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_product_edit');
    }

    public function rules()
    {
        return [
            'branch'                  => [
                'string',
                'nullable',
            ],
            'account_product_title'   => [
                'string',
                'required',
                'unique:account_products,account_product_title,' . request()->route('account_product')->id,
            ],
            'chart_of_account_id'     => [
                'integer',
                'exists:chart_of_accounts,id',
                'nullable',
            ],
            'currency'                => [
                'string',
                'nullable',
            ],
            'account_product_type_id' => [
                'integer',
                'exists:account_product_types,id',
                'nullable',
            ],
            'account_type_id'         => [
                'integer',
                'exists:account_types,id',
                'nullable',
            ],
            'interest_rate'           => [
                'numeric',
                'nullable',
            ],
            'charged_rate'            => [
                'numeric',
                'nullable',
            ],
            'tax_rate'                => [
                'numeric',
                'nullable',
            ],
            'balance_define'          => [
                'numeric',
                'nullable',
            ],
            'interest_day_basis'      => [
                'numeric',
                'nullable',
            ],
            'interest_accrual_basis'  => [
                'numeric',
                'nullable',
            ],
            'interest_capitalization' => [
                'numeric',
                'nullable',
            ],
            'dormant_day'             => [
                'string',
                'nullable',
            ],
            'interest_expense_coa'    => [
                'string',
                'nullable',
            ],
            'interest_payable_coa'    => [
                'string',
                'nullable',
            ],
            'interest_income_coa'     => [
                'string',
                'nullable',
            ],
            'interest_receivable_coa' => [
                'string',
                'nullable',
            ],
        ];
    }
}
