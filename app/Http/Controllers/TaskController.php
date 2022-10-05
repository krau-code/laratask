<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show All Task
    public function index() {
        return view('tasks.index', [
            'tasks' => auth()->user()->tasks()->filter(request(['search']))->paginate(10),
            'search' => request(['search'])
        ]);
    }

    // Show Single Task
    public function show(Task $task) {
        if ($task->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    // Show Add Task Form
    public function create() {
        return view('tasks.create');
    }

    // Store Task Data
    public function store(Request $request) {
        // Validation
        $formFields = $request->validate([
            'title' => 'required'
        ]);

        $formFields['description'] = $request->description;
        $formFields['date_time'] = $request->date_time;

        // Getting id of the user
        $formFields['user_id'] = auth()->id();

        Task::create($formFields);

        return redirect('/tasks')->with('message', 'Task added successfully');
    }

    // Show Edit Task Form
    public function edit(Task $task) {
        if ($task->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    // Update Listing Data
    public function update(Request $request, Task $task) {
        if ($task->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Validation
        $formFields = $request->validate([
            'title' => 'required'
        ]);

        $formFields['description'] = $request->description;
        $formFields['date_time'] = $request->date_time;

        $task->update($formFields);

        return redirect('/tasks/' . $task->id)->with('message', 'Task updated successfully');
    }

    // Delete Listing Data
    public function destroy(Task $task) {
        if ($task->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $task->delete();

        return redirect('/tasks')->with('message', 'Task deleted succesfully');
    }
}
