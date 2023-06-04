<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/students',studentController::class);
Route::resource('/students',courseController::class);
Route::resource('/students',groupController::class);


Route::get('/students', [studentController::class, 'index'])->name('student.index');
Route::get('/students/create', [studentController::class, 'create'])->name('student.create');
Route::post('/students/add', [studentController::class, 'store'])->name('student.store');

Route::get('/students/{id}/edit', [studentController::class,'edit'])->name('students.edit');
Route::patch('/students/{id}', [studentController::class,'update'])->name('students.update');

Route::delete('/students/{id}/delete', [studentController::class,'destroy'])->name('students.destroy');


Route::get('/courses', [courseController::class,'index'])->name('courses.index');
Route::get('/courses/create',[courseController::class,'create'])->name('courses.create');
Route::post('/courses/add', [courseController::class,'store'])->name('courses.store');
Route::delete('/courses/{id}', [courseController::class,'destroy'])->name('courses.destroy');


Route::get('/groups',  [groupController::class,'index'])->name('groups.index');
Route::post('/groups/add',  [groupController::class,'store'])->name('groups.store');
Route::delete('/groups/{id}', [groupController::class,'destroy'])->name('groups.destroy');
Route::get('/groups/create', [groupController::class,'create'])->name('groups.create');




