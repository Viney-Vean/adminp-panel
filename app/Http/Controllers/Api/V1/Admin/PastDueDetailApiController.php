<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePastDueDetailRequest;
use App\Http\Requests\UpdatePastDueDetailRequest;
use App\Http\Resources\Admin\PastDueDetailResource;
use App\Models\Contract;
use App\Models\PastDueDetail;
use App\Models\Schedule;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PastDueDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('past_due_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PastDueDetailResource(PastDueDetail::with(['schedule', 'contract'])->advancedFilter());
    }

    public function store(StorePastDueDetailRequest $request)
    {
        $pastDueDetail = PastDueDetail::create($request->validated());

        return (new PastDueDetailResource($pastDueDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(PastDueDetail $pastDueDetail)
    {
        abort_if(Gate::denies('past_due_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'schedule' => Schedule::get(['id', 'no']),
                'contract' => Contract::get(['id', 'code']),
            ],
        ]);
    }

    public function show(PastDueDetail $pastDueDetail)
    {
        abort_if(Gate::denies('past_due_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PastDueDetailResource($pastDueDetail->load(['schedule', 'contract']));
    }

    public function update(UpdatePastDueDetailRequest $request, PastDueDetail $pastDueDetail)
    {
        $pastDueDetail->update($request->validated());

        return (new PastDueDetailResource($pastDueDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(PastDueDetail $pastDueDetail)
    {
        abort_if(Gate::denies('past_due_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PastDueDetailResource($pastDueDetail->load(['schedule', 'contract'])),
            'meta' => [
                'schedule' => Schedule::get(['id', 'no']),
                'contract' => Contract::get(['id', 'code']),
            ],
        ]);
    }

    public function destroy(PastDueDetail $pastDueDetail)
    {
        abort_if(Gate::denies('past_due_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pastDueDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
