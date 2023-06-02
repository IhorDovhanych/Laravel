<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/grades', [GradeController::class, 'showAllGrades'])
        ->name('grades');
    Route::get('/grade/edit/{id}', [GradeController::class, 'edit'])
        ->name('grade.edit');
    Route::put('/grade/update/{id}', [GradeController::class, 'update'])
        ->name('grade.update');
    Route::get('/students', [StudentController::class, 'showAllStudents'])
        ->name('students');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])
        ->name('student.edit');
    Route::put('/student/update/{id}', [StudentController::class, 'update'])
        ->name('student.update');
});
Route::get('token/update', [ApiTokenController::class, 'update'])->middleware('auth')->name('update_token');
require __DIR__.'/auth.php';