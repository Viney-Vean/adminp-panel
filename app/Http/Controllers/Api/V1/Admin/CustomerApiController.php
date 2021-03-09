<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\Admin\CustomerResource;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\District;
use App\Models\Option;
use App\Models\Province;
use App\Models\Village;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource(Customer::with(['branch', 'customerType', 'gender', 'countryOfBirth', 'provinceOfBirth', 'districtOfBirth', 'communeOfBirth', 'villageOfBirth', 'residentStatus', 'educationLevel', 'officer', 'province', 'district', 'commune', 'village', 'familyIdType', 'companyCountry', 'companyProvince', 'companyDistrict', 'companyCommune', 'companyVillage', 'companyCurrency'])->advancedFilter());
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
                'branch'            => Branch::get(['id', 'name_en']),
                'customer_type'     => Option::get(['id', 'label']),
                'gender'            => Option::get(['id', 'label']),
                'country_of_birth'  => Country::get(['id', 'name_en']),
                'province_of_birth' => Province::get(['id', 'name_en']),
                'district_of_birth' => District::get(['id', 'name_en']),
                'commune_of_birth'  => Commune::get(['id', 'name_en']),
                'village_of_birth'  => Village::get(['id', 'name_en']),
                'resident_status'   => Option::get(['id', 'label']),
                'education_level'   => Option::get(['id', 'label']),
                'officer'           => Option::get(['id', 'label']),
                'province'          => Province::get(['id', 'name_en']),
                'district'          => District::get(['id', 'name_en']),
                'commune'           => Commune::get(['id', 'name_en']),
                'village'           => Village::get(['id', 'name_en']),
                'family_id_type'    => Option::get(['id', 'label']),
                'company_country'   => Country::get(['id', 'name_en']),
                'company_province'  => Province::get(['id', 'name_en']),
                'company_district'  => District::get(['id', 'name_en']),
                'company_commune'   => Commune::get(['id', 'name_en']),
                'company_village'   => Village::get(['id', 'name_en']),
                'company_currency'  => Currency::get(['id', 'description']),
                'title'             => Customer::TITLE_SELECT,
                'block'             => Customer::BLOCK_SELECT,
            ],
        ]);
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource($customer->load(['branch', 'customerType', 'gender', 'countryOfBirth', 'provinceOfBirth', 'districtOfBirth', 'communeOfBirth', 'villageOfBirth', 'residentStatus', 'educationLevel', 'officer', 'province', 'district', 'commune', 'village', 'familyIdType', 'companyCountry', 'companyProvince', 'companyDistrict', 'companyCommune', 'companyVillage', 'companyCurrency']));
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
            'data' => new CustomerResource($customer->load(['branch', 'customerType', 'gender', 'countryOfBirth', 'provinceOfBirth', 'districtOfBirth', 'communeOfBirth', 'villageOfBirth', 'residentStatus', 'educationLevel', 'officer', 'province', 'district', 'commune', 'village', 'familyIdType', 'companyCountry', 'companyProvince', 'companyDistrict', 'companyCommune', 'companyVillage', 'companyCurrency'])),
            'meta' => [
                'branch'            => Branch::get(['id', 'name_en']),
                'customer_type'     => Option::get(['id', 'label']),
                'gender'            => Option::get(['id', 'label']),
                'country_of_birth'  => Country::get(['id', 'name_en']),
                'province_of_birth' => Province::get(['id', 'name_en']),
                'district_of_birth' => District::get(['id', 'name_en']),
                'commune_of_birth'  => Commune::get(['id', 'name_en']),
                'village_of_birth'  => Village::get(['id', 'name_en']),
                'resident_status'   => Option::get(['id', 'label']),
                'education_level'   => Option::get(['id', 'label']),
                'officer'           => Option::get(['id', 'label']),
                'province'          => Province::get(['id', 'name_en']),
                'district'          => District::get(['id', 'name_en']),
                'commune'           => Commune::get(['id', 'name_en']),
                'village'           => Village::get(['id', 'name_en']),
                'family_id_type'    => Option::get(['id', 'label']),
                'company_country'   => Country::get(['id', 'name_en']),
                'company_province'  => Province::get(['id', 'name_en']),
                'company_district'  => District::get(['id', 'name_en']),
                'company_commune'   => Commune::get(['id', 'name_en']),
                'company_village'   => Village::get(['id', 'name_en']),
                'company_currency'  => Currency::get(['id', 'description']),
                'title'             => Customer::TITLE_SELECT,
                'block'             => Customer::BLOCK_SELECT,
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
