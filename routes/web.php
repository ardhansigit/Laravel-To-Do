<?php

use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/wuttodo', function () {
 //   return view('todo.todo');
//});

Route::get('/wuttodo', [TodoController::class,'index'])->name('todo');

Route::post('/wuttodo',[TodoController::class,'store'])->name('todo.post');

Route::put('/wuttodo/{id}',[TodoController::class,'update'])->name('todo.update');

Route::delete('/wuttodo/{id}',[TodoController::class,'destroy'])->name('todo.delete');