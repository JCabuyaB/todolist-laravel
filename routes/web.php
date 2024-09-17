<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.delete');