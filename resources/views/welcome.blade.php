<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Society Management System</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

<!-- ================= NAVBAR ================= -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">🏢 Society Management</div>

        <nav class="flex items-center gap-6 text-sm font-medium">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/about" class="hover:text-blue-600">About</a>
            <a href="/contact" class="hover:text-blue-600">Contact</a>

            <a href="{{ route('login') }}"
               class="px-4 py-2 border rounded hover:bg-blue-600 hover:text-white transition">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                Register
            </a>
        </nav>
    </div>
</header>

<!-- ================= HERO SECTION ================= -->
<section class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-24">
    <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h1 class="text-5xl font-bold mb-6 leading-tight">
                Smart Society <br> Management System
            </h1>

            <p class="mb-8 text-lg opacity-90">
                Manage residents, maintenance, complaints, and security
                from one centralized platform.
            </p>

            <a href="{{ route('login') }}"
               class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold shadow-lg hover:scale-105 transition">
                Get Started →
            </a>
        </div>

        <div class="flex justify-center">
            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914"
                 class="rounded-xl shadow-2xl w-full max-w-md">
        </div>
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-8 text-center">
        <h2 class="text-4xl font-bold mb-16">Our Features</h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition">
                <h3 class="text-xl font-semibold mb-3">🏢 Society Management</h3>
                <p class="text-gray-600">
                    Manage societies, phases, wings and residents easily.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition">
                <h3 class="text-xl font-semibold mb-3">🏠 Flats & Residents</h3>
                <p class="text-gray-600">
                    Track owners, tenants, flats and maintenance.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition">
                <h3 class="text-xl font-semibold mb-3">🛡 Security Control</h3>
                <p class="text-gray-600">
                    Visitor entry, security records and guard logs.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= STATS SECTION ================= -->
<section class="bg-gray-800 text-white py-20">
    <div class="max-w-6xl mx-auto grid md:grid-cols-4 text-center gap-8">

        <div>
            <h2 class="text-4xl font-bold">200+</h2>
            <p>Residents</p>
        </div>

        <div>
            <h2 class="text-4xl font-bold">50+</h2>
            <p>Flats</p>
        </div>

        <div>
            <h2 class="text-4xl font-bold">1000+</h2>
            <p>Complaints Resolved</p>
        </div>

        <div>
            <h2 class="text-4xl font-bold">98%</h2>
            <p>Satisfaction</p>
        </div>

    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-white py-6 text-center mt-auto">
    © {{ date('Y') }} Society Management System. All rights reserved.
</footer>

</body>
</html>