<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
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
Route::name('dashboard.')->middleware(['auth', 'role:Admin'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'account'])->name('account');

    // Employee
    Route::name('employee.')->prefix('employee')->group(function(){
        Route::get('manage', [EmployeeController::class, 'index'])->name('manage');
        Route::post('add', [EmployeeController::class, 'store'])->name('add');
        Route::put('{user}/update', [EmployeeController::class, 'update'])->name('update');
        Route::get('{user}/view', [EmployeeController::class, 'show'])->name('view');
        Route::get('{user}/suspended', [EmployeeController::class, 'suspended'])->name('suspended');
        Route::get('{user}/active', [EmployeeController::class, 'active'])->name('active');
        Route::delete('{user}/delete', [EmployeeController::class, 'delete'])->name('delete');
        Route::post('{user}/change-password', [EmployeeController::class, 'changePassword'])->name('password');
    });

    // Instructor
    Route::name('instructor.')->prefix('instructor')->group(function(){
        Route::get('manage', [InstructorController::class, 'index'])->name('manage');
        Route::post('add', [InstructorController::class, 'store'])->name('add');
        Route::put('{user}/update', [InstructorController::class, 'update'])->name('update');
        Route::get('{user}/view', [InstructorController::class, 'show'])->name('view');
        Route::get('{user}/suspended', [InstructorController::class, 'suspended'])->name('suspended');
        Route::get('{user}/active', [InstructorController::class, 'active'])->name('active');
        Route::delete('{user}/delete', [InstructorController::class, 'delete'])->name('delete');
        Route::post('{user}/change-password', [InstructorController::class, 'changePassword'])->name('password');
    });

    // Student
    Route::name('student.')->prefix('student')->group(function(){
        Route::get('manage', [StudentController::class, 'index'])->name('manage');
        Route::post('add', [StudentController::class, 'store'])->name('add');
        Route::put('{user}/update', [StudentController::class, 'update'])->name('update');
        Route::get('{user}/view', [StudentController::class, 'show'])->name('view');
        Route::get('{user}/suspended', [StudentController::class, 'suspended'])->name('suspended');
        Route::get('{user}/active', [StudentController::class, 'active'])->name('active');
        Route::delete('{user}/delete', [StudentController::class, 'delete'])->name('delete');
        Route::post('{user}/change-password', [StudentController::class, 'changePassword'])->name('password');
    });

    // Course
    Route::name('course.')->prefix('course')->group(function(){
        Route::get('manage', [CourseController::class, 'index'])->name('manage');
        Route::post('add', [CourseController::class, 'store'])->name('add');
        Route::put('{id}/update', [CourseController::class, 'update'])->name('update');
        Route::get('{id}/view', [CourseController::class, 'show'])->name('view');
        Route::get('{id}/suspended', [CourseController::class, 'suspended'])->name('suspended');
        Route::get('{id}/active', [CourseController::class, 'active'])->name('active');
        Route::delete('{id}/delete', [CourseController::class, 'delete'])->name('delete');
        // Route::post('{id}/change-password', [CourseController::class, 'changePassword'])->name('password');
    });

    // Section
    Route::name('section.')->prefix('section')->group(function(){
        Route::get('manage', [SectionController::class, 'index'])->name('manage');
        Route::post('add', [SectionController::class, 'store'])->name('add');
        Route::put('{id}/update', [SectionController::class, 'update'])->name('update');
        Route::get('{id}/view', [SectionController::class, 'show'])->name('view');
        Route::get('{id}/suspended', [SectionController::class, 'suspended'])->name('suspended');
        Route::get('{id}/active', [SectionController::class, 'active'])->name('active');
        Route::delete('{id}/delete', [SectionController::class, 'delete'])->name('delete');
        // Route::post('{id}/change-password', [CourseController::class, 'changePassword'])->name('password');
    });
});

require __DIR__.'/auth.php';
