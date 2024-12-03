<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class
        ]);

        // Buat departments terlebih dahulu
        $departments = $this->createDepartments();

        // Buat grades sesuai department
        $grades = $this->createGrades($departments);

        // Buat students dan distribusikan ke grades yang sesuai
        $this->createStudents($grades);
    }

    private function createDepartments(): Collection
    {
        // Departments tetap dan tidak berubah
        return collect([
            ['name' => 'PPLG', 'description' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => 'Animasi 3D', 'description' => 'Animasi 3 Dimensi'],
            ['name' => 'TG', 'description' => 'Teknik Grafika'],
            ['name' => 'Animasi 2D', 'description' => 'Animasi 2 Dimensi'],
            ['name' => 'DKV', 'description' => 'Desain Komunikasi Visual'],
        ])->map(fn ($dept) => Department::create($dept));
    }

    private function createGrades(Collection $departments): Collection
    {
        // Definisikan grade untuk setiap department secara berurutan
        $gradeStructure = [
            // PPLG (ID 1-6)
            'PPLG' => [
                ['id' => 1, 'name' => '10 PPLG 1'],
                ['id' => 2, 'name' => '10 PPLG 2'],
                ['id' => 3, 'name' => '11 PPLG 1'],
                ['id' => 4, 'name' => '11 PPLG 2'],
                ['id' => 5, 'name' => '12 PPLG 1'],
                ['id' => 6, 'name' => '12 PPLG 2']
            ],
            // Animasi 2D (ID 7-12)
            'Animasi 2D' => [
                ['id' => 7, 'name' => '10 ANIMASI 1'],
                ['id' => 8, 'name' => '10 ANIMASI 2'],
                ['id' => 9, 'name' => '10 ANIMASI 3'],
                ['id' => 10, 'name' => '10 ANIMASI 4'],
                ['id' => 11, 'name' => '11 ANIMASI 1'],
                ['id' => 12, 'name' => '11 ANIMASI 2'],
                ['id' => 13, 'name' => '11 ANIMASI 3'],
                ['id' => 14, 'name' => '11 ANIMASI 4'],
                ['id' => 15, 'name' => '12 ANIMASI 1'],
                ['id' => 16, 'name' => '12 ANIMASI 2'],
                ['id' => 17, 'name' => '12 ANIMASI 3'],
                ['id' => 18, 'name' => '12 ANIMASI 4']
            ],
            // Animasi 3D (ID 13-15)
            'Animasi 3D' => [
                ['id' => 19, 'name' => '10 ANIMASI 3D 1'],
                ['id' => 20, 'name' => '11 ANIMASI 3D 1'],
                ['id' => 21, 'name' => '12 ANIMASI 3D 1']
            ],
            // DKV (ID 16-21)
            'DKV' => [
                ['id' => 22, 'name' => '10 DKV 1'],
                ['id' => 23, 'name' => '10 DKV 2'],
                ['id' => 24, 'name' => '10 DKV 3'],
                ['id' => 25, 'name' => '11 DKV 1'],
                ['id' => 26, 'name' => '11 DKV 2'],
                ['id' => 27, 'name' => '11 DKV 3'],
                ['id' => 28, 'name' => '12 DKV 1'],
                ['id' => 29, 'name' => '12 DKV 2'],
                ['id' => 30, 'name' => '12 DKV 3']
            ],
            // TG (ID 22-27)
            'TG' => [
                ['id' => 31, 'name' => '10 TG 1'],
                ['id' => 32, 'name' => '10 TG 2'],
                ['id' => 33, 'name' => '11 TG 1'],
                ['id' => 34, 'name' => '11 TG 2'],
                ['id' => 35, 'name' => '12 TG 1'],
                ['id' => 36, 'name' => '12 TG 2']
            ]
        ];

        $grades = collect();

        foreach ($gradeStructure as $deptName => $gradeList) {
            $department = $departments->firstWhere('name', $deptName);
            foreach ($gradeList as $grade) {
                $grades->push(Grade::create([
                    'id' => $grade['id'],
                    'name' => $grade['name'],
                    'department_id' => $department->id
                ]));
            }
        }

        return $grades;
    }

    private function createStudents(Collection $grades): void
    {
        // Buat 20 siswa untuk setiap grade
        foreach ($grades as $grade) {
            Student::factory(20)->create([
                'grade_id' => $grade->id,
                'department_id' => $grade->department_id
            ]);
        }
    }
}
