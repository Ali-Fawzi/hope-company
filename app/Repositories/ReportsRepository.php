<?php

namespace App\Repositories;

use App\Models\Reports;
use App\Repositories\Interfaces\IReportsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReportsRepository implements IReportsRepository
{

    public function index()
    {
        return Reports::join('users', 'reports.user_id', '=', 'users.id')
            ->get(['reports.id', 'reports.content', 'reports.date', 'reports.report_type', 'users.name', 'users.user_type']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $report = Reports::findOrFail($request->input('reportId'));

        // Perform any additional authorization checks here

        $report->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.reports')->with('status', 'report-deleted');
    }
}
