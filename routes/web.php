<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
Route::get('/tareas', function () {
    if (auth() -> check()) {
        $all_items = Task::all();
        return view('listTasks', ['Tasks' => $all_items]);
    }else {
        return redirect ('/');
    }
});

Route::get('/crear-tarea', function () {
    if (auth() -> check()) {
        return view('abcTask');
    }else {
        return redirect ('/');
    }
});
//TaskController routes
Route::post('/registrar-task',[TaskController::class,'createTask']);
Route::get('/eliminar-task/{id}',[TaskController::class,'deleteTask']);

//UserController routes
Route::post('/registrar-usuario',[UserController::class,'register']);
Route::post('/iniciar-sesion',[UserController::class,'login']);
Route::get('/cerrar-sesion',[UserController::class,'logout']);