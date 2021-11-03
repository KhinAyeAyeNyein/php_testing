<?php

use App\Http\Controllers\API\Student\StudentAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/students/list', [StudentAPIController::class, 'showStudentList']);

Route::get('/students/{studentId}', [StudentAPIController::class, 'getStudentById']);
Route::post('/students/create', [StudentAPIController::class, 'createStudent']);
Route::post('/students/upload', [StudentAPIController::class, 'uploadStudentCSVFile']);
Route::post('/students/edit/{studentId}', [StudentAPIController::class, 'updateStudent']);
Route::delete('/students/delete/{studentId}', [StudentAPIController::class, 'deleteStudentById']);
