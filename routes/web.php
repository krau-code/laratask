<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

// Show Home Page
Route::view('/', 'home');

// -----------------------------------------------------------------
// TASK

// Get All Tasks
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth');

// Show Add Task Form
Route::get('/tasks/add', [TaskController::class, 'create'])->middleware('auth');

// Store Task Data
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');

// Show Edit Task Form
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');

// Update Task Data
Route::put('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');

// Delete Task Data
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');

// Show Single Task
Route::get('/tasks/{task}', [TaskController::class, 'show'])->middleware('auth');

// -----------------------------------------------------------------
// USER

// Show Create/Register User Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store/Create User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login User Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
