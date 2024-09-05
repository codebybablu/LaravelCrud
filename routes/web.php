<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group(function () {
Route::get('student', 'index')->name('index');
Route::get('student/create', 'create')->name('student.create');
Route::post('student/store', 'store')->name('student.store');
Route::get('student/edit/{id}', 'edit');
Route::post('student/update/{id}', 'update')->name('student.update');
Route::get('student/delete/{id}', 'destroy');
});