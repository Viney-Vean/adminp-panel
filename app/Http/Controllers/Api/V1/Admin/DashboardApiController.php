<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $line0 = new ChartsService([
            'title'            => 'User Report',
            'chart_type'       => 'line',
            'model'            => 'App\Models\User',
            'group_by_field'   => 'email_verified_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-12',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        return response()->json(compact('line0'));
    }
}
