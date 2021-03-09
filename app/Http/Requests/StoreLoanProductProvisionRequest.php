<?php

namespace App\Http\Requests;

use App\Models\LoanProductProvision;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoanProductProvisionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('loan_product_provision_create');
    }

    public function rules()
    {
        return [
            'branch_id'                  => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'product_id'                 => [
                'integer',
                'exists:loan_products,id',
                'required',
            ],
            'class_id'                   => [
                'integer',
                'exists:provisions,id',
                'required',
            ],
            'outstanding_coa_id'         => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'air_coa_id'                 => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'interest_income_coa_id'     => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'interest_in_suspend_coa_id' => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'provision_expense_coa_id'   => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'provision_reserve_coa_id'   => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'penalty_coa_id'             => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'charge_income_coa_id'       => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'charge_in_suspend_coa_id'   => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'charge_receivable_coa_id'   => [
                'integer',
                'exists:chart_of_accounts,id',
                'required',
            ],
            'provision_booking'          => [
                'numeric',
                'required',
            ],
        ];
    }
}
