<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About | Society Management</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

<!-- NAVBAR -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">🏢 Society Management</div>
        <nav class="flex gap-6 text-sm font-medium">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/about" class="text-blue-600 font-semibold">About</a>
            <a href="/contact" class="hover:text-blue-600">Contact</a>
            <a href="/login" class="px-4 py-2 border rounded hover:bg-blue-600 hover:text-white transition">Login</a>
            <a href="{{ route('register') }}"class="px-5 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">Register</a>
        </nav>
    </div>
</header>

<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-20 text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">About Our Smart System</h1>
        <p class="text-lg opacity-90">
            A powerful platform designed to manage residential societies efficiently,
            securely and transparently.
        </p>
    </div>
</section>

<!-- MAIN ABOUT CONTENT -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8 grid md:grid-cols-2 gap-14 items-center">

        <!-- Image -->
        <div class="flex justify-center">
            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be"
                 alt="Society"
                 class="rounded-2xl shadow-2xl w-full max-w-lg h-[380px] object-cover">
        </div>

        <!-- Text -->
        <div>
            <h2 class="text-3xl font-bold mb-6">Why Choose Our System?</h2>
            <p class="text-gray-600 mb-4">
                Society Management System helps administrators and residents
                manage operations digitally with complete transparency.
            </p>

            <ul class="space-y-3 text-gray-700">
                <li>✔ Easy resident & flat management</li>
                <li>✔ Secure visitor entry tracking</li>
                <li>✔ Complaint & maintenance management</li>
                <li>✔ Real-time notices & announcements</li>
                <li>✔ Centralized admin dashboard</li>
            </ul>
        </div>

    </div>
</section>

<!-- FEATURE HIGHLIGHTS -->
<section class="py-20 bg-gray-100">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-bold mb-12">Our Core Values</h2>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl transition">
                <h3 class="text-xl font-semibold mb-3">🔐 Security</h3>
                <p class="text-gray-600">Advanced access control & visitor monitoring.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl transition">
                <h3 class="text-xl font-semibold mb-3">⚡ Efficiency</h3>
                <p class="text-gray-600">Automated workflows & digital records.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-2xl transition">
                <h3 class="text-xl font-semibold mb-3">📊 Transparency</h3>
                <p class="text-gray-600">Clear communication between residents & admins.</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gray-900 text-white py-6 text-center mt-auto">
    © {{ date('Y') }} Society Management System. All rights reserved.
</footer>

</body>
</html>