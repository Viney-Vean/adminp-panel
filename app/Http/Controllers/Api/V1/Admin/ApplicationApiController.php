<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\Admin\ApplicationResource;
use App\Models\Application;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\LoanProduct;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApplicationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource(Application::with(['branch', 'customer', 'currency', 'loanProduct'])->advancedFilter());
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->validated());

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Application $application)
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'              => Branch::get(['id', 'branch']),
                'customer'            => Customer::get(['id', 'customer_name']),
                'currency'            => Currency::get(['id', 'description']),
                'loan_product'        => LoanProduct::get(['id', 'description']),
                'repayment_method'    => Application::REPAYMENT_METHOD_SELECT,
                'repayment_frequency' => Application::REPAYMENT_FREQUENCY_SELECT,
            ],
        ]);
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource($application->load(['branch', 'customer', 'currency', 'loanProduct']));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ApplicationResource($application->load(['branch', 'customer', 'currency', 'loanProduct'])),
            'meta' => [
                'branch'              => Branch::get(['id', 'branch']),
                'customer'            => Customer::get(['id', 'customer_name']),
                'currency'            => Currency::get(['id', 'description']),
                'loan_product'        => LoanProduct::get(['id', 'description']),
                'repayment_method'    => Application::REPAYMENT_METHOD_SELECT,
                'repayment_frequency' => Application::REPAYMENT_FREQUENCY_SELECT,
            ],
        ]);
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
