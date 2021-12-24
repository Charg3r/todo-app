<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display all tasks ordered by descending date of creation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a new task
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTask = new Task;
        $newTask->name = $request->task['name'];
        $newTask->description = $request->task['description'];
        $newTask->tag = $request->task['tag'];
        $newTask->due_date = $request->task['due_date'];
        $newTask->user_id = $request->task['user_id'];
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the task for a given id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return $task;
    }

    /**
     * Update a task with a given id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if ($task) { // Check if task exists
            $task->name = $request->task['name'];
            $task->description = $request->task['description'];
            $task->tag = $request->task['tag'];
            $task->due_date = $request->task['due_date'];
            $task->user_id = $request->task['user_id'];
            $task->save();
        } else {
            return "Task does not exist";
        }
        return $task;
    }

    /**
     * Update a task's completion status with a given id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function toggleComplete($id) 
    {
        $task = Task::find($id);
        
        if ($task) // Check if task exists
            $task->completed ? $task->completed = false : $task->completed = true;
        else
            return "Task does not exist";
        $task->save();
        
        return $task;
    }

    /**
     * Remove a task with a gicen id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if ($task) {
            $task->delete();
            return "Task with id '".$id."' succesfully deleted";
        } else {
            return "Task not found or already deleted";
        }
    }
}
