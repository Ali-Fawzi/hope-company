<?php

namespace App\Repositories;

use App\Http\Requests\AddUserRequest;
use App\Models\SupervisorSalesperson;
use App\Models\User;
use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsersRepository implements IUsersRepository
{

    public function index(): Collection
    {
        return User::all();
    }

    public function store(AddUserRequest $request): RedirectResponse
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Create and store the new user...
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_type' => $validated['user_type'],
            'password' => bcrypt($validated['password']),
        ]);

        // Redirect to the user's profile page...
        return Redirect::route('manager.users')->with('status', 'user-added');
    }

    public function delete(Request $request): RedirectResponse
    {
        $userId = $request->input('userId');
        $user = User::findOrFail($userId);

        // Perform any additional authorization checks here

        $user->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.users')->with('status', 'user-deleted');
    }
    public function unset(Request $request): RedirectResponse
    {
        $salesperson_id = $request->input('userId');
        SupervisorSalesperson::where('salesperson_id', $salesperson_id)->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.users.groups')->with('status', 'user-unset');
    }

    public function update(Request $request): JsonResponse
    {
        $user = User::find($request->input('pk'));
        switch ($request->input('name'))
        {
            case 'name':
                $user->name = $request->input('value');
            break;
            case 'user_type':
                $user->user_type = $request->input('value');
            break;
            case 'email':
                $user->email = $request->input('value');
            break;
        }
        $user->save();
        return response()->json(['success' => true]);
    }

    public function getGroups()
    {
        return User::where('user_type', 'supervisor')
            ->with(['supervisedSalespersons' => function ($query) {
                $query->select('id', 'name', 'user_type');
            }])
            ->get(['id', 'name', 'user_type']);
    }

    public function getUnsupervisedSalesPersons()
    {
        return $salespersons = User::whereDoesntHave('supervisorSalespersons')
            ->where('user_type', 'salesPerson')
            ->select('id', 'name')
            ->get();
    }

    public function setSalesPersonToSupervisor(Request $request)
    {
        SupervisorSalesperson::create([
            'supervisor_id'=> $request->input('supervisorId'),
            'salesperson_id'=> $request->input('userId')
        ]);
        return Redirect::route('manager.users.groups')->with('status', 'salesPerson-set-correctly');
    }
}
