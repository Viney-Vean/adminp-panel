<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Http\Resources\Admin\ContractResource;
use App\Models\Account;
use App\Models\Application;
use App\Models\Branch;
use App\Models\Contract;
use App\Models\Currency;
use App\Models\LoanProduct;
use App\Models\Officer;
use App\Models\Provision;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContractApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContractResource(Contract::with(['branch', 'application', 'ddAccount', 'currency', 'loanProduct', 'provisionClass', 'officer'])->advancedFilter());
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->validated());

        return (new ContractResource($contract))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Contract $contract)
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'              => Branch::get(['id', 'name_en']),
                'application'         => Application::get(['id', 'application_date']),
                'dd_account'          => Account::get(['id', 'account_name']),
                'currency'            => Currency::get(['id', 'description']),
                'loan_product'        => LoanProduct::get(['id', 'description']),
                'provision_class'     => Provision::get(['id', 'class']),
                'officer'             => Officer::get(['id', 'given_name_en']),
                'repayment_method'    => Contract::REPAYMENT_METHOD_SELECT,
                'repayment_frequency' => Contract::REPAYMENT_FREQUENCY_SELECT,
                'contract_type'       => Contract::CONTRACT_TYPE_SELECT,
                'more_than_one_year'  => Contract::MORE_THAN_ONE_YEAR_SELECT,
            ],
        ]);
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContractResource($contract->load(['branch', 'application', 'ddAccount', 'currency', 'loanProduct', 'provisionClass', 'officer']));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());

        return (new ContractResource($contract))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ContractResource($contract->load(['branch', 'application', 'ddAccount', 'currency', 'loanProduct', 'provisionClass', 'officer'])),
            'meta' => [
                'branch'              => Branch::get(['id', 'name_en']),
                'application'         => Application::get(['id', 'application_date']),
                'dd_account'          => Account::get(['id', 'account_name']),
                'currency'            => Currency::get(['id', 'description']),
                'loan_product'        => LoanProduct::get(['id', 'description']),
                'provision_class'     => Provision::get(['id', 'class']),
                'officer'             => Officer::get(['id', 'given_name_en']),
                'repayment_method'    => Contract::REPAYMENT_METHOD_SELECT,
                'repayment_frequency' => Contract::REPAYMENT_FREQUENCY_SELECT,
                'contract_type'       => Contract::CONTRACT_TYPE_SELECT,
                'more_than_one_year'  => Contract::MORE_THAN_ONE_YEAR_SELECT,
            ],
        ]);
    }

    public function destroy(Contract $contract)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
