<?php

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
    return view('schedule');
})->name('schedule');
Route::get('/changes', function () {
    return view('changes');
})->name('changes');

//Страница редактирования расписания
Route::get('/schedule/edit', 'App\Http\Controllers\EditorController@index')->name('editor');
Route::get('/schedule/edit/lesson/submit', 'App\Http\Controllers\LessonController@addLesson')->name('timetable-addlesson');

//Страница редактирования общих данных
Route::get('/schedule/edit/data', 'App\Http\Controllers\EditDataController@index')->name('editdata');

Route::post('/schedule/edit/data/group/submit', 'App\Http\Controllers\GroupController@addGroup')->name('editor-addgroup');
Route::get('/schedule/edit/data/group/remove/{id}', 'App\Http\Controllers\GroupController@removeGroup')->name('editor-removegroup');
Route::post('/schedule/edit/data/teacher/submit', 'App\Http\Controllers\TeacherController@addTeacher')->name('editor-addteacher');
Route::get('/schedule/edit/data/teacher/remove/{id}', 'App\Http\Controllers\TeacherController@removeTeacher')->name('editor-removeteacher');
Route::post('/schedule/edit/data/subject/submit', 'App\Http\Controllers\SubjectController@addSubject')->name('editor-addsubject');
Route::get('/schedule/edit/data/subject/remove/{id}', 'App\Http\Controllers\SubjectController@removeSubject')->name('editor-removesubject');
Route::post('/schedule/edit/data/classroom/submit', 'App\Http\Controllers\ClassroomController@addClassroom')->name('editor-addclassroom');
Route::get('/schedule/edit/data/classroom/remove/{id}', 'App\Http\Controllers\ClassroomController@removeClassroom')->name('editor-removeclassroom');
Route::post('/schedule/edit/data/subjectlink/submit', 'App\Http\Controllers\SubjectLinkController@addSubjectLink')->name('editor-addsubjectlink');
Route::get('/schedule/edit/data/subjectlink/remove/{id}', 'App\Http\Controllers\SubjectLinkController@removeSubjectLink')->name('editor-removesubjectlink');
