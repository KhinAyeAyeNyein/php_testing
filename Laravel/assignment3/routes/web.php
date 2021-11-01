<?php

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Mark\MarkController;
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

Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/student/create',  [StudentController::class, 'showStudentCreateView'])->name('create.students');
Route::post('/student/create',  [StudentController::class, 'submitStudentCreateView'])->name('create.students');
Route::get('/student/create/confirm', [StudentController::class, 'showStudentCreateConfirmView'])->name('students.create.confirm');
Route::post('/student/create/confirm',  [StudentController::class, 'submitStudentCreateConfirmView'])->name('students.create.confirm');
Route::get('/student/edit/{studentId}',  [StudentController::class, 'showStudentEdit'])->name('students.edit');
Route::post('/student/edit/{studentId}',  [StudentController::class, 'submitStudentEditView'])->name('students.edit');
Route::get('/student/edit/{studentId}/confirm',  [StudentController::class, 'showStudentEditConfirmView'])->name('student.edit.confirm');
Route::post('/student/edit/{studentId}/confirm',  [StudentController::class, 'submitStudentEditConfirmView'])->name('submitStudentEditConfirmView');
Route::get('/student/upload', [StudentController::class, 'showStudentUploadView'])->name('students.upload');
Route::post('/student/upload', [StudentController::class, 'submitStudentUploadView'])->name('students.upload');
Route::get('/student/download', [StudentController::class, 'downloadStudentCSV'])->name('downloadStudentCSV');
Route::get('/s/search', [StudentController::class, 'search'])->name('search');


Route::get('/mark/create',  [MarkController::class, 'showMarkCreateView'])->name('create.marks');
Route::post('/mark/create',  [MarkController::class, 'submitMarkCreateView'])->name('create.marks');
Route::get('/mark/create/confirm', [MarkController::class, 'showMarkCreateConfirmView'])->name('marks.create.confirm');
Route::post('/mark/create/confirm',  [MarkController::class, 'submitMarkCreateConfirmView'])->name('marks.create.confirm');
Route::get('/mark/edit/{markId}',  [MarkController::class, 'showMarkEdit'])->name('marks.edit');
Route::post('/mark/edit/{markId}',  [MarkController::class, 'submitMarkEditView'])->name('marks.edit');
Route::get('/mark/edit/{markId}/confirm',  [MarkController::class, 'showMarkEditConfirmView'])->name('mark.edit.confirm');
Route::post('/mark/edit/{studentId}/confirm',  [MarkController::class, 'submitMarkEditConfirmView'])->name('submitMarkEditConfirmView');
Route::get('/mark/upload', [MarkController::class, 'showMarkUploadView'])->name('marks.upload');
Route::post('/mark/upload', [MarkController::class, 'submitMarkUploadView'])->name('marks.upload');
Route::get('/mark/download', [MarkController::class, 'downloadMarkCSV'])->name('downloadMarkCSV');
Route::get('/search', [MarkController::class, 'search'])->name('search');

Route::get('/mark/add', [MarkController::class, 'create'])->name('mark.create1');
Route::post('/mark/add', [MarkController::class, 'store'])->name('mark.store');

Route::get('/students/list', [StudentController::class, 'showStudentList'])->name('studentList');
Route::get('/marks/list', [MarkController::class, 'showMarkList'])->name('markList');
//Route::delete('/students/delete/{studentId}', [StudentController::class, 'deleteStudentById']);
Route::delete('/students/list/{id}', [StudentController::class, 'deleteStudentById']);
Route::delete('/marks/list/{id}', [MarkController::class, 'deleteMarkById']);