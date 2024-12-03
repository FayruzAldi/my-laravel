<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): array
    {
        // Dapatkan department yang sudah ada
        $department = Department::first();

        // Dapatkan grade yang sudah ada
        return [
            'department_id' => $department ? $department->id : null,
        ];
    }

    /**
     * Indicate that the grade belongs to a specific department.
     */
    public function forDepartment(Department $department): Factory
    {
        return $this->state(function (array $attributes) use ($department) {
            return [
                'department_id' => $department->id,
            ];
        });
    }
}
