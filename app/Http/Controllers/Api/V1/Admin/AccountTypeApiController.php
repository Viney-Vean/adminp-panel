<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountTypeRequest;
use App\Http\Requests\UpdateAccountTypeRequest;
use App\Http\Resources\Admin\AccountTypeResource;
use App\Models\AccountType;
use App\Models\Branch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountTypeResource(AccountType::with(['branch'])->advancedFilter());
    }

    public function store(StoreAccountTypeRequest $request)
    {
        $accountType = AccountType::create($request->validated());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'branch_manager_en']),
            ],
        ]);
    }

    public function show(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountTypeResource($accountType->load(['branch']));
    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType)
    {
        $accountType->update($request->validated());

        return (new AccountTypeResource($accountType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AccountTypeResource($accountType->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'branch_manager_en']),
            ],
        ]);
    }

    public function destroy(AccountType $accountType)
    {
        abort_if(Gate::denies('account_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
