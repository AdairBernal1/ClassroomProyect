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
            $file_extension = $file->getClientOriginalExtension();
            $original_name = basename($filename, '.'.$file_extension);
            $counter = 1;
            $file_path = public_path('public/src/images/' . $filename);
    
            // Chequea si el archivo ya existe en la carpeta de imágenes
            while(file_exists($file_path)) {
                // Si el archivo existe, agrega un número al final del nombre del archivo
                $filename = $original_name . '_' . $counter . '.' . $file_extension;
                $file_path = public_path('public/src/images/' . $filename);
                $counter++;
            }
    
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        Task::create($incomingField);
    
        return redirect('/tareas');
    }
    public function deleteTask(Request $request, $id){
        // Obtén la tarea actual de la base de datos
        $task = Task::find($id);
        // Elimina la imagen
        $oldImagePath = public_path('public/src/images/' . $task->pathImg);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        Task::where('id', $id)->delete();  
        
        return redirect('/tareas');    
    }

    public function modificarTask(Request $request){
        $id = $request->input('id'); // Obtén el 'id' de la petición
    
        $incomingField = $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "autism_lvl" => ["required"]
        ]);
    
        // Obtén la tarea actual de la base de datos
        $task = Task::find($id);
    
        if ($file = $request->file('pathImg')) {
            // Elimina la imagen antigua
            $oldImagePath = public_path('public/src/images/' . $task->pathImg);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            // Almacena la nueva imagen
            $filename = $file->getClientOriginalName();
            $file_path = public_path('public/src/images/' . $filename);
    
            // Chequea si el archivo ya existe
            $file_extension = $file->getClientOriginalExtension();
            $original_name = basename($filename, '.'.$file_extension);
            $counter = 1;
    
            while(file_exists($file_path)) {
                // Si el archivo existe, agrega un número al final del nombre del archivo
                $filename = $original_name . '_' . $counter . '.' . $file_extension;
                $file_path = public_path('public/src/images/' . $filename);
                $counter++;
            }
    
            $file->move(public_path('public/src/images'), $filename);
            $incomingField['pathImg'] = $filename;
        }
    
        // Actualiza la tarea en la base de datos
        $task->update($incomingField);
    
        return redirect('/tareas');
    }
    
}
