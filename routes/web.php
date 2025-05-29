<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SubjectsController;


Route::get('/', [TeachersController::class, 'index'])->name('home');

Route::resource('students', StudentsController::class);
Route::resource('teachers', TeachersController::class);
Route::resource('subjects', SubjectsController::class);
