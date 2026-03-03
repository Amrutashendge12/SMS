<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | Society Management</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif}
</style>
</head>

<body class="min-h-screen flex">

<!-- LEFT SIDE -->
<div class="hidden md:flex w-1/2 bg-gradient-to-br from-indigo-600 to-blue-700 items-center justify-center p-14 text-white">

    <div class="text-center">
        <h1 class="text-5xl font-bold mb-6">🏢 Join Smart Society</h1>
        <p class="text-lg opacity-90">
            Create your account and start managing your society efficiently.
        </p>

        <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4"
             class="mt-10 rounded-2xl shadow-2xl w-full max-w-xl h-[420px] object-cover">
    </div>

</div>

<!-- RIGHT SIDE FORM -->
<div class="flex w-full md:w-1/2 items-center justify-center bg-gray-100">

<div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">

<h2 class="text-3xl font-bold text-center mb-6">Create Account ✨</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div class="mb-4">
<label class="text-sm text-gray-600">Name</label>
<input type="text" name="name" value="{{ old('name') }}"
class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none" required>
@error('name')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>

<!-- Email -->
<div class="mb-4">
<label class="text-sm text-gray-600">Email</label>
<input type="email" name="email" value="{{ old('email') }}"
class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none" required>
@error('email')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>

<!-- Password -->
<div class="mb-4 relative">
<label class="text-sm text-gray-600">Password</label>
<input id="password" type="password" name="password"
class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none" required>

<span onclick="togglePassword('password')"
class="absolute right-4 top-10 cursor-pointer text-gray-500">👁</span>

@error('password')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>

<!-- Confirm Password -->
<div class="mb-6 relative">
<label class="text-sm text-gray-600">Confirm Password</label>
<input id="password_confirmation" type="password" name="password_confirmation"
class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none" required>

<span onclick="togglePassword('password_confirmation')"
class="absolute right-4 top-10 cursor-pointer text-gray-500">👁</span>
</div>

<button type="submit"
class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition transform hover:scale-105">
Register
</button>

</form>

<p class="text-center text-gray-500 text-sm mt-6">
Already have an account?
<a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
</p>

</div>
</div>

<script>
function togglePassword(id){
const input=document.getElementById(id);
input.type=input.type==="password"?"text":"password";
}
</script>

</body>
</html>