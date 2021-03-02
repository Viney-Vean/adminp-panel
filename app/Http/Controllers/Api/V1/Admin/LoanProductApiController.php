<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanProductRequest;
use App\Http\Requests\UpdateLoanProductRequest;
use App\Http\Resources\Admin\LoanProductResource;
use App\Models\Branch;
use App\Models\ChartOfAccount;
use App\Models\Currency;
use App\Models\LoanProduct;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoanProductApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanProductResource(LoanProduct::with(['branch', 'currency', 'feeEarnCoa', 'feeUnearnCoa'])->advancedFilter());
    }

    public function store(StoreLoanProductRequest $request)
    {
        $loanProduct = LoanProduct::create($request->validated());

        return (new LoanProductResource($loanProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(LoanProduct $loanProduct)
    {
        abort_if(Gate::denies('loan_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'                    => Branch::get(['id', 'branch']),
                'currency'                  => Currency::get(['id', 'description']),
                'fee_earn_coa'              => ChartOfAccount::get(['id', 'account_title']),
                'fee_unearn_coa'            => ChartOfAccount::get(['id', 'account_title']),
                'reduce_base_on'            => LoanProduct::REDUCE_BASE_ON_SELECT,
                'penalty_reduction_base_on' => LoanProduct::PENALTY_REDUCTION_BASE_ON_SELECT,
                'admin_fee_base_on'         => LoanProduct::ADMIN_FEE_BASE_ON_SELECT,
                'admin_fee_accrual'         => LoanProduct::ADMIN_FEE_ACCRUAL_SELECT,
                'regular_fee_base_on'       => LoanProduct::REGULAR_FEE_BASE_ON_SELECT,
                'regular_fee_accual'        => LoanProduct::REGULAR_FEE_ACCUAL_SELECT,
            ],
        ]);
    }

    public function show(LoanProduct $loanProduct)
    {
        abort_if(Gate::denies('loan_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanProductResource($loanProduct->load(['branch', 'currency', 'feeEarnCoa', 'feeUnearnCoa']));
    }

    public function update(UpdateLoanProductRequest $request, LoanProduct $loanProduct)
    {
        $loanProduct->update($request->validated());

        return (new LoanProductResource($loanProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(LoanProduct $loanProduct)
    {
        abort_if(Gate::denies('loan_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new LoanProductResource($loanProduct->load(['branch', 'currency', 'feeEarnCoa', 'feeUnearnCoa'])),
            'meta' => [
                'branch'                    => Branch::get(['id', 'branch']),
                'currency'                  => Currency::get(['id', 'description']),
                'fee_earn_coa'              => ChartOfAccount::get(['id', 'account_title']),
                'fee_unearn_coa'            => ChartOfAccount::get(['id', 'account_title']),
                'reduce_base_on'            => LoanProduct::REDUCE_BASE_ON_SELECT,
                'penalty_reduction_base_on' => LoanProduct::PENALTY_REDUCTION_BASE_ON_SELECT,
                'admin_fee_base_on'         => LoanProduct::ADMIN_FEE_BASE_ON_SELECT,
                'admin_fee_accrual'         => LoanProduct::ADMIN_FEE_ACCRUAL_SELECT,
                'regular_fee_base_on'       => LoanProduct::REGULAR_FEE_BASE_ON_SELECT,
                'regular_fee_accual'        => LoanProduct::REGULAR_FEE_ACCUAL_SELECT,
            ],
        ]);
    }

    public function destroy(LoanProduct $loanProduct)
    {
        abort_if(Gate::denies('loan_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
