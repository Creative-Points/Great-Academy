<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\StudentController;
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
// sections
Route::get('sections', function () {
    return view('sections');
})->name('sections');
// courses
Route::get('/courses', function () {
    return view('courses');
})->name('courses');
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
    Route::get('/home', [StudentController::class, 'index'])->name('home');
});



require __DIR__.'/auth.php';
