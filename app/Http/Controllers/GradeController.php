<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        // Menggunakan query builder untuk optimasi lebih lanjut
        $grades = Grade::query()->select('grades.id', 'grades.name', 'grades.department_id')->with([
                'department:id,name',
                'students' => function($query) {
                    $query->select('id', 'name', 'grade_id', 'department_id')
                          ->orderBy('id');
                }
            ])
            ->orderBy('grades.id')
            ->get();

        return view('grade', [
            'title' => 'Grade',
            'grades' => $grades
        ]);
    }
    public function create()
    {
        return view('create-grade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Grade::create([
            'name' => $request->name,
        ]);

        return redirect()->route('grades')->with('success', 'Grade berhasil ditambahkan!');
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
