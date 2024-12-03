<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Gunakan konten yang sama dengan view students biasa --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Manage Students</h2>
                        <a href="{{ route('students.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Student
                        </a>
                    </div>

                    {{-- Table sama seperti view students biasa --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                {{-- Header table sama --}}
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        {{-- Kolom sama seperti view students --}}

                                        {{-- Tambah kolom aksi untuk admin --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
