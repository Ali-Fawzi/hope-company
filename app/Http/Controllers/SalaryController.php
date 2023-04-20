<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ISalaryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryController extends Controller
{
    private ISalaryRepository $salary;

    public function __construct(ISalaryRepository $salary)
    {
        $this->salary = $salary;
    }
    public function index():View
    {
        return view('pages.manager.salaries.salaries',['salaries'=>$this->salary->index()]);
    }
    public function update(Request $request):JsonResponse
    {
        return $this->salary->update($request);
    }
    public function create(Request $request):View
    {
        return view('pages.manager.salaries.addSalary',['users'=>$this->salary->getUsersWithoutSalary($request)]);
    }
    public function store(Request $request)
    {
        return $this->salary->store($request);
    }
}
