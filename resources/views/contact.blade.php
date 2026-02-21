<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact | Society Management</title>

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .card-hover { transition: all .3s ease; }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 40px rgba(0,0,0,.12);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- ================= NAVBAR ================= -->
<header class="bg-white shadow-sm">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="font-bold text-xl text-blue-600">
            🏢 Society Management
        </div>

        <div class="flex items-center gap-6 font-medium">
            <a href="/" class="hover:text-blue-600">Home</a>
            <a href="/about" class="hover:text-blue-600">About</a>
            <a href="/contact" class="text-blue-600 font-semibold">Contact</a>

            @auth
                <a href="{{ url('/dashboard') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="border px-4 py-2 rounded-lg hover:bg-gray-100">
                    Login
                </a>
            @endauth
        </div>
    </nav>
</header>

<!-- ================= HERO ================= -->
<section class="bg-blue-600 text-white py-12 text-center">
    <h1 class="text-4xl font-bold mb-3">Contact Us</h1>
    <p class="text-lg opacity-90">
        Have questions or need support? We're here to help you.
    </p>
</section>

<!-- ================= CONTACT SECTION ================= -->
<section class="py-12 flex-grow">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- ================= CONTACT INFO ================= -->
            <div class="space-y-6">

                <div class="bg-white p-6 rounded-xl shadow card-hover">
                    <h3 class="font-semibold text-lg mb-4 text-blue-600">
                        📍 Address
                    </h3>
                    <p class="text-sm text-gray-600">
                        ABC Society,<br>
                        Baner Road, Pune,<br>
                        Maharashtra, India
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow card-hover">
                    <h3 class="font-semibold text-lg mb-4 text-blue-600">
                        📞 Contact
                    </h3>
                    <p class="text-sm text-gray-600">
                        Phone: +91 98765 43210<br>
                        Email: support@society.com
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow card-hover">
                    <h3 class="font-semibold text-lg mb-4 text-blue-600">
                        ⏰ Working Hours
                    </h3>
                    <p class="text-sm text-gray-600">
                        Mon – Sat : 9 AM – 7 PM<br>
                        Sunday : Closed
                    </p>
                </div>

            </div>

            <!-- ================= CONTACT FORM ================= -->

        <!-- FLEX ROW -->
        <div class="flex flex-col lg:flex-row gap-6"></div>

 <div class="bg-white rounded-xl shadow-md w-full lg:w-1/2">

                <div class="bg-blue-600 text-white px-5 py-3 rounded-t-xl font-semibold">
                    📩 Contact Form
                </div>

                <div class="p-6">

                    <form method="POST" action="/contact-submit" class="space-y-4">
                        @csrf

                        <input type="text" name="name" placeholder="Name"
                            class="w-full border rounded-lg px-3 py-2 text-sm">

                        <input type="email" name="email" placeholder="Email"
                            class="w-full border rounded-lg px-3 py-2 text-sm">

                        <textarea name="message" rows="5" placeholder="Message"
                            class="w-full border rounded-lg px-3 py-2 text-sm"></textarea>

                        <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                            Send Message
                        </button>

                    </form>

                </div>
            </div>
           <!-- MAP CARD -->
<div class="bg-white rounded-xl shadow-md w-full lg:w-1/2 flex flex-col">

    <div class="bg-green-600 text-white px-5 py-3 rounded-t-xl font-semibold">
        📍 Society Location
    </div>

    <iframe
        src="https://www.google.com/maps?q=Pune,Maharashtra&output=embed"
        class="w-full h-[340px] rounded-b-xl border-0">
    </iframe>

</div>


        </div>

        <!-- ================= SOCIAL ================= -->
        <div class="mt-12 text-center">
            <h3 class="font-semibold text-lg mb-3">Follow Us</h3>
            <div class="flex justify-center gap-6 text-2xl">
                <span>🌐</span>
                <span>📘</span>
                <span>📸</span>
                <span>🐦</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-gray-300 py-6 text-center">
    © {{ date('Y') }} Society Management System. All rights reserved.
</footer>

</body>
</html>
