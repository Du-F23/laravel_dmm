<?php

namespace App\Http\Controllers;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/show', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/create',[StudentsController::class,'create'])->name('students.create');
Route::post('/students/store',[StudentsController::class,'store'])->name('students.store');
Route::get('/students/{id}/edit',[StudentsController::class,'edit'])->name('students.edit');
Route::put('/students/{id}/update',[StudentsController::class,'update'])->name('students.update');
Route::delete('/students/{id}/delete',[StudentsController::class,'destroy'])->name('students.destroy');