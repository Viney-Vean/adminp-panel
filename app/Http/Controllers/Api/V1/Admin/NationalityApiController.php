<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNationalityRequest;
use App\Http\Requests\UpdateNationalityRequest;
use App\Http\Resources\Admin\NationalityResource;
use App\Models\Branch;
use App\Models\Nationality;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NationalityApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nationality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NationalityResource(Nationality::with(['branch'])->advancedFilter());
    }

    public function store(StoreNationalityRequest $request)
    {
        $nationality = Nationality::create($request->validated());

        return (new NationalityResource($nationality))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Nationality $nationality)
    {
        abort_if(Gate::denies('nationality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(Nationality $nationality)
    {
        abort_if(Gate::denies('nationality_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NationalityResource($nationality->load(['branch']));
    }

    public function update(UpdateNationalityRequest $request, Nationality $nationality)
    {
        $nationality->update($request->validated());

        return (new NationalityResource($nationality))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Nationality $nationality)
    {
        abort_if(Gate::denies('nationality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new NationalityResource($nationality->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(Nationality $nationality)
    {
        abort_if(Gate::denies('nationality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nationality->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
