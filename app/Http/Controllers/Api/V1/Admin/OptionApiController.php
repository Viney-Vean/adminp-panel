<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\Admin\OptionResource;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource(Option::with(['group'])->advancedFilter());
    }

    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->validated());

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Option $option)
    {
        abort_if(Gate::denies('option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'group' => Option::get(['id', 'label']),
            ],
        ]);
    }

    public function show(Option $option)
    {
        abort_if(Gate::denies('option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionResource($option->load(['group']));
    }

    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->validated());

        return (new OptionResource($option))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Option $option)
    {
        abort_if(Gate::denies('option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new OptionResource($option->load(['group'])),
            'meta' => [
                'group' => Option::get(['id', 'label']),
            ],
        ]);
    }

    public function destroy(Option $option)
    {
        abort_if(Gate::denies('option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
