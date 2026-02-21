<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About | Society Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

<!-- NAVBAR -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">🏢 Society Management</div>
        <nav class="flex gap-6 text-sm">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/about" class="text-blue-600 font-semibold">About</a>
            <a href="/contact" class="hover:text-blue-600">Contact</a>
            <a href="/login" class="px-4 py-2 border rounded hover:bg-blue-600 hover:text-white">Login</a>
        </nav>
    </div>
</header>

<!-- ABOUT CONTENT -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-center">

        <!-- Text -->
        <div>
            <h1 class="text-3xl font-bold mb-4">About Our System</h1>
            <p class="text-gray-600 mb-4">
                Society Management System is designed to simplify
                the management of residential societies.
            </p>
            <p class="text-gray-600">
                It helps admins, owners and security staff manage
                societies, wings, flats, residents and visitors
                efficiently with transparency and control.
            </p>
        </div>

        <!-- Image -->
        <div class="flex justify-center">
           <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be"
                alt="Society"
                class="rounded-lg shadow w-72 h-44 object-cover mx-auto">

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gray-800 text-white py-6 text-center mt-auto">
    © {{ date('Y') }} Society Management System
</footer>

</body>
</html>
