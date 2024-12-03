<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Grade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['grade:id,name', 'department:id,name'])
            ->latest()
            ->paginate(15);

        return view('admin.students.index', [
            'title' => 'Manage Students',
            'students' => $students
        ]);
    }

    public function create()
    {
        $grades = Grade::all();
        return view('admin.students.create', [
            'title' => 'Add New Student',
            'grades' => $grades
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
        ]);

        $student = Student::create($validatedData);
        $student->department_id = $student->grade->department_id;
        $student->save();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student added successfully');
    }

    public function edit(Student $student)
    {
        $grades = Grade::all();
        return view('admin.students.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            'grades' => $grades
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
        ]);

        $student->update($validatedData);
        $student->department_id = $student->grade->department_id;
        $student->save();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success', 'Student deleted successfully');
    }
}
