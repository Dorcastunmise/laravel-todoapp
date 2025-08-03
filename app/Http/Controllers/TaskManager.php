<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function listTasks()
    {
        $tasks = Tasks::all();
        return view('welcome', compact('tasks'));
    }
    function addTask() //request not needed as we're just returning a view
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request) //request needed to handle form submission
    {
        // Here you would typically validate the request and save the task to the database
        // For now, let's just return a success message
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required',
            'priority' => 'required|string|in:high,medium,low,none',
        ]);

        $task = new Tasks();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->priority = $request->input('priority');

        if($task->save()) {
            // Assuming task is saved successfully
            return redirect()->route('home')
                    ->with('success', 'Task added successfully!');
        } else {
            return redirect()->route('tasks.add')
                    ->with('error', 'Failed to add task.');
        }

    }

    function updateTaskStatus($id)
    {
        $task = Tasks::where('id', $id)->first(); 
    }
}
