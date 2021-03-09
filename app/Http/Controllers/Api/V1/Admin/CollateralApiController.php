<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollateralRequest;
use App\Http\Requests\UpdateCollateralRequest;
use App\Http\Resources\Admin\CollateralResource;
use App\Models\Collateral;
use App\Models\Commune;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\District;
use App\Models\Option;
use App\Models\Province;
use App\Models\Village;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollateralApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('collateral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollateralResource(Collateral::with(['customer', 'collateralType', 'currency', 'province', 'district', 'commune', 'village'])->advancedFilter());
    }

    public function store(StoreCollateralRequest $request)
    {
        $collateral = Collateral::create($request->validated());

        return (new CollateralResource($collateral))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Collateral $collateral)
    {
        abort_if(Gate::denies('collateral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'customer'        => Customer::get(['id', 'given_name_en']),
                'collateral_type' => Option::get(['id', 'label']),
                'currency'        => Currency::get(['id', 'description']),
                'province'        => Province::get(['id', 'name_en']),
                'district'        => District::get(['id', 'name_en']),
                'commune'         => Commune::get(['id', 'name_en']),
                'village'         => Village::get(['id', 'name_en']),
            ],
        ]);
    }

    public function show(Collateral $collateral)
    {
        abort_if(Gate::denies('collateral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollateralResource($collateral->load(['customer', 'collateralType', 'currency', 'province', 'district', 'commune', 'village']));
    }

    public function update(UpdateCollateralRequest $request, Collateral $collateral)
    {
        $collateral->update($request->validated());

        return (new CollateralResource($collateral))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Collateral $collateral)
    {
        abort_if(Gate::denies('collateral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CollateralResource($collateral->load(['customer', 'collateralType', 'currency', 'province', 'district', 'commune', 'village'])),
            'meta' => [
                'customer'        => Customer::get(['id', 'given_name_en']),
                'collateral_type' => Option::get(['id', 'label']),
                'currency'        => Currency::get(['id', 'description']),
                'province'        => Province::get(['id', 'name_en']),
                'district'        => District::get(['id', 'name_en']),
                'commune'         => Commune::get(['id', 'name_en']),
                'village'         => Village::get(['id', 'name_en']),
            ],
        ]);
    }

    public function destroy(Collateral $collateral)
    {
        abort_if(Gate::denies('collateral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collateral->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
