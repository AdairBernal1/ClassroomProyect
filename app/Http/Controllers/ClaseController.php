<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'Admin') {
            $clases = Clase::all(); // Obtener todas las clases para el administrador
        } else {
            $clases = Auth::user()->clases; // Obtener solo las clases del usuario actual
        }

        return view('listClases', compact('clases'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abcClasePut');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);
    
        $clase = Clase::create($request->all());
    
        return redirect()->route('clase.addStudents', $clase->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        return view('editClase', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $clase->update($request->all());

        return redirect()->route('clase.index')->with('success', 'Clase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();

        return redirect()->route('clase.index')->with('success', 'Clase deleted successfully');
    }
    public function addStudents(Clase $clase)
    {
        $students = User::where('user_type', 'Usuario')->get();
        return view('addStudentsToClass', compact('clase', 'students'));
    }
    public function storeStudents(Request $request, Clase $clase)
    {
        $clase->users()->sync($request->students);
        return redirect()->route('clase.index')->with('success', 'Students added successfully');
    }


}
