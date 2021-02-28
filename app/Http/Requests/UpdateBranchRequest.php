<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_edit');
    }

    public function rules()
    {
        return [
            'branch'              => [
                'string',
                'nullable',
            ],
            'name_en'             => [
                'string',
                'required',
                'unique:branches,name_en,' . request()->route('branch')->id,
            ],
            'name_lc'             => [
                'string',
                'nullable',
            ],
            'title'               => [
                'string',
                'required',
            ],
            'branch_manager_en'   => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'branch_manager_lc'   => [
                'string',
                'min:5',
                'max:100',
                'required',
            ],
            'office_phone_number' => [
                'string',
                'min:9',
                'max:15',
                'required',
            ],
            'mobile_phone'        => [
                'string',
                'min:9',
                'max:15',
                'required',
            ],
            'email'               => [
                'string',
                'nullable',
            ],
            'fax'                 => [
                'string',
                'required',
            ],
            'facebook'            => [
                'string',
                'min:1',
                'max:20',
                'nullable',
            ],
            'address'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
