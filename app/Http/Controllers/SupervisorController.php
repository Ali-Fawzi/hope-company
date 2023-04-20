<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IReportsRepository;
use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupervisorController extends Controller
{
    private IUsersRepository $user;
    private IReportsRepository $report;
    public function __construct(IUsersRepository $user, IReportsRepository $report)
    {
        $this->user = $user;
        $this->report = $report;
    }

    public function index():View
    {
        return view('pages.supervisor.dashboard',['teamMembers'=>$this->user->getTeamMembers()]);
    }
    public function salesPersons():view
    {
        return view('pages.supervisor.salesPersons.salesPersons',['salesPersons'=>$this->user->getTeamMembers()]);
    }
    public function kick(Request $request):RedirectResponse
    {
        $request->validate([
            'content' => 'required|string',
            'userId' => 'required|exists:users,id'
        ]);
        $this->report->kickSalesPerson($request);
        return $this->user->unset($request);
    }
}
