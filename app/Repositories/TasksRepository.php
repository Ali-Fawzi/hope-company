<?php

namespace App\Repositories;

use App\Http\Requests\AddTaskRequest;
use App\Models\Storage;
use App\Models\SupervisorSalesperson;
use App\Models\Task;
use App\Repositories\Interfaces\ITasksRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TasksRepository implements ITasksRepository
{

    public function index()
    {
        return SupervisorSalesperson::where('supervisor_id',Auth::user()->id)
            ->with(['user' => function($query) {
                $query->select('id', 'name');
            }, 'task' => function($query) {
                $query->select('id', 'user_id', 'title');
            }])->get();
    }

    public function store(AddTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Task::create([
            'starting_at'=> $validated['starting_at'],
            'ends_at'=> $validated['ends_at'],
            'title'=> $validated['title'],
            'location'=> $validated['location'],
            'required_profit'=> $validated['required_profit'],
            'commission_rates'=> $validated['commission_rates'],
            'user_id'=> $validated['user_id'],
            'item_id'=> Storage::where('item_name', $validated['item_name'])->value('id'),
        ]);
        return Redirect::route('supervisor.tasks.index')->with('status', 'task-set-correctly');
    }
    public function show($id): Collection|array
    {
        return Task::with('storage')->where('id',$id)->get();
    }

    public function destroy(Request $request)
    {
        $task = Task::findOrFail($request->input('taskID'));

        // Perform any additional authorization checks here

        $task->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('supervisor.tasks.index')->with('status', 'task-deleted');
    }

    public function getTasks()
    {
        return Task::where('user_id',Auth::user()->id)->where('finished',null)->get(['id','ends_at','title','location']);
    }
}
