<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficerRequest;
use App\Http\Requests\UpdateOfficerRequest;
use App\Http\Resources\Admin\OfficerResource;
use App\Models\Branch;
use App\Models\Officer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfficerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('officer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfficerResource(Officer::with(['branch', 'user'])->advancedFilter());
    }

    public function store(StoreOfficerRequest $request)
    {
        $officer = Officer::create($request->validated());

        return (new OfficerResource($officer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Officer $officer)
    {
        abort_if(Gate::denies('officer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
                'user'   => User::get(['id', 'name']),
                'active' => Officer::ACTIVE_SELECT,
            ],
        ]);
    }

    public function show(Officer $officer)
    {
        abort_if(Gate::denies('officer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfficerResource($officer->load(['branch', 'user']));
    }

    public function update(UpdateOfficerRequest $request, Officer $officer)
    {
        $officer->update($request->validated());

        return (new OfficerResource($officer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Officer $officer)
    {
        abort_if(Gate::denies('officer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new OfficerResource($officer->load(['branch', 'user'])),
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
                'user'   => User::get(['id', 'name']),
                'active' => Officer::ACTIVE_SELECT,
            ],
        ]);
    }

    public function destroy(Officer $officer)
    {
        abort_if(Gate::denies('officer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $officer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
