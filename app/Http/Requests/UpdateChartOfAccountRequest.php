<?php

namespace App\Http\Requests;

use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateChartOfAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chart_of_account_edit');
    }

    public function rules()
    {
        return [
            'branch_id'            => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'account_title'        => [
                'string',
                'min:1',
                'max:200',
                'nullable',
            ],
            'account_type_id'      => [
                'integer',
                'exists:account_types,id',
                'nullable',
            ],
            'classification'       => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::CLASSIFICATION_SELECT, 'value')),
            ],
            'main_account_id'      => [
                'integer',
                'exists:chart_of_accounts,id',
                'nullable',
            ],
            'currency_id'          => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'posting_side'         => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::POSTING_SIDE_SELECT, 'value')),
            ],
            'balance_side'         => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::BALANCE_SIDE_SELECT, 'value')),
            ],
            'allow_posting'        => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::ALLOW_POSTING_SELECT, 'value')),
            ],
            'allow_direct_posting' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::ALLOW_DIRECT_POSTING_SELECT, 'value')),
            ],
            'active'               => [
                'nullable',
                'in:' . implode(',', Arr::pluck(ChartOfAccount::ACTIVE_SELECT, 'value')),
            ],
            'description'          => [
                'string',
                'nullable',
            ],
        ];
    }
}
