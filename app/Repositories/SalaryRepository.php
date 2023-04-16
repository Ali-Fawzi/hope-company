<?php
namespace App\Repositories;

use App\Models\Salary;
use App\Models\User;
use App\Repositories\Interfaces\ISalaryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SalaryRepository implements ISalaryRepository
{

    public function index(): Collection
    {
        return Salary::select('salaries.id', 'base_salary', 'salaries.user_id', DB::raw('IFNULL(tasks.commission_rates, 0) as commission_rates')) ->join('users', 'users.id', '=', 'salaries.user_id') ->leftJoin('tasks', 'tasks.user_id', '=', 'salaries.user_id') ->orderBy('users.user_type') ->get();
    }

    public function update(Request $request): JsonResponse
    {
        $salary = Salary::find($request->input('pk'));
        $salary->base_salary = $request->input('value');
        $salary->save();
        return response()->json(['success' => true]);
    }

    public function getUsersWithoutSalary(Request $request)
    {
        $user_type = $request->input('user_type');

        $query =  User::doesntHave('salary');

        if (!empty($user_type)) {
            $query->where('users.user_type', $user_type);
        }
        return $query->get();
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['integer','min:0']);
        Salary::create(['base_salary'=>$request->input('salary'), 'user_id'=>$request->input('userId')]);
        return Redirect::route('manager.salaries.index')->with('status', 'salary-added');

    }
}
