<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\JournalResource;
use App\Models\Journal;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JournalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('journal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JournalResource(Journal::with(['branch', 'account', 'currency', 'chartOfAccount', 'class'])->advancedFilter());
    }

    public function show(Journal $journal)
    {
        abort_if(Gate::denies('journal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JournalResource($journal->load(['branch', 'account', 'currency', 'chartOfAccount', 'class']));
    }
}
