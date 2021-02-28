<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
            ],
            'email'              => [
                'required',
                'unique:users',
            ],
            'password'           => [
                'required',
            ],
            'roles'              => [
                'required',
                'array',
            ],
            'roles.*.id'         => [
                'integer',
                'exists:roles,id',
            ],
            'branch_id'          => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'access_branch'      => [
                'array',
            ],
            'access_branch.*.id' => [
                'integer',
                'exists:branches,id',
            ],
            'defualt_branch_id'  => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
        ];
    }
}
