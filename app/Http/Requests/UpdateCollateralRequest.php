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
            'customer_id'        => [
                'integer',
                'exists:customers,id',
                'required',
            ],
            'description'        => [
                'string',
                'required',
            ],
            'collateral_type_id' => [
                'integer',
                'exists:options,id',
                'nullable',
            ],
            'currency_id'        => [
                'integer',
                'exists:currencies,id',
                'nullable',
            ],
            'purchase_price'     => [
                'numeric',
                'nullable',
            ],
            'valuation_price'    => [
                'numeric',
                'nullable',
            ],
            'valuer'             => [
                'string',
                'nullable',
            ],
            'issued_date'        => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'issued_place'       => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'issued_by'          => [
                'string',
                'nullable',
            ],
            'collateral_number'  => [
                'string',
                'nullable',
            ],
            'province_id'        => [
                'integer',
                'exists:provinces,id',
                'nullable',
            ],
            'district_id'        => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
            'commune_id'         => [
                'integer',
                'exists:communes,id',
                'nullable',
            ],
            'village_id'         => [
                'integer',
                'exists:villages,id',
                'nullable',
            ],
            'received_date'      => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'withdrawal_date'    => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
        ];
    }
}
