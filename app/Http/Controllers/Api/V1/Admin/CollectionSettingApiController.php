<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollectionSettingRequest;
use App\Http\Requests\UpdateCollectionSettingRequest;
use App\Http\Resources\Admin\CollectionSettingResource;
use App\Models\Branch;
use App\Models\CollectionSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollectionSettingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('collection_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollectionSettingResource(CollectionSetting::with(['branch'])->advancedFilter());
    }

    public function store(StoreCollectionSettingRequest $request)
    {
        $collectionSetting = CollectionSetting::create($request->validated());

        return (new CollectionSettingResource($collectionSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(CollectionSetting $collectionSetting)
    {
        abort_if(Gate::denies('collection_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function show(CollectionSetting $collectionSetting)
    {
        abort_if(Gate::denies('collection_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollectionSettingResource($collectionSetting->load(['branch']));
    }

    public function update(UpdateCollectionSettingRequest $request, CollectionSetting $collectionSetting)
    {
        $collectionSetting->update($request->validated());

        return (new CollectionSettingResource($collectionSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(CollectionSetting $collectionSetting)
    {
        abort_if(Gate::denies('collection_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CollectionSettingResource($collectionSetting->load(['branch'])),
            'meta' => [
                'branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function destroy(CollectionSetting $collectionSetting)
    {
        abort_if(Gate::denies('collection_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collectionSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
