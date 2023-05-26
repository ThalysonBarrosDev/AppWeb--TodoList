<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_action'])->name('user.login_action');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_action'])->name('user.register_action');

Route::middleware(['auth'])->group(function() {

    Route::get('/', [HomeController::class, 'home'])->middleware('auth')->name('home');

    Route::get('/task/new', [TaskController::class, 'create'])->name('task.new');
    Route::post('/task/create', [TaskController::class, 'create_action'])->name('task.create_action');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/edit', [TaskController::class, 'edit_action'])->name('task.edit_action');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
