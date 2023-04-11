<?php
namespace App\Repositories\Interfaces;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
interface IUsersRepository
{
    public function index();
    public function store(AddUserRequest $request);
    public function update(Request $request);
    public function unset(Request $request);
    public function setSalesPersonToSupervisor(Request $request);
    public function getUnsupervisedSalesPersons();
    public function delete(Request $request);
    public function getGroups();
}
