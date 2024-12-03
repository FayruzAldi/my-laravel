<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <div class="text-red-600 dark:text-red-400">
            <h2 class="text-xl font-bold mb-4">{{ $message }}</h2>
            @if(isset($details))
                <pre class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg overflow-x-auto">
                    {{ $details }}
                </pre>
            @endif
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}"
               class="text-blue-600 dark:text-blue-400 hover:underline">
                Return to Dashboard
            </a>
        </div>
    </div>
</x-admin-layout>
