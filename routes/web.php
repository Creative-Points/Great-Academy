<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
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
Route::get('sections', [SectionController::class, 'index'])->name('sections');
// courses
Route::get('/courses', function () {
    return view('courses');
})->name('courses');
// about
Route::get('/about', function () {
    return view('about');
})->name('about');
// contact-us
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');
// simple-courses
Route::get('/simple-courses', function () {
    return view('simple-courses');
})->name('simple-courses');
// login-studetn
Route::get('/login-studetn', function () {
    return view('login-studetn');
})->name('login-studetn');
// workshops
Route::get('/workshops', function () {
    return view('workshops');
})->name('workshops');

// student routes
Route::middleware(['auth', 'role:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('dashboard');
});



require __DIR__.'/auth.php';
