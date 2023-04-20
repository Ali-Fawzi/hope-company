<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    private IUsersRepository $user;
    public function __construct(IUsersRepository $user)
    {
        $this->user = $user;
    }
    public function index():View
    {
        return view('pages.manager.users.users',['users'=>$this->user->index()]);
    }
    public function create(): View
    {
        return view('pages.manager.users.addUser');
    }
    public function store(AddUserRequest $request): RedirectResponse
    {
        return $this->user->store($request);
    }
    public function update(Request $request): JsonResponse
    {
        return $this->user->update($request);
    }
    public function destroy(Request $request): RedirectResponse
    {
        return $this->user->delete($request);
    }
}
