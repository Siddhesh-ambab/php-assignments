<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('todo_show',[TodoController::class,'show']);

Route::get('todo_insert',[TodoController::class,'create']);

Route::post('submit',[TodoController::class,'store']);

Route::get('todo_delete/{id}',[TodoController::class,'destroy']);

Route::get('todo_edit/{id}',[TodoController::class,'edit']);
Route::post('todo_update/{id}',[TodoController::class,'update'])->name('todo.update');
