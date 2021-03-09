<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommuneRequest;
use App\Http\Requests\UpdateCommuneRequest;
use App\Http\Resources\Admin\CommuneResource;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\District;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommuneApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commune_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommuneResource(Commune::with(['branch', 'district'])->advancedFilter());
    }

    public function store(StoreCommuneRequest $request)
    {
        $commune = Commune::create($request->validated());

        return (new CommuneResource($commune))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Commune $commune)
    {
        abort_if(Gate::denies('commune_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'   => Branch::get(['id', 'name_en']),
                'district' => District::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(Commune $commune)
    {
        abort_if(Gate::denies('commune_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommuneResource($commune->load(['branch', 'district']));
    }

    public function update(UpdateCommuneRequest $request, Commune $commune)
    {
        $commune->update($request->validated());

        return (new CommuneResource($commune))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Commune $commune)
    {
        abort_if(Gate::denies('commune_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CommuneResource($commune->load(['branch', 'district'])),
            'meta' => [
                'branch'   => Branch::get(['id', 'name_en']),
                'district' => District::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(Commune $commune)
    {
        abort_if(Gate::denies('commune_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commune->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
