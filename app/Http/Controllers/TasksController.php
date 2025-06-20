<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\Auth::check()) {
        $user = \Auth::user();
        $tasks = $user->feed_tasks()->orderBy('created_at', 'desc')->paginate(10);

        return view('tasks.index', [
            'user' => $user,
            'tasks' => $tasks,
        ]);
        } else {
            return view('tasks.index');
        }
        // $tasks = Task::all();

        // return view('tasks.index', [
        //     'tasks' => $tasks,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);

        $user = \Auth::user();

        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->user_id = $user->id;
        $task->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        $user = \Auth::user();

        if ($user->id !== $task->user_id) {
            return redirect('/');
        }else{
            return view('tasks.show', [
                'task' => $task,
            ]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();


        return redirect('/');
    }
}
