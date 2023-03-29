<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);

        Task::create(['title' => $request->title]);

        return redirect('/');
    }

    public function update(Request $request, Task $task)
{
    $task->update(['completed' => $request->has('completed')]);
    return redirect('/');
}


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
