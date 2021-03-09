<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecoveryRequest;
use App\Http\Requests\UpdateRecoveryRequest;
use App\Http\Resources\Admin\RecoveryResource;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\Recovery;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecoveryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('recovery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RecoveryResource(Recovery::with(['branch', 'currency', 'ddAccount'])->advancedFilter());
    }

    public function store(StoreRecoveryRequest $request)
    {
        $recovery = Recovery::create($request->validated());

        return (new RecoveryResource($recovery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Recovery $recovery)
    {
        abort_if(Gate::denies('recovery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'     => Branch::get(['id', 'branch']),
                'currency'   => Currency::get(['id', 'description']),
                'dd_account' => Account::get(['id', 'account_name']),
            ],
        ]);
    }

    public function show(Recovery $recovery)
    {
        abort_if(Gate::denies('recovery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RecoveryResource($recovery->load(['branch', 'currency', 'ddAccount']));
    }

    public function update(UpdateRecoveryRequest $request, Recovery $recovery)
    {
        $recovery->update($request->validated());

        return (new RecoveryResource($recovery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Recovery $recovery)
    {
        abort_if(Gate::denies('recovery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new RecoveryResource($recovery->load(['branch', 'currency', 'ddAccount'])),
            'meta' => [
                'branch'     => Branch::get(['id', 'branch']),
                'currency'   => Currency::get(['id', 'description']),
                'dd_account' => Account::get(['id', 'account_name']),
            ],
        ]);
    }

    public function destroy(Recovery $recovery)
    {
        abort_if(Gate::denies('recovery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recovery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
