<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
            if ($task->user_id) $task->user_id = $request->task['user_id'];
            $task->save();
        } else {
            return "Task does not exist";
        }
        return $task;
    }

    public function toggleComplete($id) 
    {
        $task = Task::find($id);
        
        if ($task) // Check if task exists
            $task->completed ? $task->completed = false : $task->completed = true;
        else
            return "Task does not exist";
        $task->save();
        
        return $task->completed;
    }

    /**
     * Remove the specified resource from storage.
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
