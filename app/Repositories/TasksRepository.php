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

    /**
     * Retrieve all salespersons with their user name and task title for the authenticated supervisor.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function index()
    {
        return SupervisorSalesperson::where('supervisor_id',Auth::user()->id)
            ->with(['user' => function($query) {
                $query->select('id', 'name');
            }, 'task' => function($query) {
                $query->select('id', 'user_id', 'title')->where('finished',null);
            }])->get();
    }

    /**
     * Validate and store a new task in the database.
     *
     * @param  \App\Http\Requests\AddTaskRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddTaskRequest $request): RedirectResponse
    {
        // Get the validated data from the request
        $validated = $request->validated();
        // Create a new task record
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
        // Redirect back with a success message
        return Redirect::route('supervisor.tasks.index')->with('status', 'task-set-correctly');
    }

    /**
     * Retrieve a task with its storage item name by its id.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function show($id): Collection|array
    {
        return Task::with('storage')->where('id',$id)->get();
    }

    /**
     * Delete a task from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Find the task by its id
        $task = Task::findOrFail($request->input('taskID'));

        // Perform any additional authorization checks here

        // Delete the task record
        $task->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('supervisor.tasks.index')->with('status', 'task-deleted');
    }

    /**
     * Retrieve all tasks with ends_at, title, and location for the authenticated user.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getTasks(): Collection|array
    {
        return Task::where('user_id',Auth::user()->id)->where('finished',null)->get(['id','ends_at','title','location']);
    }

    /**
     * Mark a task as finished and update the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finished(Request $request): RedirectResponse
    {
        // Find the task by its id
        $task = Task::findOrFail($request->input('taskID'));
        // Update the finished column to 1
        $task->update(['finished' => 1]);
        // Redirect back with a success message
        return Redirect::route('salesPerson.tasks')->with('status','task-finished');
    }
}
