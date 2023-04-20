<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupervisorController extends Controller
{
    private IUsersRepository $user;
    public function __construct(IUsersRepository $user)
    {
        $this->user = $user;
    }

    public function index():View
    {
        return view('pages.supervisor.dashboard',['teamMembers'=>$this->user->getTeamMembers()]);
    }
}
