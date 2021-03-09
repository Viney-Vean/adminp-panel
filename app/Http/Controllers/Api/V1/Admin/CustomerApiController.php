<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\Admin\CustomerResource;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource(Customer::with(['branch', 'gender', 'customerType', 'residentStatus', 'educationLevel', 'officer'])->advancedFilter());
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Customer $customer)
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'          => Branch::get(['id', 'name_en']),
                'gender'          => Option::get(['id', 'label']),
                'customer_type'   => Option::get(['id', 'label']),
                'resident_status' => Option::get(['id', 'label']),
                'education_level' => Option::get(['id', 'label']),
                'officer'         => Option::get(['id', 'label']),
                'title'           => Customer::TITLE_SELECT,
            ],
        ]);
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource($customer->load(['branch', 'gender', 'customerType', 'residentStatus', 'educationLevel', 'officer']));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Customer $customer)
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CustomerResource($customer->load(['branch', 'gender', 'customerType', 'residentStatus', 'educationLevel', 'officer'])),
            'meta' => [
                'branch'          => Branch::get(['id', 'name_en']),
                'gender'          => Option::get(['id', 'label']),
                'customer_type'   => Option::get(['id', 'label']),
                'resident_status' => Option::get(['id', 'label']),
                'education_level' => Option::get(['id', 'label']),
                'officer'         => Option::get(['id', 'label']),
                'title'           => Customer::TITLE_SELECT,
            ],
        ]);
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
