<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles', 'branch', 'accessBranch', 'defualtBranch'])->advancedFilter());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles.*.id', []));
        $user->accessBranch()->sync($request->input('access_branch.*.id', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(User $user)
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'roles'          => Role::get(['id', 'title']),
                'branch'         => Branch::get(['id', 'branch']),
                'access_branch'  => Branch::get(['id', 'branch']),
                'defualt_branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles', 'branch', 'accessBranch', 'defualtBranch']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles.*.id', []));
        $user->accessBranch()->sync($request->input('access_branch.*.id', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new UserResource($user->load(['roles', 'branch', 'accessBranch', 'defualtBranch'])),
            'meta' => [
                'roles'          => Role::get(['id', 'title']),
                'branch'         => Branch::get(['id', 'branch']),
                'access_branch'  => Branch::get(['id', 'branch']),
                'defualt_branch' => Branch::get(['id', 'branch']),
            ],
        ]);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
