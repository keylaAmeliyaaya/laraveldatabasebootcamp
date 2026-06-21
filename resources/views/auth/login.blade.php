<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">

        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">
            Login
        </h2>

        {{-- ERROR --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('proses_login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition">
                Login
            </button>

        </form>

    </div>

</body>
</html>