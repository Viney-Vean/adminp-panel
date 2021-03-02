<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Http\Resources\Admin\BranchResource;
use App\Models\Branch;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BranchResource(Branch::advancedFilter());
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = Branch::create($request->validated());

        return (new BranchResource($branch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Branch $branch)
    {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BranchResource($branch);
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->validated());

        return (new BranchResource($branch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new BranchResource($branch),
            'meta' => [],
        ]);
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
