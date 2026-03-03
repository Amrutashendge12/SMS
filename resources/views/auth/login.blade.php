<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Society Management</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="min-h-screen flex">

<!-- ================= LEFT SIDE IMAGE ================= -->
<div class="hidden md:flex w-1/2 bg-gradient-to-br from-blue-600 to-indigo-700 items-center justify-center p-10 text-white">

    <div class="text-center">
        <h1 class="text-5xl font-bold mb-6">🏢 Society Management</h1>
        <p class="text-lg opacity-90">
            Manage residents, maintenance, complaints & security
            easily from one smart platform.
        </p>
            <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4"
     class="mt-10 rounded-2xl shadow-2xl w-full max-w-xl h-[420px] object-cover border-4 border-white/20">
        
    </div>

</div>


<!-- ================= LOGIN FORM ================= -->
<div class="flex w-full md:w-1/2 items-center justify-center bg-gray-100">

    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Welcome Back 👋</h2>
            <p class="text-gray-500 text-sm mt-2">
                Login to continue managing your society
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-5">
                <label class="block text-gray-600 text-sm mb-2">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Password -->
            <div class="mb-6 relative">
                <label class="block text-gray-600 text-sm mb-2">Password</label>

                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">

                <!-- Eye Icon -->
                <span onclick="togglePassword()"
                      class="absolute right-4 top-10 cursor-pointer text-gray-500">
                    👁
                </span>
            </div>

            <!-- Remember -->
            <div class="flex justify-between items-center mb-6 text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}"
                   class="text-blue-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-105">
                Login
            </button>
        </form>

        <!-- Register -->
        <p class="text-center text-gray-500 text-sm mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold">
                Register
            </a>
        </p>

    </div>

</div>


<!-- ================= PASSWORD TOGGLE SCRIPT ================= -->
<script>
function togglePassword() {
    const pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>