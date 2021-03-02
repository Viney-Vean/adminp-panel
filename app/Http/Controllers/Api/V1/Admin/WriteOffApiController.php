<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWriteOffRequest;
use App\Http\Requests\UpdateWriteOffRequest;
use App\Http\Resources\Admin\WriteOffResource;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\WriteOff;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WriteOffApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('write_off_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WriteOffResource(WriteOff::with(['branch', 'currency', 'ddAccount'])->advancedFilter());
    }

    public function store(StoreWriteOffRequest $request)
    {
        $writeOff = WriteOff::create($request->validated());

        return (new WriteOffResource($writeOff))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(WriteOff $writeOff)
    {
        abort_if(Gate::denies('write_off_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'     => Branch::get(['id', 'branch']),
                'currency'   => Currency::get(['id', 'description']),
                'dd_account' => Account::get(['id', 'account_name']),
            ],
        ]);
    }

    public function show(WriteOff $writeOff)
    {
        abort_if(Gate::denies('write_off_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WriteOffResource($writeOff->load(['branch', 'currency', 'ddAccount']));
    }

    public function update(UpdateWriteOffRequest $request, WriteOff $writeOff)
    {
        $writeOff->update($request->validated());

        return (new WriteOffResource($writeOff))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(WriteOff $writeOff)
    {
        abort_if(Gate::denies('write_off_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new WriteOffResource($writeOff->load(['branch', 'currency', 'ddAccount'])),
            'meta' => [
                'branch'     => Branch::get(['id', 'branch']),
                'currency'   => Currency::get(['id', 'description']),
                'dd_account' => Account::get(['id', 'account_name']),
            ],
        ]);
    }

    public function destroy(WriteOff $writeOff)
    {
        abort_if(Gate::denies('write_off_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writeOff->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
