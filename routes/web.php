<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkshopController;
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



require __DIR__.'/auth.php';
