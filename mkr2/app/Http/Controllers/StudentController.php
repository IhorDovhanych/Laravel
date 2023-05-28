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
    public function create(Request $request){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ) {
        return view('pages.grades.student.create');
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function store(StudentRequest $request){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ) {
            $validatedGrade = $request->validate($request->rules());
            $student = Student::create([
                'full_name' => $validatedGrade['full_name'],
                'course' => $validatedGrade['course'],
                'specialization' => $validatedGrade['specialization']
            ]);
            Gate::authorize('create-post', $student);
            return \redirect(route('grades'));
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }

    public function destroy(Request $request, $id){
        if(
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'
        ){
            Student::destroy($id);
            return \redirect()->back();
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function edit(Request $request, $id){
        if(
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin'||
            $request->user()['role'] == 'editor'
        ) {
            $students = Student::all();
            $student = $this->findById($students, $id);
            return \view('pages.grades.student.edit', ['student' => $student]);
        }
        return \redirect()->back()->with('error', "You don't have permissions");
    }
    public function update(StudentRequest $request,$id){
        if (
            $request->user()['role'] == 'admin' ||
            $request->user()['role'] == 'superAdmin' ||
            $request->user()['role'] == 'editor'
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
