<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvisionRequest;
use App\Http\Requests\UpdateProvisionRequest;
use App\Http\Resources\Admin\ProvisionResource;
use App\Models\Branch;
use App\Models\Provision;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvisionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provision_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvisionResource(Provision::with(['branch'])->advancedFilter());
    }

    public function store(StoreProvisionRequest $request)
    {
        $provision = Provision::create($request->validated());

        return (new ProvisionResource($provision))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Provision $provision)
    {
        abort_if(Gate::denies('provision_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'                      => Branch::get(['id', 'branch']),
                'contract_type'               => Provision::CONTRACT_TYPE_SELECT,
                'more_than_one_year'          => Provision::MORE_THAN_ONE_YEAR_SELECT,
                'interest_income_recognition' => Provision::INTEREST_INCOME_RECOGNITION_SELECT,
            ],
        ]);
    }

    public function show(Provision $provision)
    {
        abort_if(Gate::denies('provision_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvisionResource($provision->load(['branch']));
    }

    public function update(UpdateProvisionRequest $request, Provision $provision)
    {
        $provision->update($request->validated());

        return (new ProvisionResource($provision))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Provision $provision)
    {
        abort_if(Gate::denies('provision_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ProvisionResource($provision->load(['branch'])),
            'meta' => [
                'branch'                      => Branch::get(['id', 'branch']),
                'contract_type'               => Provision::CONTRACT_TYPE_SELECT,
                'more_than_one_year'          => Provision::MORE_THAN_ONE_YEAR_SELECT,
                'interest_income_recognition' => Provision::INTEREST_INCOME_RECOGNITION_SELECT,
            ],
        ]);
    }

    public function destroy(Provision $provision)
    {
        abort_if(Gate::denies('provision_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provision->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
