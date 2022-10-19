<?php
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InstructorController as AdminInstructorController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SectionController as AdminSectionController;
use App\Http\Controllers\Admin\WorkshopController as AdminWorkshopController;
use Illuminate\Support\Facades\Route;

// ==============================================================================================
// Employee Dashboard Routes
Route::name('emp.')->middleware(['auth', 'role:Employee'])->prefix('emp/dashboard')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');
    Route::controller(AdminProfileController::class)->name('my.')->prefix('profile')->group(function(){
        Route::get('/', 'account')->name('account');
        Route::put('update', 'update')->name('update');
        Route::post('change-password', 'changePassword')->name('password');
    });

    // Route::put('/profile/update', [AdminProfileController::class, 'update'])->name('update');


    // Instructor
    Route::controller(AdminInstructorController::class)->name('instructor.')->prefix('instructor')->group(function(){
        Route::get('manage', 'index')->name('manage');
        // Route::post('add', 'store')->name('add');
        // Route::put('{user}/update', 'update')->name('update');
        Route::get('{user}/view', 'show')->name('view');
        // Route::get('{user}/suspended', 'suspended')->name('suspended');
        // Route::get('{user}/active', 'active')->name('active');
        // Route::delete('{user}/delete', 'delete')->name('delete');
        // Route::post('{user}/change-password', 'changePassword')->name('password');
    });

    // Student
    Route::controller(AdminStudentController::class)->name('student.')->prefix('student')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{user}/update', 'update')->name('update');
        Route::get('{user}/view', 'show')->name('view');
        Route::get('{user}/suspended', 'suspended')->name('suspended');
        Route::get('{user}/active', 'active')->name('active');
        // Route::delete('{user}/delete', 'delete')->name('delete');
        Route::post('{user}/change-password', 'changePassword')->name('password');
    });

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
        // Route::post('add', 'store')->name('add');
        // Route::put('{material:slug}/update', 'update')->name('update');
        // Route::put('{material:slug}/update/file', 'file')->name('file');
        Route::get('display/{material:slug}', 'display')->name('display');
        // Route::get('{material:slug}/inactive', 'inactive')->name('inactive');
        // Route::get('{material:slug}/active', 'active')->name('active');
        // Route::delete('{material:slug}/delete', 'delete')->name('delete');
    });

    // Order
    Route::controller(AdminOrderController::class)->name('order.')->prefix('order')->group(function(){
        // course
        Route::name('course.')->prefix('course')->group(function(){
            Route::get('manage', 'cIndex')->name('manage');
            Route::get('{order:code}/view', 'cShow')->name('view');
            Route::put('{order:code}/pay', 'pay')->name('pay');
            Route::put('{order:code}/update', 'update')->name('update');
            Route::get('{order:code}/active', 'active')->name('active');
            Route::get('{order:code}/suspend', 'suspend')->name('suspend');
            Route::get('{order:code}/inactive', 'inactive')->name('inactive');
            Route::post('search', 'cSearch')->name('cSearch');
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
            Route::post('search', 'wSearch')->name('wSearch');
            // Route::delete('{order:code}/delete', 'delete')->name('delete');
        });

    });
});
