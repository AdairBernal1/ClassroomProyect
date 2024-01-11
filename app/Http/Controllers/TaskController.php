<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $incomingField = $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "autism_lvl" => ["required"],
            "pathImg" => ["required", "image"],
        ]);
    
        if ($file = $request->file('pathImg')) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        Task::create($incomingField);
    
        return redirect('/tareas');
    }
    public function deleteTask(Request $request, $id){
        Task::where('id', $id)->delete();  
        
        return redirect('/tareas');    
    }

    public function modificarTask(Request $request, $id){
        $incomingField = $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "autism_lvl" => ["required"],
            "pathImg" => ["required", "image"],
        ]);

        if ($file = $request->file('pathImg')) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        return redirect('/tareas');
    }
}
