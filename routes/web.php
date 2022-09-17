<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourseController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

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
// about
Route::get('/about', function () {
    return view('about');
})->name('about');
// contact-us
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');
// login-studetn
Route::get('/login-studetn', function () {
    return view('login-studetn');
})->name('login-studetn');
// workshops

Route::controller(WorkshopController::class)->group(function() {
    Route::get('/workshops', 'index')->name('workshops');
    Route::get('workshop/{workshop:slug}', 'workshop')->name('workshop');
});

// student routes
Route::middleware(['auth', 'role:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('dashboard');
});



require __DIR__.'/auth.php';
