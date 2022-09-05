<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
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


// Admin Dashboard Routes
Route::name('dashboard.')->middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // Employee
    Route::name('employee.')->prefix('employee')->group(function(){
        Route::get('manage', [EmployeeController::class, 'index'])->name('manage');
    });
    
    // Instructor
    Route::name('instructor.')->prefix('instructor')->group(function(){
        Route::get('manage', [InstructorController::class, 'index'])->name('manage');
    });
    
    // Student
    Route::name('student.')->prefix('student')->group(function(){
        Route::get('manage', [StudentController::class, 'index'])->name('manage');
    });
});

require __DIR__.'/auth.php';
