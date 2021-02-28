<?php

namespace App\Http\Requests;

use App\Models\LoanProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateLoanProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('loan_product_edit');
    }

    public function rules()
    {
        return [
            'branch_id'                     => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'description'                   => [
                'string',
                'nullable',
            ],
            'currency_id'                   => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'repayment_method'              => [
                'string',
                'nullable',
            ],
            'day_basis_top_side'            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'day_basis_down_side'           => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'minimum_age'                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'maximum_age'                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'min_interest_rate'             => [
                'numeric',
                'nullable',
            ],
            'max_interest_rate'             => [
                'numeric',
                'nullable',
            ],
            'minimum_amount'                => [
                'numeric',
                'nullable',
            ],
            'maximum_amount'                => [
                'numeric',
                'nullable',
            ],
            'minimum_term_monthly'          => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'maximum_term_monthly'          => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'minimum_term_weekly'           => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'maximum_term_weekly'           => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'minimum_term_daily'            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'maximum_term_daily'            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'reduce_base_on'                => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::REDUCE_BASE_ON_SELECT, 'value')),
            ],
            'max_reduce_percentage'         => [
                'numeric',
                'nullable',
            ],
            'penalty_reduction_base_on'     => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::PENALTY_REDUCTION_BASE_ON_SELECT, 'value')),
            ],
            'max_penalty_reduce_percentage' => [
                'numeric',
                'nullable',
            ],
            'admin_fee_base_on'             => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::ADMIN_FEE_BASE_ON_SELECT, 'value')),
            ],
            'admin_fee_amount'              => [
                'numeric',
                'nullable',
            ],
            'admin_fee_accrual'             => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::ADMIN_FEE_ACCRUAL_SELECT, 'value')),
            ],
            'regular_fee_base_on'           => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::REGULAR_FEE_BASE_ON_SELECT, 'value')),
            ],
            'regular_fee_amount'            => [
                'numeric',
                'nullable',
            ],
            'regular_fee_accual'            => [
                'nullable',
                'in:' . implode(',', Arr::pluck(LoanProduct::REGULAR_FEE_ACCUAL_SELECT, 'value')),
            ],
            'fee_earn_coa_id'               => [
                'integer',
                'exists:chart_of_accounts,id',
                'nullable',
            ],
            'fee_unearn_coa_id'             => [
                'integer',
                'exists:chart_of_accounts,id',
                'nullable',
            ],
        ];
    }
}
