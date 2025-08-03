<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthManager::class, 'login'])
    ->name('login');

Route::get('logout', [AuthManager::class, 'logout'])
    ->name('logout');
    
Route::post('login', [AuthManager::class, 'loginPost'])
    ->name('login.post');

Route::get('register', [AuthManager::class, 'register'])
    ->name('register');
    
Route::post('register', [AuthManager::class, 'registerPost'])
    ->name('register.post');

Route::middleware(['auth'])->group(function () { //only authenticated users can access these routes
    Route::get('/', [TaskManager::class, 'listTasks'])->name('home');

    // Grouping all task routes under /tasks
    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::get('status/{id}', [TaskManager::class, 'updateTaskStatus'])->name('update.status');
        Route::get('add', [TaskManager::class, 'addTask'])->name('add');
        Route::post('add', [TaskManager::class, 'addTaskPost'])->name('add.post');
        Route::get('delete/{id}', [TaskManager::class, 'deleteTask'])->name('delete');
    });
});
