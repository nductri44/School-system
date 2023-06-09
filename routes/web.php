<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SetMarkController;


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
    return view('welcome');
});

Route::get('/getStudentId', function () {
	$role = Auth::user()->student_id;
	return response()->json($role);
});

Route::get('/getTeacherId', function () {
	$role = Auth::user()->teacher_id;
	return response()->json($role);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/home/form', function (){
	return view('layouts.form');
})->name('forms');

Route::get('/home/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->middleware('admin')->name('teacher');

Route::group(['prefix' => 'uploads'], function () {
		Route::get('/teacher', [TeacherController::class, 'upload']);
		Route::post('/teacherimp', [TeacherController:: class, 'importExport'])->name('import.teachers');
		Route::get('/student', [StudentController::class, 'upload']);
		Route::post('/studentimp', [StudentController:: class, 'importExport'])->name('import.students');
		Route::get('/subject', [SubjectController::class, 'upload']);
		Route::post('/subjectimp', [SubjectController:: class, 'importExport'])->name('import.subjects');
});

Route::group(['prefix' => 'subjects'], function () {
	Route::get('/byhand-subjects', [App\Http\Controllers\SubjectController::class, 'uploadbyhand'])->name('byhand.subjects');
	Route::post('/createbyhand-subjects', [App\Http\Controllers\SubjectController::class, 'importbyhand'])->name('importbyhand.subjects');
});

Route::post('/add.teacher', [App\Http\Controllers\TeacherController::class, 'store'])->name('add.teacher');

Route::group(['prefix' => 'students'], function () {
	Route::get('/{student_id}', [StudentsController::class, 'show'])->name('student.show');
	Route::post('/', [StudentsController::class, 'store'])->name('student.store');
	Route::put('/{student_id}', [StudentsController::class, 'update'])->name('student.update');
	Route::any('/delete/{student_id}',  [StudentsController::class, 'delete'])->name('student.destroy');
});

Route::get('information', [App\Http\Controllers\Admin\StudentsController::class, 'information'])->name('student.information');
Route::get('subject', [App\Http\Controllers\TeacherToSubjectController::class, 'index']);
Route::post('added', [App\Http\Controllers\TeacherToSubjectController::class, 'store'])->name('add_subs');
Route::get('find', [App\Http\Controllers\TeacherToSubjectController::class, 'find'])->name('find');
Route::post('show',[App\Http\Controllers\TeacherToSubjectController::class, 'show'])->name('show');


Route::group(['prefix' => 'uploadStudentReport'], function (){
	Route::get('/main', [SearchController::class, 'index'])->name('main');
	Route::post('/search', [SearchController::class, 'postSearch'])->name('search');
	Route::post('/addnew', [SearchController::class, 'confirmation'])->name('addnew');
	Route::post('/imp', [SearchController::class, 'store'])->name('imp.report');
});

Route::group(['prefix' => 'SetMark'], function (){
	Route::get('/set-mark', [SetMarkController::class, 'index'])->name('set-mark');
	Route::post('/search', [SearchController::class, 'reportSearch'])->name('search');
	Route::get('/download', [SetMarkController::class, 'download'])->name('download-file');

});