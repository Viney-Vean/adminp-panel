<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanProductProvisionRequest;
use App\Http\Requests\UpdateLoanProductProvisionRequest;
use App\Http\Resources\Admin\LoanProductProvisionResource;
use App\Models\Branch;
use App\Models\ChartOfAccount;
use App\Models\LoanProduct;
use App\Models\LoanProductProvision;
use App\Models\Provision;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoanProductProvisionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_product_provision_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanProductProvisionResource(LoanProductProvision::with(['branch', 'product', 'class', 'outstandingCoa', 'airCoa', 'interestIncomeCoa', 'interestInSuspendCoa', 'provisionExpenseCoa', 'provisionReserveCoa', 'penaltyCoa', 'chargeIncomeCoa', 'chargeInSuspendCoa', 'chargeReceivableCoa'])->advancedFilter());
    }

    public function store(StoreLoanProductProvisionRequest $request)
    {
        $loanProductProvision = LoanProductProvision::create($request->validated());

        return (new LoanProductProvisionResource($loanProductProvision))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(LoanProductProvision $loanProductProvision)
    {
        abort_if(Gate::denies('loan_product_provision_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'                  => Branch::get(['id', 'branch']),
                'product'                 => LoanProduct::get(['id', 'description']),
                'class'                   => Provision::get(['id', 'class_title']),
                'outstanding_coa'         => ChartOfAccount::get(['id', 'account_title']),
                'air_coa'                 => ChartOfAccount::get(['id', 'account_title']),
                'interest_income_coa'     => ChartOfAccount::get(['id', 'account_title']),
                'interest_in_suspend_coa' => ChartOfAccount::get(['id', 'account_title']),
                'provision_expense_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'provision_reserve_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'penalty_coa'             => ChartOfAccount::get(['id', 'account_title']),
                'charge_income_coa'       => ChartOfAccount::get(['id', 'account_title']),
                'charge_in_suspend_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'charge_receivable_coa'   => ChartOfAccount::get(['id', 'account_title']),
            ],
        ]);
    }

    public function show(LoanProductProvision $loanProductProvision)
    {
        abort_if(Gate::denies('loan_product_provision_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanProductProvisionResource($loanProductProvision->load(['branch', 'product', 'class', 'outstandingCoa', 'airCoa', 'interestIncomeCoa', 'interestInSuspendCoa', 'provisionExpenseCoa', 'provisionReserveCoa', 'penaltyCoa', 'chargeIncomeCoa', 'chargeInSuspendCoa', 'chargeReceivableCoa']));
    }

    public function update(UpdateLoanProductProvisionRequest $request, LoanProductProvision $loanProductProvision)
    {
        $loanProductProvision->update($request->validated());

        return (new LoanProductProvisionResource($loanProductProvision))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(LoanProductProvision $loanProductProvision)
    {
        abort_if(Gate::denies('loan_product_provision_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new LoanProductProvisionResource($loanProductProvision->load(['branch', 'product', 'class', 'outstandingCoa', 'airCoa', 'interestIncomeCoa', 'interestInSuspendCoa', 'provisionExpenseCoa', 'provisionReserveCoa', 'penaltyCoa', 'chargeIncomeCoa', 'chargeInSuspendCoa', 'chargeReceivableCoa'])),
            'meta' => [
                'branch'                  => Branch::get(['id', 'branch']),
                'product'                 => LoanProduct::get(['id', 'description']),
                'class'                   => Provision::get(['id', 'class_title']),
                'outstanding_coa'         => ChartOfAccount::get(['id', 'account_title']),
                'air_coa'                 => ChartOfAccount::get(['id', 'account_title']),
                'interest_income_coa'     => ChartOfAccount::get(['id', 'account_title']),
                'interest_in_suspend_coa' => ChartOfAccount::get(['id', 'account_title']),
                'provision_expense_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'provision_reserve_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'penalty_coa'             => ChartOfAccount::get(['id', 'account_title']),
                'charge_income_coa'       => ChartOfAccount::get(['id', 'account_title']),
                'charge_in_suspend_coa'   => ChartOfAccount::get(['id', 'account_title']),
                'charge_receivable_coa'   => ChartOfAccount::get(['id', 'account_title']),
            ],
        ]);
    }

    public function destroy(LoanProductProvision $loanProductProvision)
    {
        abort_if(Gate::denies('loan_product_provision_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanProductProvision->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
