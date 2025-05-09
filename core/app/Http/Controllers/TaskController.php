<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\progress;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $taskValidated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'badge' => 'required',
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

        try{
            Task::create($taskValidated);
            return redirect()->back()->with('successTask', 'Task successfully created!');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('errorTask', 'Error, try again later!');
        }


    }
}
