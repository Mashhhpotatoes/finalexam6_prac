<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    
    Route::get('employee', [App\Http\Controllers\employeecontroller::class, 'index']);
    Route::post('employee', [App\Http\Controllers\employeecontroller::class, 'index']);


    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    // Employee routes
    Route::get('employee', [\App\Http\Controllers\employeecontroller::class, 'index'])->name('employee.index');

    //student routes
    route::get('students', [\App\Http\Controllers\StudentController::class, 'index'])->name('studentmngt.index');
    route::get('students/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('studentmngt.create');
    route::post('students', [\App\Http\Controllers\StudentController::class, 'store'])->name('studentmngt.store');


    
    route::get('students/{id}/edit', [\App\Http\Controllers\StudentController::class, 'edit'])->name('studentmngt.edit');
    route::put('students/{id}/edit', [\App\Http\Controllers\StudentController::class, 'update'])->name('studentmngt.update');
    route::get('students/{id}/delete', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('studentmngt.delete');






    //Profile routes
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
