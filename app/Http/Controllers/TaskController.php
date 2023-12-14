<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function createTask(Request $request)
    {
        $incomingField = $request ->validate([
            "title"=> ["required","string"],
            "description" => ["required","string"],
            "autism_lvl"=> ["required",],
        ]);

        $task = Task::create($incomingField);
        return redirect("tareas");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks)
    {
        //
    }
}
