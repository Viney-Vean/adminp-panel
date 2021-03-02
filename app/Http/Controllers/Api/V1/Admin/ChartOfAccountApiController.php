<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;
use App\Http\Resources\Admin\ChartOfAccountResource;
use App\Models\AccountType;
use App\Models\Branch;
use App\Models\ChartOfAccount;
use App\Models\Currency;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChartOfAccountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chart_of_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChartOfAccountResource(ChartOfAccount::with(['branch', 'accountType', 'mainAccount', 'currency'])->advancedFilter());
    }

    public function store(StoreChartOfAccountRequest $request)
    {
        $chartOfAccount = ChartOfAccount::create($request->validated());

        return (new ChartOfAccountResource($chartOfAccount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'               => Branch::get(['id', 'branch']),
                'account_type'         => AccountType::get(['id', 'description']),
                'main_account'         => ChartOfAccount::get(['id', 'account_title']),
                'currency'             => Currency::get(['id', 'description']),
                'classification'       => ChartOfAccount::CLASSIFICATION_SELECT,
                'posting_side'         => ChartOfAccount::POSTING_SIDE_SELECT,
                'balance_side'         => ChartOfAccount::BALANCE_SIDE_SELECT,
                'allow_posting'        => ChartOfAccount::ALLOW_POSTING_SELECT,
                'allow_direct_posting' => ChartOfAccount::ALLOW_DIRECT_POSTING_SELECT,
                'active'               => ChartOfAccount::ACTIVE_SELECT,
            ],
        ]);
    }

    public function show(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChartOfAccountResource($chartOfAccount->load(['branch', 'accountType', 'mainAccount', 'currency']));
    }

    public function update(UpdateChartOfAccountRequest $request, ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->update($request->validated());

        return (new ChartOfAccountResource($chartOfAccount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ChartOfAccountResource($chartOfAccount->load(['branch', 'accountType', 'mainAccount', 'currency'])),
            'meta' => [
                'branch'               => Branch::get(['id', 'branch']),
                'account_type'         => AccountType::get(['id', 'description']),
                'main_account'         => ChartOfAccount::get(['id', 'account_title']),
                'currency'             => Currency::get(['id', 'description']),
                'classification'       => ChartOfAccount::CLASSIFICATION_SELECT,
                'posting_side'         => ChartOfAccount::POSTING_SIDE_SELECT,
                'balance_side'         => ChartOfAccount::BALANCE_SIDE_SELECT,
                'allow_posting'        => ChartOfAccount::ALLOW_POSTING_SELECT,
                'allow_direct_posting' => ChartOfAccount::ALLOW_DIRECT_POSTING_SELECT,
                'active'               => ChartOfAccount::ACTIVE_SELECT,
            ],
        ]);
    }
}
