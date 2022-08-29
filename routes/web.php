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

// student routes
Route::middleware(['auth', 'role:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:instructor'])->name('instructor.')->prefix('instructor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
});

// Admin Dashboard Routes
Route::name('dashboard.')->middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {
    // Route::get('/', function(){
    //     return redirect()->route('admin.home');
    // })->name('index');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});

require __DIR__.'/auth.php';
