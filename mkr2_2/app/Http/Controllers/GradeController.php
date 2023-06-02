<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GradeController extends Controller
{
    public function findById($array, $id){
        foreach ($array as $item){
            if($item['id'] == $id){
                return $item;
            }
        }
    }
    public function showAllGrades(Request $request)
    {
        $grades = Grade::all();
        return view('pages.grades.index', compact('grades'))->with('user', $request->user());
    }
    public function edit(Request $request, $id)
    {
        $grades = Grade::all();
        $grade = $this->findById($grades, $id);
        if (
            Gate::authorize('update-grade', [$grade])
        ) {
            return \view('pages.grades.edit', ['grade' => $grade]);
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function update(GradeRequest $request,$id){
        $validatedGrade = $request->validate($request->rules());
        $grades = Grade::all();
        $grade = $this->findById($grades, $id);
        if (
            Gate::authorize('update-grade', [$grade])
        ) {
            $grade->update([
                'lesson_name' => $validatedGrade['lesson_name'],
                'grade' => $validatedGrade['grade'],
                'grade_date' => $validatedGrade['grade_date'],
                'student_id' => $validatedGrade['student_id'],
            ]);
            return \redirect(route('grades'));
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
}
