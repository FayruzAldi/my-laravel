<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => Student::count(),
            'total_grades' => Grade::count(),
            'total_departments' => Department::count(),
        ];

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'stats' => $stats
        ]);
    }
}
