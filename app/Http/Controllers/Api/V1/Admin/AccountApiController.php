<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\Admin\AccountResource;
use App\Models\Account;
use App\Models\AccountProduct;
use App\Models\Branch;
use App\Models\ChartOfAccount;
use App\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource(Account::with(['branch', 'chartOfAccount', 'currency', 'accountProduct'])->advancedFilter());
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->validated());

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Account $account)
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'           => Branch::get(['id', 'branch']),
                'chart_of_account' => ChartOfAccount::get(['id', 'account_title']),
                'currency'         => Currency::get(['id', 'description']),
                'account_product'  => AccountProduct::get(['id', 'account_product_title']),
                'balance_side'     => Account::BALANCE_SIDE_SELECT,
            ],
        ]);
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource($account->load(['branch', 'chartOfAccount', 'currency', 'accountProduct']));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->validated());

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AccountResource($account->load(['branch', 'chartOfAccount', 'currency', 'accountProduct'])),
            'meta' => [
                'branch'           => Branch::get(['id', 'branch']),
                'chart_of_account' => ChartOfAccount::get(['id', 'account_title']),
                'currency'         => Currency::get(['id', 'description']),
                'account_product'  => AccountProduct::get(['id', 'account_product_title']),
                'balance_side'     => Account::BALANCE_SIDE_SELECT,
            ],
        ]);
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
