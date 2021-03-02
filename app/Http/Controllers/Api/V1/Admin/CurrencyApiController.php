<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\Admin\CurrencyResource;
use App\Models\Branch;
use App\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource(Currency::with(['branch'])->advancedFilter());
    }

    public function store(StoreCurrencyRequest $request)
    {
        $currency = Currency::create($request->validated());

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Currency $currency)
    {
        abort_if(Gate::denies('currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function show(Currency $currency)
    {
        abort_if(Gate::denies('currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrencyResource($currency->load(['branch']));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Currency $currency)
    {
        abort_if(Gate::denies('currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CurrencyResource($currency->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
