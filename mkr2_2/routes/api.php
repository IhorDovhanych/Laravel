<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Resources\GradeResource;
use App\Http\Resources\StudentResource;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth_api')->group(function () { //тут я використовую свій мідлвейр бо у мене виникає помилка при встаномлені passport (але в config/auth.php є приписані потрібні атрибути) сам мідлвейр підключений в Kernel.php
    Route::get('/student/{id}', function ($id) {
        return new StudentResource(Student::findOrFail($id));

    })->name('student.id');
    Route::delete('/grade/{id}', function ($id) {
        Grade::findOrFail($id)->delete();
        return new GradeResource(Grade::all());
    });

    Route::put('/grade/{id}', function (Request $request, $id) {
        Grade::findOrFail($id)->update($request->all());
        return new GradeResource(Grade::findOrFail($id));
    })->name('grade.id');

    Route::post('/grade', function (Request $request) {
        return new GradeResource(Grade::create($request->all()));
    });
});

