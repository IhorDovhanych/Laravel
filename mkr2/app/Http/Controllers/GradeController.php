<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Http\Requests\GradeRequest;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    public function findById($array, $id){
        foreach ($array as $item){
            if($item['id'] == $id){
                return $item;
            }
        }
    }
    public function showGradeById(Request $request, $id)
    {
        $students = Student::with('grades')->get();
        $student = $this->findById($students, $id);

        return view('pages.grades.index', compact('id', 'student'))->with('user', $request->user());
    }
    public function showAllGrades(Request $request)
    {
        $students = Student::with('grades')->get();
        return view('pages.grades.index', compact('students'))->with('user', $request->user());
    }
    public function destroy(Request $request, $id){
        if(
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ){
            Grade::destroy($id);
            return \redirect()->back();
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function edit(Request $request, $id)
    {
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'||
            $request->user()['role'] == 'editor'
        ) {
            $grades = Grade::all();
            $grade = $this->findById($grades, $id);
            return \view('pages.grades.edit', ['grade' => $grade]);
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function update(GradeRequest $request,$id){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin' ||
            $request->user()['role'] == 'editor'
        ) {
            $validatedGrade = $request->validate($request->rules());
            $grades = Grade::all();
            $grade = $this->findById($grades, $id);
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
    public function create(Request $request){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ) {
        return \view('pages.grades.create');
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function store(GradeRequest $request){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ) {
            $validatedGrade = $request->validate($request->rules());
            $grade = Grade::create([
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
