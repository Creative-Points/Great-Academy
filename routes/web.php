<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkshopController;

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\Admin\InstructorController as AdminInstructorController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
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

Route::controller(FrontendController::class)->group(function() {
    // home page
    Route::get('/', 'home')->name('home');
    // about us page
    Route::get('about', 'about')->name('about');
    // contact us page
    Route::get('contact-us', 'contact')->name('contact-us');
});

Route::get('test', [TestController::class, 'index']);
Route::get('test/data', [TestController::class, 'data']);
// sections
Route::controller(SectionController::class)->group(function() {
    Route::get('sections', 'index')->name('sections');
    Route::get('section/{slug}/{type?}', 'section')->name('section');
});
// courses
Route::controller(CourseController::class)->group(function() {
    Route::get('/courses', 'index')->name('courses');
    Route::get('course/{course:slug}', 'course')->name('course');
});
// workshops
Route::controller(WorkshopController::class)->group(function() {
    Route::get('/workshops', 'index')->name('workshops');
    Route::get('workshop/{workshop:slug}', 'workshop')->name('workshop');
});
// pre order
Route::controller(OrderController::class)->name('order.')->prefix('preorder')->group(function(){
    Route::post('course/n/{course:slug}', 'courseNewUser')->name('courseNewUser');
    Route::post('course/r/{course:slug}', 'courseRegisterUser')->name('courseRegisterUser');
    Route::post('workshop/n/{workshop:slug}', 'workshopNewUser')->name('workshopNewUser');
    Route::post('workshop/r/{workshop:slug}', 'workshopRegisterUser')->name('workshopRegisterUser');
});
// student routes
Route::middleware(['auth', 'role:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('dashboard');
});

// =================================================================
// Admin Dashboard Routes
Route::name('dashboard.')->middleware(['auth', 'role:Admin'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');
    Route::controller(AdminProfileController::class)->name('my.')->prefix('profile')->group(function(){
        Route::get('/', 'account')->name('account');
        Route::put('update', 'update')->name('update');
        Route::post('change-password', 'changePassword')->name('password');
    });

    // Layouts in Main website
    Route::controller(NewsController::class)->name('news.')->prefix('news')->group(function(){
        Route::get('/', 'index')->name('manage');
        Route::post('/add', 'store')->name('add');
        Route::get('{news:id}/active', 'active')->name('active');
        Route::get('{news:id}/inactive', 'inactive')->name('inactive');
        Route::delete('{news:id}/delete', 'delete')->name('delete');
    });

    // Employee
    Route::controller(AdminEmployeeController::class)->name('employee.')->prefix('employee')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::get('{user:id}/view', 'show')->name('view');
        Route::put('{id}/update', 'update')->name('update');
        Route::get('{user:id}/suspended', 'suspended')->name('suspended');
        Route::get('{user:id}/active', 'active')->name('active');
        Route::delete('{user:id}/delete', 'delete')->name('delete');
        Route::post('{user:id}/change-password', 'changePassword')->name('password');
    });

    // Instructor
    Route::controller(AdminInstructorController::class)->name('instructor.')->prefix('instructor')->group(function(){
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
    Route::controller(AdminStudentController::class)->name('student.')->prefix('student')->group(function(){
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
    Route::controller(AdminCourseController::class)->name('course.')->prefix('course')->group(function(){
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
    Route::controller(AdminWorkshopController::class)->name('workshop.')->prefix('workshop')->group(function(){
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
    Route::controller(AdminSectionController::class)->name('section.')->prefix('section')->group(function(){
        Route::get('manage', 'index')->name('manage');
        Route::post('add', 'store')->name('add');
        Route::put('{slug}/update', 'update')->name('update');
        Route::put('{slug}/update/image', 'image')->name('image');
        Route::get('{slug}/view', 'show')->name('view');
        Route::get('{slug}/inactive', 'inactive')->name('inactive');
        Route::get('{slug}/active', 'active')->name('active');
        Route::delete('{slug}/delete', 'delete')->name('delete');
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
            Route::delete('{order:code}/delete', 'delete')->name('delete');
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
            Route::delete('{order:code}/delete', 'delete')->name('delete');
        });
        
    });
});

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

// ======================================================================
// Instructor Dashboard Routes
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
require __DIR__.'/auth.php';
