<?php

namespace App\Http\Requests;

use App\Models\Collateral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCollateralRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('collateral_edit');
    }

    public function rules()
    {
        return [
            'customer_id'       => [
                'integer',
                'exists:customers,id',
                'nullable',
            ],
            'description'       => [
                'string',
                'nullable',
            ],
            'collateral'        => [
                'string',
                'nullable',
            ],
            'collateral_type'   => [
                'string',
                'nullable',
            ],
            'currency'          => [
                'string',
                'nullable',
            ],
            'purchase_price'    => [
                'numeric',
                'nullable',
            ],
            'valuation_price'   => [
                'numeric',
                'nullable',
            ],
            'valuer'            => [
                'string',
                'nullable',
            ],
            'issued_date'       => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'issued_place'      => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'issued_by'         => [
                'string',
                'nullable',
            ],
            'collateral_number' => [
                'string',
                'nullable',
            ],
            'province'          => [
                'string',
                'nullable',
            ],
            'district'          => [
                'string',
                'nullable',
            ],
            'commune'           => [
                'string',
                'nullable',
            ],
            'village'           => [
                'string',
                'nullable',
            ],
            'received_date'     => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'withdrawal_date'   => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
        ];
    }
}
