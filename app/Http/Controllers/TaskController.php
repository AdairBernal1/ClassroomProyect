<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén las clases del usuario actual
        $clases = Auth::user()->clases;

        // Obtén las tareas que pertenecen a cualquiera de las clases del usuario
        $tareas = Task::whereHas('clases', function ($query) use ($clases) {
            $query->whereIn('clases.id', $clases->pluck('id')->toArray());
        })->get();

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
            $file_extension = $file->getClientOriginalExtension();
            $original_name = basename($filename, '.'.$file_extension);
            $counter = 1;
            $file_path = public_path('public/src/images/' . $filename);
    
            while(file_exists($file_path)) {
                $filename = $original_name . '_' . $counter . '.' . $file_extension;
                $file_path = public_path('public/src/images/' . $filename);
                $counter++;
            }
    
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        $task = Task::create($incomingField);

        // Attach the selected clases to the task
        if ($request->has('clases')) {
            $task->clases()->sync($request->clases);
        }
    
        return redirect('/tareas');
    }

    public function deleteTask(Request $request, $id){
        $task = Task::find($id);
        $oldImagePath = public_path('public/src/images/' . $task->pathImg);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        Task::where('id', $id)->delete();  
        
        return redirect('/tareas');    
    }

    public function modificarTask(Request $request){
        $id = $request->input('id');
    
        $incomingField = $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "autism_lvl" => ["required"]
        ]);
    
        $task = Task::find($id);
        $task->update($incomingField);

        if ($file = $request->file('pathImg')) {
            $oldImagePath = public_path('public/src/images/' . $task->pathImg);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $filename = $file->getClientOriginalName();
            $file_path = public_path('public/src/images/' . $filename);
    
            $file_extension = $file->getClientOriginalExtension();
            $original_name = basename($filename, '.'.$file_extension);
            $counter = 1;
    
            while(file_exists($file_path)) {
                $filename = $original_name . '_' . $counter . '.' . $file_extension;
                $file_path = public_path('public/src/images/' . $filename);
                $counter++;
            }
    
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        $task->update($incomingField);

        // Attach the selected clases to the task
        if ($request->has('clases')) {
            $task->clases()->sync($request->clases);
        }
    
        return redirect('/tareas');
    }
}
