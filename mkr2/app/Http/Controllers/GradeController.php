<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Http\Requests\GradeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('delete-post', [$this->findById(Grade::all(), $id)]);
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
        $grades = Grade::all();
        $grade = $this->findById($grades, $id);
        if (
            Gate::authorize('update-post', [$grade])
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
            Gate::authorize('update-post', [$grade])
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
    public function create(Request $request){
        Gate::authorize('create-post');
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'||
            $request->user()['role'] == 'editor'
        ) {
        return \view('pages.grades.create');
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function store(GradeRequest $request){
        //Gate::authorize('create-post');
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin' ||
            $request->user()['role'] == 'editor'
        ) {
            $validatedGrade = $request->validate($request->rules());
            $grade = Grade::create([
                'lesson_name' => $validatedGrade['lesson_name'],
                'grade' => $validatedGrade['grade'],
                'grade_date' => $validatedGrade['grade_date'],
                'student_id' => $validatedGrade['student_id'],
                'editor_id' => $request->user()->id
            ]);
            return \redirect(route('grades'));
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
}
