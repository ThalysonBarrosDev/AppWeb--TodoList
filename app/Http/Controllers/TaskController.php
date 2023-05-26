<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Request $request) {
        $categories = Category::all();

        $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function create_action(Request $request) {
        $task = $request->only(['title', 'description', 'due_date', 'category_id']);

        $task['user_id'] = Auth::id();

        Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $request) {
        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }

        $categories = Category::all();

        $data['task'] = $task;
        $data['categories'] = $categories;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request) {
        $edit_task = $request->only(['title', 'description', 'due_date', 'category_id']);

        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }

        $task->update($edit_task);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $request) {
        $task = Task::find($request->id);

        if ($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }

    public function update(Request $request) {
        $task = Task::findOrFail($request->taskId);

        $task->is_done = $request->status;
        $task->save();

        return ['success' => true];
    }
}
