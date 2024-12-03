<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <h2 class="text-2xl font-bold mb-4">Departments</h2>
                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Department</th>
                                <th class="px-4 py-2 border">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $department->id }}</td>
                                        <td class="px-4 py-2 border">{{ $department->name }}</td>
                                        <td class="px-4 py-2 border">{{ $department->description }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
