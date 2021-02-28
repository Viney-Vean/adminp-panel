<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AccountEntryResource;
use App\Models\AccountEntry;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountEntryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountEntryResource(AccountEntry::with(['account', 'currency'])->advancedFilter());
    }

    public function show(AccountEntry $accountEntry)
    {
        abort_if(Gate::denies('account_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountEntryResource($accountEntry->load(['account', 'currency']));
    }
}
