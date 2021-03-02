<?php

namespace App\Http\Requests;

use App\Models\SystemDate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSystemDateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('system_date_create');
    }

    public function rules()
    {
        return [
            'branch_id'           => [
                'integer',
                'exists:branches,id',
                'nullable',
            ],
            'current_system_date' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'next_system_date'    => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'next_week_end'       => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'next_month_end'      => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'next_year_end'       => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'previous_year_end'   => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'previous_month_end'  => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
        ];
    }
}
