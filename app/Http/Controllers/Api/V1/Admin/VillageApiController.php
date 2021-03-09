<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVillageRequest;
use App\Http\Requests\UpdateVillageRequest;
use App\Http\Resources\Admin\VillageResource;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\Village;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VillageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('village_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VillageResource(Village::with(['branch', 'commune'])->advancedFilter());
    }

    public function store(StoreVillageRequest $request)
    {
        $village = Village::create($request->validated());

        return (new VillageResource($village))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Village $village)
    {
        abort_if(Gate::denies('village_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'  => Branch::get(['id', 'name_en']),
                'commune' => Commune::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(Village $village)
    {
        abort_if(Gate::denies('village_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VillageResource($village->load(['branch', 'commune']));
    }

    public function update(UpdateVillageRequest $request, Village $village)
    {
        $village->update($request->validated());

        return (new VillageResource($village))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Village $village)
    {
        abort_if(Gate::denies('village_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new VillageResource($village->load(['branch', 'commune'])),
            'meta' => [
                'branch'  => Branch::get(['id', 'name_en']),
                'commune' => Commune::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(Village $village)
    {
        abort_if(Gate::denies('village_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $village->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
