<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }
    public function store(Request $request)
    {
        $taskValidated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'badge_tasks_id' => 'required',
            'users_id' => 'required',
            'projects_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'point' => 'nullable|numeric',
            'working_hour' => 'nullable|numeric',
            'progress' => 'nullable',
            'type' => 'nullable',
            'list_name' => 'required',
        ]);

        try {
            Task::create($taskValidated);
            return redirect()->back()->with('successTask', 'Task successfully created!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorTask', 'Error, try again later!');
        }
    }

    public function updateTask(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $taskValidated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'badge_tasks_id' => 'required',
            'users_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'point' => 'nullable|numeric',
            'progress' => 'nullable',
            'type' => 'nullable',
        ]);

        try {
            $task->update($taskValidated);
            return redirect()->back()->with('successTask', 'Task successfully updated!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorTask', 'Error, try again later!');
        }

    }

    public function updateTaskStatus(Request $request, string $task_id)
    {
        try {
            $validated = $request->validate([
                'list_name' => 'required|in:todo,progress,done',
            ]);

            $task = Task::findOrFail($task_id);
            $task->list_name = $validated['list_name'];
            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Task status updated successfully',
                'data' => $task
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function updateWorkingHour(Request $request, string $task_id)
    {
        $validatedData = $request->validate([
            'working_hour' => 'required|string',
        ]);

        $task = Task::findOrFail($task_id);
        $task->working_hour = $validatedData['working_hour'];
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Working hour updated successfully',
            'task' => $task
        ]);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        try {
            $task->delete();
            return redirect()->back()->with('successTask', 'Task successfully deleted!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('errorTask', 'error, please tyr again later!');
        }

    }
}
