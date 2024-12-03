<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()
            ->select('id', 'name', 'email', 'grade_id', 'department_id')
            ->with([
                'grade:id,name',
                'department:id,name'
            ])
            ->latest()
            ->paginate(15);

        if (request()->is('admin/*')) {
            return view('admin.students', [
                'title' => 'Manage Students',
                'students' => $students
            ]);
        }

        return view('students', [
            'title' => 'Daftar Siswa',
            'students' => $students
        ]);
    }

    public function show(Student $student)
    {
        return view('students.show', [
            'title' => 'Detail Siswa',
            'student' => $student
        ]);
    }

    public function create()
    {
        if (!auth()->guard('admin')->check()) {
            abort(403);
        }
        return view('admin.students.create', ['title' => 'Tambah Siswa Baru']);
    }

    public function store(Request $request)
    {
        if (!auth()->guard('admin')->check()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
        ]);

        $student = Student::create($validatedData);
        $student->department_id = $student->grade->department_id;
        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Siswa baru berhasil ditambahkan');
    }

    public function edit(Student $student)
    {
        if (!auth()->guard('admin')->check()) {
            abort(403);
        }

        return view('admin.students.edit', [
            'title' => 'Edit Siswa',
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        if (!auth()->guard('admin')->check()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
        ]);

        $student->update($validatedData);
        $student->department_id = $student->grade->department_id;
        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        if (!auth()->guard('admin')->check()) {
            abort(403);
        }

        $student->delete();
        return back()->with('success', 'Siswa berhasil dihapus');
    }
}
