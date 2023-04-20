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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersRepository implements IUsersRepository
{
    /**
     * This method returns a collection of all users ordered by their user type.
     *
     * @return Collection The collection of users with their name, email, user type, and password
     */
    public function index(): Collection
    {
        return User::orderBy('user_type')->get();
    }

    /**
     * This method creates and stores a new user using a validated request.
     *
     * @param AddUserRequest $request The request object containing the user name, email, user type, and password
     * @return RedirectResponse A redirect response to the users page with a status message
     */
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
            'email_verified_at' =>now(),
        ]);

        // Redirect to the user's profile page...
        return Redirect::route('manager.users.index')->with('status', 'user-added');
    }

    /**
     * This method deletes a user by their ID.
     *
     * @param Request $request The request object containing the user ID
     * @return RedirectResponse A redirect response to the users page with a status message
     * @throws ModelNotFoundException If the user ID is not found in the database
     */
    public function delete(Request $request): RedirectResponse
    {
        $userId = $request->input('userId');
        $user = User::findOrFail($userId);

        // Perform any additional authorization checks here

        $user->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.users.index')->with('status', 'user-deleted');
    }
    /**
     * This method unsets a salesperson from their supervisor.
     *
     * @param Request $request The request object containing the salesperson ID
     * @return RedirectResponse A redirect response to the groups page with a status message
     */
    public function unset(Request $request): RedirectResponse
    {
        $salesperson_id = $request->input('userId');

        // Delete the record from the supervisor_salesperson table using the SupervisorSalesperson model
        SupervisorSalesperson::where('salesperson_id', $salesperson_id)->delete();

        // Redirect back to the previous page with a success message
        return back()->with('status', 'user-unset');
    }

    /**
     * This method updates a user by their ID with a new name, user type, or email.
     *
     * @param Request $request The request object containing the user ID and the new value
     * @return JsonResponse A JSON response indicating the success of the update
     */
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

    /**
     * This method returns a collection of supervisors and their supervised salespersons.
     *
     * @return Collection The collection of supervisors and salespersons with their name and user type
     */
    public function getGroups()
    {
        return User::where('user_type', 'supervisor')
            ->with(['supervisedSalespersons' => function ($query) {
                $query->select('id', 'name', 'user_type');
            }])
            ->get(['id', 'name', 'user_type']);
    }
    /**
     * This method returns a collection of salespersons who do not have a supervisor.
     *
     * @return Collection The collection of salespersons with their ID and name
     */
    public function getUnsupervisedSalesPersons()
    {
        return User::whereDoesntHave('supervisorSalespersons')
            ->where('user_type', 'salesPerson')
            ->select('id', 'name')
            ->get();
    }

    /**
     * This method sets a salesperson to a supervisor by their IDs.
     *
     * @param Request $request The request object containing the supervisor ID and the salesperson ID
     * @return RedirectResponse A redirect response to the groups page with a status message
     */
    public function setSalesPersonToSupervisor(Request $request): RedirectResponse
    {
        SupervisorSalesperson::create([
            'supervisor_id'=> $request->input('supervisorId'),
            'salesperson_id'=> $request->input('userId')
        ]);
        return Redirect::route('manager.users.groups')->with('status', 'salesPerson-set-correctly');
    }
    /**
     * Get the team members of the current supervisor with their user details and total sales profit.
     *
     * @return Collection|array A collection or an array of SupervisorSalesperson models with user and sales relations loaded.
     */
    public function getTeamMembers(): Collection|array
    {
        return SupervisorSalesperson::with('user')->where('supervisor_id', Auth::user()->id)->withSum('sales', 'profit')->get();
    }
}
