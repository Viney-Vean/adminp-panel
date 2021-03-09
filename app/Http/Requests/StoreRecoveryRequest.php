<?php

namespace App\Http\Requests;

use App\Models\Recovery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRecoveryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recovery_create');
    }

    public function rules()
    {
        return [
            'branch_id'        => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'loan'             => [
                'string',
                'nullable',
            ],
            'description'      => [
                'string',
                'nullable',
            ],
            'currency_id'      => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'dd_account_id'    => [
                'integer',
                'exists:accounts,id',
                'nullable',
            ],
            'recovery_amount'  => [
                'numeric',
                'nullable',
            ],
            'recovery_date'    => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'principal_amount' => [
                'numeric',
                'nullable',
            ],
            'interest_amount'  => [
                'numeric',
                'nullable',
            ],
            'charge_amount'    => [
                'numeric',
                'nullable',
            ],
            'penalty_amount'   => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
