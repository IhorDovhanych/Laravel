<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\GradeResource;
use App\Http\Resources\GradeCollection;
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
Route::middleware('auth_api')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/grade/{id}', function ($id) {
        return new GradeResource(Grade::findOrFail($id));
    });

    Route::put('/grade/{id}', function (Request $request, $id) {
        Grade::findOrFail($id)->update($request->all());
        return new GradeResource(Grade::findOrFail($id));
    })->name('grade.id');

    Route::delete('/grade/{id}', function ($id) {
        Grade::findOrFail($id)->delete();
        return new GradeResource(Grade::all());
    });

    Route::post('/grades', function (Request $request) {
        return new GradeResource(Grade::create($request->all()));
    });

    Route::get('/grades', function () {
        return new GradeCollection(Grade::all());
    });

    Route::get('/student/{id}', function ($id) {
        return new StudentResource(Student::findOrFail($id));
    })->name('student.id');

    Route::put('/student/{id}', function (Request $request, $id) {
        Student::findOrFail($id)->update($request->all());
        return new StudentResource(Student::findOrFail($id));
    });

    Route::delete('/student/{id}', function ($id) {
        Student::findOrFail($id)->delete();
        return new StudentCollection(Student::all());
    });

    Route::post('/students', function (Request $request) {
        return new StudentResource(Student::create($request->all()));
    });

    Route::get('/students', function () {
        return new StudentCollection(Student::all());
    });
});
