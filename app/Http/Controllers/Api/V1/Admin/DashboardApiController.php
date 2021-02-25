<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $line0 = new ChartsService([
            'title'            => 'Monthly Users Report',
            'chart_type'       => 'line',
            'model'            => 'App\Models\User',
            'group_by_field'   => 'email_verified_at',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-3',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        $bar1 = new ChartsService([
            'title'            => 'Monthly Income Report',
            'chart_type'       => 'bar',
            'model'            => 'App\Models\Income',
            'group_by_field'   => 'entry_date',
            'group_by_period'  => 'day',
            'column_class'     => 'col-md-12',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        $latest2 = new ChartsService([
            'title'            => 'Monthly Customer Report',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\CrmCustomer',
            'column_class'     => 'col-md-3',
            'fields'           => ['id', 'first_name', 'last_name', 'email', 'phone', 'address', 'skype', 'website', 'created_at'],
            'limit'            => 5,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        $stats3 = new ChartsService([
            'title'            => 'Monthly Customer Number Block Report',
            'chart_type'       => 'stats',
            'model'            => 'App\Models\CrmCustomer',
            'column_class'     => 'col-md-3',
            'footer_icon'      => 'date_range',
            'footer_text'      => 'Last 30 days',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        return response()->json(compact('line0', 'bar1', 'latest2', 'stats3'));
    }
}
