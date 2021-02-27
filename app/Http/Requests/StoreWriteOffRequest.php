<?php

namespace App\Http\Requests;

use App\Models\WriteOff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWriteOffRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('write_off_create');
    }

    public function rules()
    {
        return [
            'branch_id'                                => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'contract'                                 => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer'                                 => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer_name'                            => [
                'string',
                'nullable',
            ],
            'currency_id'                              => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'dd_account_id'                            => [
                'integer',
                'exists:accounts,id',
                'nullable',
            ],
            'approve_amount'                           => [
                'numeric',
                'nullable',
            ],
            'disburse_amount'                          => [
                'numeric',
                'nullable',
            ],
            'balance'                                  => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_current_installment'      => [
                'numeric',
                'nullable',
            ],
            'principal_due'                            => [
                'numeric',
                'nullable',
            ],
            'interest_due'                             => [
                'numeric',
                'nullable',
            ],
            'charge_due'                               => [
                'numeric',
                'nullable',
            ],
            'penalty_due'                              => [
                'numeric',
                'nullable',
            ],
            'orig_balance'                             => [
                'numeric',
                'nullable',
            ],
            'orig_accrue_interest_current_installment' => [
                'numeric',
                'nullable',
            ],
            'orig_charge'                              => [
                'numeric',
                'nullable',
            ],
            'orig_principal_due'                       => [
                'numeric',
                'nullable',
            ],
            'orig_interest_due'                        => [
                'numeric',
                'nullable',
            ],
            'orig_charge_due'                          => [
                'numeric',
                'nullable',
            ],
            'orig_penalty_due'                         => [
                'numeric',
                'nullable',
            ],
            'write_off_date'                           => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'description'                              => [
                'string',
                'nullable',
            ],
        ];
    }
}
