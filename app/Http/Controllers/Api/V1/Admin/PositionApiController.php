<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\Admin\PositionResource;
use App\Models\Branch;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PositionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('position_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PositionResource(Position::with(['branch'])->advancedFilter());
    }

    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->validated());

        return (new PositionResource($position))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Position $position)
    {
        abort_if(Gate::denies('position_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(Position $position)
    {
        abort_if(Gate::denies('position_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PositionResource($position->load(['branch']));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->validated());

        return (new PositionResource($position))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Position $position)
    {
        abort_if(Gate::denies('position_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PositionResource($position->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(Position $position)
    {
        abort_if(Gate::denies('position_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $position->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
