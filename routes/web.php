<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;

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

Route::put('/tasks', [TodolistController::class ,'update'])->name('tasks.update');
Route::get('/tasks', [TodolistController::class ,'index'])->name('tasks.index');
Route::get('/tasks/{task}/edit', [TodolistController::class ,'edit'])->name('tasks.edit');
Route::delete('/tasks', [TodolistController::class ,'destroy'])->name('tasks.destroy');
Route::get('/tasks/create', [TodolistController::class ,'create'])->name('tasks.create');
Route::post('/tasks', [TodolistController::class ,'store'])->name('tasks.store');
Route::get('/tasks/all', [TodolistController::class ,'getTasksDataTable'])->name('tasks.all');

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});