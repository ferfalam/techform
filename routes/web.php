<?php

use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [CourseController::class, 'index'] )->name('courses.index');
Route::get('/courses', [CourseController::class, 'index'] )->name('courses.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/toggleProgress', [CourseController::class, 'toggleProgress'])->name('courses.toggle');

    Route::post('/courses',[CourseController::class, 'store']);
    Route::get('/course/edit/{id}',[CourseController::class, 'edit']);
    Route::patch('/course/{id}',[CourseController::class, 'update']);

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
