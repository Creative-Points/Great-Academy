<?php

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SectionController as AdminSectionController;
use App\Http\Controllers\Admin\WorkshopController as AdminWorkshopController;
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

Route::middleware(['auth', 'role:instructor'])->name('ins.')->prefix('ins/dashboard')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');
    Route::controller(AdminProfileController::class)->name('my.')->prefix('profile')->group(function(){
        Route::get('/', 'account')->name('account');
        Route::put('update', 'update')->name('update');
        Route::post('change-password', 'changePassword')->name('password');
    });
    // Student
        // Route::controller(AdminStudentController::class)->name('student.')->prefix('student')->group(function(){
        //     Route::get('manage', 'index')->name('manage');
        //     // Route::post('add', 'store')->name('add');
        //     // Route::put('{user}/update', 'update')->name('update');
        //     Route::get('{user}/view', 'show')->name('view');
        //     // Route::get('{user}/suspended', 'suspended')->name('suspended');
        //     // Route::get('{user}/active', 'active')->name('active');
        //     // Route::delete('{user}/delete', 'delete')->name('delete');
        //     // Route::post('{user}/change-password', 'changePassword')->name('password');
        // });

        // Course
        Route::controller(AdminCourseController::class)->name('course.')->prefix('course')->group(function(){
            Route::get('manage', 'index')->name('manage');
            // Route::post('add', 'store')->name('add');
            // Route::put('{slug}/update', 'update')->name('update');
            // Route::put('{slug}/update/image', 'image')->name('image');
            Route::get('{course:slug}/view', 'show')->name('view');
            // Route::get('{slug}/inactive', 'inactive')->name('inactive');
            // Route::get('{slug}/active', 'active')->name('active');
            // Route::delete('{slug}/delete', 'delete')->name('delete');
        });

        // Workshop
        Route::controller(AdminWorkshopController::class)->name('workshop.')->prefix('workshop')->group(function(){
            Route::get('manage', 'index')->name('manage');
            // Route::post('add', 'store')->name('add');
            // Route::put('{slug}/update', 'update')->name('update');
            // Route::put('{slug}/update/image', 'image')->name('image');
            Route::get('{slug}/view', 'show')->name('view');
            // Route::get('{slug}/inactive', 'inactive')->name('inactive');
            // Route::get('{slug}/active', 'active')->name('active');
            // Route::delete('{slug}/delete', 'delete')->name('delete');
        });

        // Section
        Route::controller(AdminSectionController::class)->name('section.')->prefix('section')->group(function(){
            Route::get('manage', 'index')->name('manage');
            // Route::post('add', 'store')->name('add');
            // Route::put('{slug}/update', 'update')->name('update');
            // Route::put('{slug}/update/image', 'image')->name('image');
            Route::get('{slug}/view', 'show')->name('view');
            // Route::get('{slug}/inactive', 'inactive')->name('inactive');
            // Route::get('{slug}/active', 'active')->name('active');
            // Route::delete('{slug}/delete', 'delete')->name('delete');
        });

        // Material
        Route::controller(AdminMaterialController::class)->name('material.')->prefix('material')->group(function(){
            Route::get('manage', 'index')->name('manage');
            Route::post('add', 'store')->name('add');
            // Route::put('{material:slug}/update', 'update')->name('update');
            // Route::put('{material:slug}/update/file', 'file')->name('file');
            Route::get('display/{material:slug}', 'display')->name('display');
            Route::get('{material:slug}/inactive', 'inactive')->name('inactive');
            Route::get('{material:slug}/active', 'active')->name('active');
            Route::delete('{material:slug}/delete', 'delete')->name('delete');
        });

});