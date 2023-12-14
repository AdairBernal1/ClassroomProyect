<?php

use Illuminate\Support\Facades\Route;
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
Route::post('/registerTask',function(){  
});

//UserController routes
Route::post('/registrar-usuario',[UserController::class,'register']);
Route::post('/iniciar-sesion',[UserController::class,'login']);
Route::post('/cerrar-sesion',[UserController::class,'logout']);
