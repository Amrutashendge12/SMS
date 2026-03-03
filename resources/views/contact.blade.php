<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact | Society Management</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif}

/* Fade animation */
.fade-up{
    animation:fadeUp 1s ease;
}
@keyframes fadeUp{
    from{opacity:0;transform:translateY(40px)}
    to{opacity:1;transform:translateY(0)}
}

/* Card hover */
.card-hover{
    transition:all .3s ease;
}
.card-hover:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

/* Input animation */
.input-focus:focus{
    transform:scale(1.02);
    transition:.3s;
}
</style>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- NAVBAR -->
<header class="bg-white shadow">
<nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
<div class="font-bold text-xl text-blue-600">🏢 Society Management</div>

<div class="flex gap-6 font-medium">
<a href="/" class="hover:text-blue-600">Home</a>
<a href="/about" class="hover:text-blue-600">About</a>
<a href="/contact" class="text-blue-600 font-semibold">Contact</a>
<a href="{{ route('login') }}" class="px-4 py-2 border rounded hover:bg-blue-600 hover:text-white transition">Login</a>
<a href="{{ route('register') }}"class="px-5 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">Register</a>
</div>
</nav>
</header>

<!-- HERO -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-20 text-center fade-up">
<h1 class="text-5xl font-bold mb-4">Contact Us</h1>
<p class="text-lg opacity-90">We are here to help you anytime.</p>
</section>

<!-- CONTACT -->
<section class="py-16 flex-grow fade-up">
<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-3 gap-8">

<!-- INFO -->
<div class="space-y-6">

<div class="bg-white p-6 rounded-2xl shadow card-hover">
<h3 class="font-semibold text-lg mb-3 text-blue-600">📍 Address</h3>
<p class="text-gray-600 text-sm">ABC Society,<br>Baner Road, Pune</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow card-hover">
<h3 class="font-semibold text-lg mb-3 text-blue-600">📞 Contact</h3>
<p class="text-gray-600 text-sm">+91 98765 43210<br>support@society.com</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow card-hover">
<h3 class="font-semibold text-lg mb-3 text-blue-600">⏰ Working Hours</h3>
<p class="text-gray-600 text-sm">Mon-Sat: 9AM-7PM</p>
</div>

</div>

<!-- FORM + MAP -->
<div class="lg:col-span-2 grid md:grid-cols-2 gap-6">

<!-- FORM -->
<div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
<h3 class="text-xl font-semibold mb-6 text-blue-600">Send Message</h3>

<form class="space-y-4">

<input placeholder="Name" class="w-full border px-4 py-3 rounded-lg input-focus">
<input placeholder="Email" class="w-full border px-4 py-3 rounded-lg input-focus">
<textarea rows="5" placeholder="Message" class="w-full border px-4 py-3 rounded-lg input-focus"></textarea>

<button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-105">
Send Message
</button>

</form>
</div>

<!-- MAP -->
<div class="rounded-2xl overflow-hidden shadow-lg">
<iframe src="https://www.google.com/maps?q=Pune&output=embed"
class="w-full h-[420px] border-0"></iframe>
</div>

</div>

</div>

</div>
</section>

<!-- SOCIAL -->
<section class="text-center pb-16 fade-up">
<h3 class="font-semibold text-lg mb-4">Follow Us</h3>
<div class="flex justify-center gap-8 text-3xl text-blue-600">
<span class="hover:scale-125 transition">🌐</span>
<span class="hover:scale-125 transition">📘</span>
<span class="hover:scale-125 transition">📸</span>
<span class="hover:scale-125 transition">🐦</span>
</div>
</section>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 py-6 text-center">
© {{ date('Y') }} Society Management System
</footer>

</body>
</html>