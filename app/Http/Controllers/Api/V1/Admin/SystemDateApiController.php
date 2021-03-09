<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemDateRequest;
use App\Http\Requests\UpdateSystemDateRequest;
use App\Http\Resources\Admin\SystemDateResource;
use App\Models\Branch;
use App\Models\SystemDate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemDateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_date_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemDateResource(SystemDate::with(['branch'])->advancedFilter());
    }

    public function store(StoreSystemDateRequest $request)
    {
        $systemDate = SystemDate::create($request->validated());

        return (new SystemDateResource($systemDate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(SystemDate $systemDate)
    {
        abort_if(Gate::denies('system_date_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(SystemDate $systemDate)
    {
        abort_if(Gate::denies('system_date_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemDateResource($systemDate->load(['branch']));
    }

    public function update(UpdateSystemDateRequest $request, SystemDate $systemDate)
    {
        $systemDate->update($request->validated());

        return (new SystemDateResource($systemDate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(SystemDate $systemDate)
    {
        abort_if(Gate::denies('system_date_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new SystemDateResource($systemDate->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(SystemDate $systemDate)
    {
        abort_if(Gate::denies('system_date_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemDate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
