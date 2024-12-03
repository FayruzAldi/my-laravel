<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        try {
            $grades = Grade::with(['department', 'students'])
                ->withCount('students')
                ->get();

            return view('admin.grades.index', [
                'title' => 'Manage Grades',
                'grades' => $grades
            ]);

        } catch (\Exception $e) {
            \Log::error('Error in GradeController@index: ' . $e->getMessage());
            return back()->with('error', 'Unable to load grades.');
        }
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.grades.create', [
            'title' => 'Add New Grade',
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Grade::create($validatedData);

        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade added successfully');
    }

    public function edit(Grade $grade)
    {
        $departments = Department::all();
        return view('admin.grades.edit', [
            'title' => 'Edit Grade',
            'grade' => $grade,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, Grade $grade)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $grade->update($validatedData);

        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade updated successfully');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return back()->with('success', 'Grade deleted successfully');
    }
}
