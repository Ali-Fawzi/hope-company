<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use App\Repositories\Interfaces\ITasksRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{

    private ITasksRepository $task;
    public function __construct(ITasksRepository $task)
    {
        $this->task = $task;
    }
    public function index():View
    {
        return view('pages.supervisor.tasks.tasks',['tasks'=>$this->task->index()]);
    }
    public function create():View
    {
        return view('pages.supervisor.tasks.addTask');
    }
    public function store(AddTaskRequest $request):RedirectResponse
    {
        return $this->task->store($request);
    }
    public function show($id): View
    {
        return view('pages.supervisor.tasks.showTaskDetails',['taskDetails'=>$this->task->show($id)]);
    }
    public function displayMyTask($id):View
    {
        return view('pages.salesPerson.tasks.showMyTask',['taskDetails'=> $this->task->show($id)]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        return $this->task->destroy($request);
    }
    public function getTasks():View
    {
        return view('pages.salesPerson.tasks.tasks',['tasks'=> $this->task->getTasks()]);
    }
    public function finished(Request $request):RedirectResponse
    {
        return $this->task->finished($request);
    }
}
