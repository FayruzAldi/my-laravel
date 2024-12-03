<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Debug View' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Debug View</h1>

        @if(isset($error))
            <div class="bg-red-100 p-4 mb-4 rounded">
                <h2 class="font-bold text-red-800">Error:</h2>
                <pre class="text-red-700">{{ $error }}</pre>
            </div>
        @endif

        @if(isset($debug))
            <div class="bg-blue-100 p-4 mb-4 rounded">
                <h2 class="font-bold text-blue-800">Debug Info:</h2>
                <pre class="text-blue-700">{{ print_r($debug, true) }}</pre>
            </div>
        @endif

        <div class="bg-white p-4 rounded shadow">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
