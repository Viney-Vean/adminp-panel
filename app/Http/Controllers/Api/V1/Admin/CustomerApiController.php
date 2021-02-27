<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\Admin\CustomerResource;
use App\Models\Branch;
use App\Models\Customer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource(Customer::with(['branch'])->advancedFilter());
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        if ($media = $request->input('selfies_photo', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $customer->id]);
        }

        if ($media = $request->input('customer_profile', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $customer->id]);
        }

        if ($media = $request->input('documentations', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $customer->id]);
        }

        if ($media = $request->input('spouse_profile', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $customer->id]);
        }

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Customer $customer)
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch'                                    => Branch::get(['id', 'name_en']),
                'customer_gender'                           => Customer::CUSTOMER_GENDER_SELECT,
                'customer_identity_type'                    => Customer::CUSTOMER_IDENTITY_TYPE_SELECT,
                'yes_or_no_loan_leasing_repayment_expenses' => Customer::YES_OR_NO_LOAN_LEASING_REPAYMENT_EXPENSES_SELECT,
                'is_agree'                                  => Customer::IS_AGREE_SELECT,
            ],
        ]);
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource($customer->load(['branch']));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        $customer->updateMedia($request->input('selfies_photo', []), 'customer_selfies_photo');
        $customer->updateMedia($request->input('customer_profile', []), 'customer_customer_profile');
        $customer->updateMedia($request->input('documentations', []), 'customer_documentations');
        $customer->updateMedia($request->input('spouse_profile', []), 'customer_spouse_profile');

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Customer $customer)
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CustomerResource($customer->load(['branch'])),
            'meta' => [
                'branch'                                    => Branch::get(['id', 'name_en']),
                'customer_gender'                           => Customer::CUSTOMER_GENDER_SELECT,
                'customer_identity_type'                    => Customer::CUSTOMER_IDENTITY_TYPE_SELECT,
                'yes_or_no_loan_leasing_repayment_expenses' => Customer::YES_OR_NO_LOAN_LEASING_REPAYMENT_EXPENSES_SELECT,
                'is_agree'                                  => Customer::IS_AGREE_SELECT,
            ],
        ]);
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['customer_create', 'customer_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new Customer();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
