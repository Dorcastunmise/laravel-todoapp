<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function listTasks()
    {
        $tasks = Tasks::where('user_id', auth()->user()->id)->where('status', 'pending')->paginate(5); // Fetching only pending tasks for the home view
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
        $task->user_id = auth()->user()->id; // Assuming the user is authenticated
        $task->status = 'pending'; // Default status for new tasks
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
        if(Tasks::where('user_id', auth()->user()->id)
                ->where('id', $id)->update(['status' => 'completed'])
            ){
            return redirect()->route('home')
                    ->with('success', 'Task status updated successfully!');
        } else {
            return redirect()->route('home')
                    ->with('error', 'Failed to update task status.');
        }
    }

    function deleteTask($id)
    {
        if(Tasks::where('user_id', auth()->user()->id)
            ->where('id', $id)->delete()){
            return redirect()->route('home')
                    ->with('success', 'Task has been deleted successfully!');
        } else {
            return redirect()->route('home')
                    ->with('error', 'Failed to delete task.');
        }
    }

}
