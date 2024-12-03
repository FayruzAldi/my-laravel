<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64 p-4">
            <h3 class="text-lg font-semibold mb-2 dark:text-white">Total Students</h3>
            <p class="text-3xl font-bold dark:text-white">{{ \App\Models\Student::count() }}</p>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64 p-4">
            <h3 class="text-lg font-semibold mb-2 dark:text-white">Total Grades</h3>
            <p class="text-3xl font-bold dark:text-white">{{ \App\Models\Grade::count() }}</p>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64 p-4">
            <h3 class="text-lg font-semibold mb-2 dark:text-white">Total Departments</h3>
            <p class="text-3xl font-bold dark:text-white">{{ \App\Models\Department::count() }}</p>
        </div>
    </div>
</x-admin-layout>
