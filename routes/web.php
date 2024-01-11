<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaseController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//General routes
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    if (auth() -> check()) {
        return view('dashboard');
    } else {
        return redirect ('/');
    }
});

//TaskController routes
//TaskController routes
Route::get('/tareas', function () {
    if (auth()->check()) {
        if (auth()->user()->user_type == 'Admin') {
            $tasks = Task::all(); // Obtén todas las tareas para el administrador
        } else {
            // Obtén las clases del usuario actual
            $clases = auth()->user()->clases;

            // Obtén las tareas que pertenecen a cualquiera de las clases del usuario
            $tasks = Task::whereHas('clases', function ($query) use ($clases) {
                $query->whereIn('clases.id', $clases->pluck('id')->toArray());
            })->get();
        }

        return view('listTasks', ['Tasks' => $tasks]);
    } else {
        return redirect('/');
    }
});


Route::get('/crear-tarea', function () {
    if (auth()->check()) {
        $clases = \App\Models\Clase::all();
        return view('abcTask', ['clases' => $clases]);
    } else {
        return redirect('/');
    }
});


Route::get('/modificar-task/{id}', function ($id){
    if (auth()->check()) {
        $task = Task::find($id);
        $clases = $task->clases;
        return view('abcTaskPut', ['Task'=> $task, 'clases' => $clases]);
    } else {
        return redirect ('/');
    }
});

//TaskController routes
Route::post('/registrar-task',[TaskController::class,'createTask']);
Route::post('/modificar-task',[TaskController::class,'modificarTask']);
Route::get('/eliminar-task/{id}',[TaskController::class,'deleteTask']);

//UserController routes
Route::resource('user', UserController::class);
Route::post('/user/storeAdmin', [UserController::class, 'storeAdmin'])->name('user.storeAdmin');
Route::post('/iniciar-sesion',[UserController::class,'login']);
Route::get('/cerrar-sesion',[UserController::class,'logout']);

//ClaseController routes
Route::resource('clase', ClaseController::class);
Route::get('/clase/{clase}/addStudents', [ClaseController::class, 'addStudents'])->name('clase.addStudents');
Route::post('/clase/{clase}/storeStudents', [ClaseController::class, 'storeStudents'])->name('clase.storeStudents');
