<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountProductRequest;
use App\Http\Requests\UpdateAccountProductRequest;
use App\Http\Resources\Admin\AccountProductResource;
use App\Models\AccountProduct;
use App\Models\AccountProductType;
use App\Models\AccountType;
use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountProductApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountProductResource(AccountProduct::with(['chartOfAccount', 'accountProductType', 'accountType'])->advancedFilter());
    }

    public function store(StoreAccountProductRequest $request)
    {
        $accountProduct = AccountProduct::create($request->validated());

        return (new AccountProductResource($accountProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(AccountProduct $accountProduct)
    {
        abort_if(Gate::denies('account_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'chart_of_account'     => ChartOfAccount::get(['id', 'account_title']),
                'account_product_type' => AccountProductType::get(['id', 'description']),
                'account_type'         => AccountType::get(['id', 'description']),
            ],
        ]);
    }

    public function show(AccountProduct $accountProduct)
    {
        abort_if(Gate::denies('account_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountProductResource($accountProduct->load(['chartOfAccount', 'accountProductType', 'accountType']));
    }

    public function update(UpdateAccountProductRequest $request, AccountProduct $accountProduct)
    {
        $accountProduct->update($request->validated());

        return (new AccountProductResource($accountProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(AccountProduct $accountProduct)
    {
        abort_if(Gate::denies('account_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AccountProductResource($accountProduct->load(['chartOfAccount', 'accountProductType', 'accountType'])),
            'meta' => [
                'chart_of_account'     => ChartOfAccount::get(['id', 'account_title']),
                'account_product_type' => AccountProductType::get(['id', 'description']),
                'account_type'         => AccountType::get(['id', 'description']),
            ],
        ]);
    }

    public function destroy(AccountProduct $accountProduct)
    {
        abort_if(Gate::denies('account_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
