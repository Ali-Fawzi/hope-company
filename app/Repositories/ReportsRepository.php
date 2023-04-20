<?php

namespace App\Repositories;

use App\Models\Reports;
use App\Repositories\Interfaces\IReportsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReportsRepository implements IReportsRepository
{
    /**
     * This method returns a collection of reports joined with users.
     *
     * @return Illuminate\Database\Eloquent\Collection The collection of reports and users
     */
    public function index()
    {
        return Reports::join('users', 'reports.user_id', '=', 'users.id')
            ->get(['reports.id', 'reports.content', 'reports.date', 'reports.report_type', 'users.name', 'users.user_type']);
    }

    /**
     * This method deletes a report by its ID.
     *
     * @param Request $request The request object containing the report ID
     * @return RedirectResponse A redirect response to the reports page with a status message
     * @throws ModelNotFoundException If the report ID is not found in the database
     */
    public function destroy(Request $request): RedirectResponse
    {
        $report = Reports::findOrFail($request->input('reportId'));

        // Perform any additional authorization checks here

        $report->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.reports.index')->with('status', 'report-deleted');
    }
}
