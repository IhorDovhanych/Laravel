<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function findById($array, $id){
        foreach ($array as $item){
            if($item['id'] == $id){
                return $item;
            }
        }
    }
    public function showAllStudents(Request $request)
    {
        $students = Student::all();
        return view('pages.grades.index', compact('students'))->with('user', $request->user());
    }
    public function edit(Request $request, $id){
        if(
            Gate::authorize('update-student')
        ) {
            $students = Student::all();
            $student = $this->findById($students, $id);
            return \view('pages.grades.student.edit', ['student' => $student]);
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function update(StudentRequest $request,$id){
        if (
            Gate::authorize('update-student')
        ) {
            $validatedGrade = $request->validate($request->rules());
            $students = Student::all();
            $student = $this->findById($students, $id);
            $student->update([
                'full_name' => $validatedGrade['full_name'],
                'course' => $validatedGrade['course'],
                'specialization' => $validatedGrade['specialization']
            ]);
            return \redirect(route('grades'));
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
}
