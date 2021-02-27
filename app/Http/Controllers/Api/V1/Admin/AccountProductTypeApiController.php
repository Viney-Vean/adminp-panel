<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountProductTypeRequest;
use App\Http\Requests\UpdateAccountProductTypeRequest;
use App\Http\Resources\Admin\AccountProductTypeResource;
use App\Models\AccountProductType;
use App\Models\Branch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountProductTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_product_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountProductTypeResource(AccountProductType::with(['branch'])->advancedFilter());
    }

    public function store(StoreAccountProductTypeRequest $request)
    {
        $accountProductType = AccountProductType::create($request->validated());

        return (new AccountProductTypeResource($accountProductType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(AccountProductType $accountProductType)
    {
        abort_if(Gate::denies('account_product_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'       => Branch::get(['id', 'branch']),
                'account_type' => AccountProductType::ACCOUNT_TYPE_SELECT,
            ],
        ]);
    }

    public function show(AccountProductType $accountProductType)
    {
        abort_if(Gate::denies('account_product_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountProductTypeResource($accountProductType->load(['branch']));
    }

    public function update(UpdateAccountProductTypeRequest $request, AccountProductType $accountProductType)
    {
        $accountProductType->update($request->validated());

        return (new AccountProductTypeResource($accountProductType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(AccountProductType $accountProductType)
    {
        abort_if(Gate::denies('account_product_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AccountProductTypeResource($accountProductType->load(['branch'])),
            'meta' => [
                'branch'       => Branch::get(['id', 'branch']),
                'account_type' => AccountProductType::ACCOUNT_TYPE_SELECT,
            ],
        ]);
    }

    public function destroy(AccountProductType $accountProductType)
    {
        abort_if(Gate::denies('account_product_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountProductType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
