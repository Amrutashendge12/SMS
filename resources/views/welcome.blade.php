<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Society Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

<!-- ================= NAVBAR ================= -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
        <div class="text-xl font-bold tracking-wide">
            🏢 Society Management
        </div>

        <nav class="flex items-center gap-6 text-sm font-medium">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/about" class="hover:text-blue-600">About</a>
            <a href="/contact" class="hover:text-blue-600">Contact</a>

            @if (Route::has('login'))
                <a href="{{ route('login') }}"
                   class="px-4 py-2 border rounded hover:bg-blue-600 hover:text-white transition">
                    Login
                </a>
            @endif
        </nav>
    </div>
</header>

<!-- ================= HERO SECTION ================= -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-center">

        <!-- Text -->
        <div>
            <h1 class="text-4xl font-bold mb-4 leading-tight">
                Welcome to <span class="text-blue-600">Society Management System</span>
            </h1>

            <p class="text-gray-600 mb-6">
                A smart solution to manage societies, wings, flats, residents
                and security efficiently from one centralized platform.
            </p>

            <a href="{{ route('login') }}"
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                Get Started
            </a>
        </div>

        <!-- Image -->
        <div class="flex justify-center">
            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914"
                 alt="Society Building"
                 class="rounded-lg shadow-lg w-full max-w-sm h-64 object-cover">
        </div>
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-bold mb-12">Our Features</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">🏢 Society Management</h3>
                <p class="text-gray-600">
                    Manage societies, phases and wings easily.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">🏠 Flats & Residents</h3>
                <p class="text-gray-600">
                    Track flats, owners and tenants efficiently.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">🛡 Security Control</h3>
                <p class="text-gray-600">
                    Visitor entry, guards and security records.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-800 text-white py-6 text-center mt-auto">
    © {{ date('Y') }} Society Management System. All rights reserved.
</footer>

</body>
</html>
