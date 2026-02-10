<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Society Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col">

<!-- ================= NAVBAR ================= -->
<header class="w-full border-b">
    <nav class="max-w-7xl mx-auto px-8 py-4 flex items-center justify-between">

        <div class="font-semibold text-lg">
            🏢 Society Management
        </div>

        <div class="flex items-center gap-6">
            <a href="/" class="hover:underline">Home</a>
            <a href="/about" class="hover:underline">About</a>
            <a href="/contact" class="font-semibold underline">Contact</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-4 py-1.5 border rounded hover:border-black">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-1.5 border rounded hover:border-black">
                        Login
                    </a>
                @endauth
            @endif
        </div>

    </nav>
</header>

<!-- ================= CONTACT SECTION ================= -->
<section class="py-20 bg-white flex-grow">
    <div class="max-w-6xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-start">

        <!-- LEFT : CONTACT FORM -->
        <div>
            <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
            <p class="text-gray-600 mb-8">
                Have a question or need support? Send us a message.
            </p>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/contact-submit"
                  class="bg-gray-50 p-8 rounded-lg shadow space-y-5">
                @csrf

                <div>
                    <label class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Message</label>
                    <textarea name="message" rows="4"
                              class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Send Message
                </button>
            </form>
        </div>

        <!-- RIGHT : CONTACT INFORMATION -->
        <div class="bg-gray-50 p-8 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-6">Contact Information</h2>

            <div class="space-y-4 text-gray-700">
                <p class="flex items-center gap-3">
                    📧 <span><strong>Email:</strong> society@gmail.com</span>
                </p>
                <p class="flex items-center gap-3">
                    📞 <span><strong>Phone:</strong> +91 9876543210</span>
                </p>
                <p class="flex items-center gap-3">
                    📍 <span><strong>Address:</strong> Pune, Maharashtra</span>
                </p>
                <p class="flex items-center gap-3">
                    ⏰ <span><strong>Working Hours:</strong> Mon – Sat, 9 AM – 6 PM</span>
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-800 text-white py-6 text-center">
    © {{ date('Y') }} Society Management System. All rights reserved.
</footer>

</body>
</html>
