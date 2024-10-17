<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{


    public function students()
    {
        $students = Student::all();
        return view('students', [
            'title' => 'Students',
            'students' => $students
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-student', ['title' => 'Tambah Siswa Baru']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
        ]);

        // Simpan data siswa baru
        Student::create($validatedData);

        return redirect()->route('students')->with('success', 'Siswa baru berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
