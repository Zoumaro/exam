<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
Route::post('/courses', [CoursesController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}', [CoursesController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}/edit', [CoursesController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}/update', [CoursesController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CoursesController::class, 'supprimer'])->name('courses.supprimer');


