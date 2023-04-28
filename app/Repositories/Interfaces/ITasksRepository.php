<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\AddTaskRequest;
use Illuminate\Http\Request;

interface ITasksRepository
{
    public function index();

    public function store(AddTaskRequest $request);
    public function show($id);

    public function destroy(Request $request);

    public function getTasks();

    public function finished(Request $request);
}
