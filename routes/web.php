<?php

use App\Models\Todolist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodolistController;
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
// Href Fungsi
Route::get('/main', function () {
    return view('dashboard', [
        'todolists' => Todolist::all(),
        'title' => 'Dashboard'
    ]);
})->name('Dashboard')->middleware('auth');

Route::get('/main/about', function () {
    return view('about', [
        'todolists' => Todolist::all(),
        'title' => 'About'
    ]);
})->name('About')->middleware('auth');

// Fungsi CRUD & Completed
Route::get('/main/todolist', [TodolistController::class, 'index'])->name('ToDoList')->middleware('auth');
Route::post('/main/todolist', [TodolistController::class, 'store'])->name('store');
Route::get('/main/{todolist:id}/edit', [TodolistController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/main/{todolist:id}', [TodolistController::class, 'update'])->name('update');
Route::delete('/main/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
Route::get('/main/{todolist}/completed', [TodolistController::class, 'completed'])->name('completed');

// Login 
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('autentikasi');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('tambahAkun');