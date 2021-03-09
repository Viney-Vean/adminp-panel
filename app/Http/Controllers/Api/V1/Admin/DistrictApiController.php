<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use App\Http\Resources\Admin\DistrictResource;
use App\Models\Branch;
use App\Models\District;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DistrictApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('district_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictResource(District::with(['branch', 'province'])->advancedFilter());
    }

    public function store(StoreDistrictRequest $request)
    {
        $district = District::create($request->validated());

        return (new DistrictResource($district))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(District $district)
    {
        abort_if(Gate::denies('district_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'   => Branch::get(['id', 'name_en']),
                'province' => Province::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(District $district)
    {
        abort_if(Gate::denies('district_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictResource($district->load(['branch', 'province']));
    }

    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->update($request->validated());

        return (new DistrictResource($district))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(District $district)
    {
        abort_if(Gate::denies('district_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DistrictResource($district->load(['branch', 'province'])),
            'meta' => [
                'branch'   => Branch::get(['id', 'name_en']),
                'province' => Province::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(District $district)
    {
        abort_if(Gate::denies('district_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $district->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
