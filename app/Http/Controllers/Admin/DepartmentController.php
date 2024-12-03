<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        try {
            $departments = Department::with(['grades', 'students'])->get();

            return view('admin.departments.index', [
                'title' => 'Manage Departments',
                'departments' => $departments
            ]);
        } catch (\Exception $e) {
            // Log error
            \Log::error($e->getMessage());
            // Tampilkan error
            dd($e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.departments.create', [
            'title' => 'Add New Department'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Department::create($validatedData);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department added successfully');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', [
            'title' => 'Edit Department',
            'department' => $department
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $department->update($validatedData);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'Department deleted successfully');
    }
}
