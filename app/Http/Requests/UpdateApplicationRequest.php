<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_edit');
    }

    public function rules()
    {
        return [
            'branch_id'           => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'description'         => [
                'string',
                'nullable',
            ],
            'application_date'    => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'currency_id'         => [
                'integer',
                'exists:currencies,id',
                'required',
            ],
            'loan_product_id'     => [
                'integer',
                'exists:loan_products,id',
                'nullable',
            ],
            'apply_amount'        => [
                'numeric',
                'required',
            ],
            'approve_amount'      => [
                'numeric',
                'nullable',
            ],
            'repayment_method'    => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Application::REPAYMENT_METHOD_SELECT, 'value')),
            ],
            'repayment_frequency' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Application::REPAYMENT_FREQUENCY_SELECT, 'value')),
            ],
            'frequency'           => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'term'                => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'installment'         => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'interest_rate'       => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
