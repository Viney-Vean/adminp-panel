<?php

namespace App\Http\Requests;

use App\Models\Contract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contract_edit');
    }

    public function rules()
    {
        return [
            'branch_id'                              => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'customer_id'                            => [
                'integer',
                'exists:customers,id',
                'required',
            ],
            'code'                                   => [
                'string',
                'nullable',
            ],
            'application_id'                         => [
                'integer',
                'exists:applications,id',
                'nullable',
            ],
            'dd_account_id'                          => [
                'integer',
                'exists:accounts,id',
                'nullable',
            ],
            'currency_id'                            => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'loan_product_id'                        => [
                'integer',
                'exists:loan_products,id',
                'nullable',
            ],
            'approve_amount'                         => [
                'numeric',
                'nullable',
            ],
            'disburse_amount'                        => [
                'numeric',
                'nullable',
            ],
            'outstanding'                            => [
                'numeric',
                'nullable',
            ],
            'balance'                                => [
                'numeric',
                'nullable',
            ],
            'transaction_date'                       => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'maturity_date'                          => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'interest_rate'                          => [
                'numeric',
                'nullable',
            ],
            'repayment_method'                       => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Contract::REPAYMENT_METHOD_SELECT, 'value')),
            ],
            'repayment_frequency'                    => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Contract::REPAYMENT_FREQUENCY_SELECT, 'value')),
            ],
            'frequency'                              => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'term'                                   => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'installment'                            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'first_collection_date'                  => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'contract_type'                          => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Contract::CONTRACT_TYPE_SELECT, 'value')),
            ],
            'more_than_one_year'                     => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Contract::MORE_THAN_ONE_YEAR_SELECT, 'value')),
            ],
            'provision_class_id'                     => [
                'integer',
                'exists:provisions,id',
                'nullable',
            ],
            'officer_id'                             => [
                'integer',
                'exists:officers,id',
                'nullable',
            ],
            'total_interest'                         => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_per_day'                => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'interest_income_earn'                   => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_receivable'             => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_current_installment'    => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_current_month'          => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_previous_month'         => [
                'numeric',
                'nullable',
            ],
            'accrue_regular_fee_per_day'             => [
                'numeric',
                'nullable',
            ],
            'accrue_regular_fee_receivable'          => [
                'numeric',
                'nullable',
            ],
            'accrue_regular_fee_current_installment' => [
                'numeric',
                'nullable',
            ],
            'accrue_regular_fee_current_month'       => [
                'numeric',
                'nullable',
            ],
            'accrue_regular_fee_prev_month'          => [
                'numeric',
                'nullable',
            ],
            'admin_fee_earn'                         => [
                'numeric',
                'nullable',
            ],
            'admin_fee_unearn'                       => [
                'numeric',
                'nullable',
            ],
            'admin_fee_per_day'                      => [
                'numeric',
                'nullable',
            ],
            'next_run_date'                          => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'principal_due'                          => [
                'numeric',
                'nullable',
            ],
            'interest_due'                           => [
                'numeric',
                'nullable',
            ],
            'charge_due'                             => [
                'numeric',
                'nullable',
            ],
            'penalty_due'                            => [
                'numeric',
                'nullable',
            ],
            'total_overdue'                          => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'num_day_due'                            => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'provision_amount'                       => [
                'numeric',
                'nullable',
            ],
            'provision_amount_lcy'                   => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
