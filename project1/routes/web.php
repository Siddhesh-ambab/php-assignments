<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontrol;
use App\Http\Controllers\fs;
use App\Http\Controllers\validation;
use App\Http\Controllers\qb;


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

Route::view('home','home');

Route::get('home/{id}', function ($id='') {
    return view('home',['id'=>$id]);
});

Route::get('hh/{id}',[usercontrol::class,'na']);

Route::view('page1','page1')->middleware('user');

// Route::view('page2','page2');

Route::view('form','form');

Route::post('fs',[fs::class,'index']);


// Route::view('news','news');

Route::view('denied','denied');

Route::group(['middleware'=>['userCheck']],function(){
    Route::view('news','news');
});

Route::view('forms','forms');

Route::post('validation',[validation::class,'va']);

Route::get('logout',[validation::class,'logout']);

// Route::get('/page2',function(){
//     if(session()->has('name')){
//        return view('page2');
//     }
//     else{
//         session()->flash('error','Access denied');
//         return redirect('forms');
//     }
// });

Route::group(['middleware'=>['auth']],function(){
    Route::view('denied','denied');
    Route::view('page2','page2');
});

// for query builder


Route::get('insert',[qb::class,'insert']);
Route::get('select',[qb::class,'select']);
Route::get('update',[qb::class,'update']);
Route::get('delete',[qb::class,'delete']);
