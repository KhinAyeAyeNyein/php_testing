<?php

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;



/**
 * Show Task Dashboard
 */

Route::get('/',  [TaskController::class, 'getTasks']);

/**
 * Add New Task
 */

Route::post('/task', [TaskController::class, 'postTask']);

/**
 * Delete Task
 */

Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);
