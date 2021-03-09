<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\Admin\CountryResource;
use App\Models\Branch;
use App\Models\Country;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CountryResource(Country::with(['branch', 'countryCode'])->advancedFilter());
    }

    public function store(StoreCountryRequest $request)
    {
        $country = Country::create($request->validated());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Country $country)
    {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'       => Branch::get(['id', 'name_en']),
                'country_code' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CountryResource($country->load(['branch', 'countryCode']));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return (new CountryResource($country))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CountryResource($country->load(['branch', 'countryCode'])),
            'meta' => [
                'branch'       => Branch::get(['id', 'name_en']),
                'country_code' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function destroy(Country $country)
    {
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
