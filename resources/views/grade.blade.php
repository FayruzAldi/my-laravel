<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <h2 class="text-2xl font-bold mb-4">Grades</h2>
                    <a href="{{ route('grades.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Grades
                    </a>
                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Grade</th>
                                <th class="px-4 py-2 border">List Student</th>
                                <th class="px-4 py-2 border">Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Grade::orderBy('id', 'asc')->get() as $grade)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $grade->id }}</td>
                                        <td class="px-4 py-2 border">{{ $grade->name }}</td>
                                        <td class="px-4 py-2 border">
                                            @foreach ($grade->students as $student)
                                                <ul>
                                                    <li>{{ $student->name }}</li>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2 border">{{ $grade->department->name }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
