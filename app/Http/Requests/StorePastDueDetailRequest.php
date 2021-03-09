<?php

namespace App\Http\Requests;

use App\Models\PastDueDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePastDueDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('past_due_detail_create');
    }

    public function rules()
    {
        return [
            'schedule_id'             => [
                'integer',
                'exists:schedules,id',
                'nullable',
            ],
            'contract_id'             => [
                'integer',
                'exists:contracts,id',
                'nullable',
            ],
            'due_date'                => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'principal_due'           => [
                'numeric',
                'nullable',
            ],
            'out_principal'           => [
                'numeric',
                'nullable',
            ],
            'interest_due'            => [
                'numeric',
                'nullable',
            ],
            'out_interest'            => [
                'numeric',
                'nullable',
            ],
            'accrue_interest_out'     => [
                'numeric',
                'nullable',
            ],
            'charge_due'              => [
                'numeric',
                'nullable',
            ],
            'out_charge'              => [
                'numeric',
                'nullable',
            ],
            'penalty_due'             => [
                'numeric',
                'nullable',
            ],
            'out_penalty'             => [
                'numeric',
                'nullable',
            ],
            'numday_due'              => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'status_due'              => [
                'string',
                'nullable',
            ],
            'collect_penalty_amount'  => [
                'numeric',
                'nullable',
            ],
            'collect_interest_amount' => [
                'numeric',
                'nullable',
            ],
            'collect_charge_amount'   => [
                'numeric',
                'nullable',
            ],
            'waive_penalty_amount'    => [
                'numeric',
                'nullable',
            ],
            'waive_interest_amount'   => [
                'numeric',
                'nullable',
            ],
            'waive_charge_amount'     => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
