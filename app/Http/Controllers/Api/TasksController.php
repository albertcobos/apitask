<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $task = new Task();
       $task->title = $request->title;
       $task->content = $request->content;
       $task->date = $request->date;
       $task->state = $request->state;

       $task->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $task = Task::find($id);
       return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Task::findOrFail($request->id);
        $task->title = $request->title;
        $task->content = $request->content;
        $task->date = $request->date;
        $task->state = $request->state;

        $task->save();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::destroy($id);
        return $product;
    }
}
