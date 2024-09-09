<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::post('/tasks/{id}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');