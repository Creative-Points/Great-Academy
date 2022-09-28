<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\WorkshopController;
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
Route::name('dashboard.')->middleware(['auth', 'role:Employee'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'account'])->name('account');

    // Employee
    // Route::name('employee.')->prefix('employee')->group(function(){
    //     Route::get('manage', [EmployeeController::class, 'index'])->name('manage');
    //     Route::post('add', [EmployeeController::class, 'store'])->name('add');
    //     Route::put('{user}/update', [EmployeeController::class, 'update'])->name('update');
    //     Route::get('{user}/view', [EmployeeController::class, 'show'])->name('view');
    //     Route::get('{user}/suspended', [EmployeeController::class, 'suspended'])->name('suspended');
    //     Route::get('{user}/active', [EmployeeController::class, 'active'])->name('active');
    //     Route::delete('{user}/delete', [EmployeeController::class, 'delete'])->name('delete');
    //     Route::post('{user}/change-password', [EmployeeController::class, 'changePassword'])->name('password');
    // });

    // Instructor
    Route::name('instructor.')->prefix('instructor')->group(function(){
        Route::get('manage', [InstructorController::class, 'index'])->name('manage');
        // Route::post('add', [InstructorController::class, 'store'])->name('add');
        // Route::put('{user}/update', [InstructorController::class, 'update'])->name('update');
        Route::get('{user}/view', [InstructorController::class, 'show'])->name('view');
        // Route::get('{user}/suspended', [InstructorController::class, 'suspended'])->name('suspended');
        // Route::get('{user}/active', [InstructorController::class, 'active'])->name('active');
        // Route::delete('{user}/delete', [InstructorController::class, 'delete'])->name('delete');
        // Route::post('{user}/change-password', [InstructorController::class, 'changePassword'])->name('password');
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
        // Route::post('{user}/change-password', [StudentController::class, 'changePassword'])->name('password');
    });

    // Course
    Route::name('course.')->prefix('course')->group(function(){
        Route::get('manage', [CourseController::class, 'index'])->name('manage');
        // Route::post('add', [CourseController::class, 'store'])->name('add');
        // Route::put('{slug}/update', [CourseController::class, 'update'])->name('update');
        // Route::put('{slug}/update/image', [CourseController::class, 'image'])->name('image');
        Route::get('{slug}/view', [CourseController::class, 'show'])->name('view');
        // Route::get('{slug}/inactive', [CourseController::class, 'inactive'])->name('inactive');
        // Route::get('{slug}/active', [CourseController::class, 'active'])->name('active');
        // Route::delete('{slug}/delete', [CourseController::class, 'delete'])->name('delete');
    });

    // Workshop
    Route::name('workshop.')->prefix('workshop')->group(function(){
        Route::get('manage', [WorkshopController::class, 'index'])->name('manage');
        // Route::post('add', [WorkshopController::class, 'store'])->name('add');
        // Route::put('{slug}/update', [WorkshopController::class, 'update'])->name('update');
        // Route::put('{slug}/update/image', [WorkshopController::class, 'image'])->name('image');
        Route::get('{slug}/view', [WorkshopController::class, 'show'])->name('view');
        // Route::get('{slug}/inactive', [WorkshopController::class, 'inactive'])->name('inactive');
        // Route::get('{slug}/active', [WorkshopController::class, 'active'])->name('active');
        // Route::delete('{slug}/delete', [WorkshopController::class, 'delete'])->name('delete');
    });

    // Section
    Route::name('section.')->prefix('section')->group(function(){
        Route::get('manage', [SectionController::class, 'index'])->name('manage');
        // Route::post('add', [SectionController::class, 'store'])->name('add');
        // Route::put('{slug}/update', [SectionController::class, 'update'])->name('update');
        // Route::put('{slug}/update/image', [SectionController::class, 'image'])->name('image');
        Route::get('{slug}/view', [SectionController::class, 'show'])->name('view');
        // Route::get('{slug}/inactive', [SectionController::class, 'inactive'])->name('inactive');
        // Route::get('{slug}/active', [SectionController::class, 'active'])->name('active');
        // Route::delete('{slug}/delete', [SectionController::class, 'delete'])->name('delete');
    });

    // Material
    Route::controller(MaterialController::class)->name('material.')->prefix('material')->group(function(){
        Route::get('manage', 'index')->name('manage');
        // Route::post('add', 'store')->name('add');
        // Route::put('{material:slug}/update', 'update')->name('update');
        // Route::put('{material:slug}/update/file', 'file')->name('file');
        Route::get('display/{material:slug}', 'display')->name('display');
        // Route::get('{material:slug}/inactive', 'inactive')->name('inactive');
        // Route::get('{material:slug}/active', 'active')->name('active');
        // Route::delete('{material:slug}/delete', 'delete')->name('delete');
    });

    // Order
    Route::controller(OrderController::class)->name('order.')->prefix('order')->group(function(){
        // course
        Route::name('course.')->prefix('course')->group(function(){
            Route::get('manage', 'cIndex')->name('manage');
            Route::get('{order:code}/view', 'cShow')->name('view');
            Route::put('{order:code}/pay', 'pay')->name('pay');
            Route::put('{order:code}/update', 'update')->name('update');
            Route::get('{order:code}/active', 'active')->name('active');
            Route::get('{order:code}/suspend', 'suspend')->name('suspend');
            Route::get('{order:code}/inactive', 'inactive')->name('inactive');
            // Route::delete('{order:code}/delete', 'delete')->name('delete');
        });
        // workshops
        Route::name('workshop.')->prefix('workshop')->group(function(){
            Route::get('manage', 'wIndex')->name('manage');
            Route::get('{order:code}/view', 'wShow')->name('view');
            Route::put('{order:code}/pay', 'pay')->name('pay');
            Route::put('{order:code}/update', 'update')->name('update');
            Route::get('{order:code}/active', 'active')->name('active');
            Route::get('{order:code}/suspend', 'suspend')->name('suspend');
            Route::get('{order:code}/inactive', 'inactive')->name('inactive');
            // Route::delete('{order:code}/delete', 'delete')->name('delete');
        });
        
    });
});

require __DIR__.'/auth.php';