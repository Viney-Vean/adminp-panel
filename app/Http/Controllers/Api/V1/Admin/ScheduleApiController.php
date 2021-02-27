<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ScheduleResource;
use App\Models\Schedule;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScheduleResource(Schedule::with(['branch', 'loan'])->advancedFilter());
    }

    public function show(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScheduleResource($schedule->load(['branch', 'loan']));
    }
}
