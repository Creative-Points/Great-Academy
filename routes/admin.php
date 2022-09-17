<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
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
Route::name('dashboard.')->middleware(['auth', 'role:Admin|Employee'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'account'])->name('account');

    // Employee
    Route::controller(EmployeeController::class)->name('employee.')->prefix('employee')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{user:id}/update', 'update')->name('update');
        Route::get('{users:id}/view', 'show')->name('view');
        Route::get('{user:id}/suspended', 'suspended')->name('suspended');
        Route::get('{user:id}/active', 'active')->name('active');
        Route::delete('{user:id}/delete', 'delete')->name('delete');
        Route::post('{user:id}/change-password', 'changePassword')->name('password');
    });

    // Instructor
    Route::controller(InstructorController::class)->name('instructor.')->prefix('instructor')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{user}/update', 'update')->name('update');
        Route::get('{user}/view', 'show')->name('view');
        Route::get('{user}/suspended', 'suspended')->name('suspended');
        Route::get('{user}/active', 'active')->name('active');
        Route::delete('{user}/delete', 'delete')->name('delete');
        Route::post('{user}/change-password', 'changePassword')->name('password');
    });

    // Student
    Route::controller(StudentController::class)->name('student.')->prefix('student')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{user}/update', 'update')->name('update');
        Route::get('{user}/view', 'show')->name('view');
        Route::get('{user}/suspended', 'suspended')->name('suspended');
        Route::get('{user}/active', 'active')->name('active');
        Route::delete('{user}/delete', 'delete')->name('delete');
        Route::post('{user}/change-password', 'changePassword')->name('password');
    });

    // Course
    Route::controller(CourseController::class)->name('course.')->prefix('course')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{slug}/update', 'update')->name('update');
        Route::put('{slug}/update/image', 'image')->name('image');
        Route::get('{course:slug}/view', 'show')->name('view');
        Route::get('{slug}/inactive', 'inactive')->name('inactive');
        Route::get('{slug}/active', 'active')->name('active');
        Route::delete('{slug}/delete', 'delete')->name('delete');
    });

    // Workshop
    Route::controller(WorkshopController::class)->name('workshop.')->prefix('workshop')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{slug}/update', 'update')->name('update');
        Route::put('{slug}/update/image', 'image')->name('image');
        Route::get('{slug}/view', 'show')->name('view');
        Route::get('{slug}/inactive', 'inactive')->name('inactive');
        Route::get('{slug}/active', 'active')->name('active');
        Route::delete('{slug}/delete', 'delete')->name('delete');
    });

    // Section
    Route::controller(SectionController::class)->name('section.')->prefix('section')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{slug}/update', 'update')->name('update');
        Route::put('{slug}/update/image', 'image')->name('image');
        Route::get('{slug}/view', 'show')->name('view');
        Route::get('{slug}/inactive', 'inactive')->name('inactive');
        Route::get('{slug}/active', 'active')->name('active');
        Route::delete('{slug}/delete', 'delete')->name('delete');
    });
});

require __DIR__.'/auth.php';
