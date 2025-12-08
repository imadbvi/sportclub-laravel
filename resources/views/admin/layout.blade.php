<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r">
            <div class="p-4 font-bold text-lg">
                Admin Panel
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-gray-200">
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="block p-2 rounded hover:bg-gray-200">
                    Gebruikers beheren
                </a>
                <a href="#" class="block p-2 rounded hover:bg-gray-200">
                    Nieuws beheren
                </a>
                <a href="#" class="block p-2 rounded hover:bg-gray-200">
                    FAQ beheren
                </a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-bold mb-6">@yield('title')</h1>

            @yield('content')
        </main>

    </div>

</body>
</html>
