<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My CMS</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <!-- Navigation Bar -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-800 dark:text-gray-200">My CMS</a>
            <div class="space-x-4">
                <a href="#"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Home</a>
                <a href="#"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">About</a>
                <a href="#"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Services</a>
                <a href="#"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Contact</a>

                <!-- Conditional Login/Signup or User Dropdown -->
                @auth
                    <div class="relative inline-block">
                        <button
                            class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none">
                            {{ Auth::user()->name }} ▼
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-2 hidden">
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-4">Welcome to My CMS</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-6">This is a simple content management system built with
                Laravel and Tailwind CSS.</p>
            @auth
                <a href="{{ route('dashboard') }}"
                    class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">Go
                    to Dashboard</a>
            @endauth
        </div>
    </div>

    <!-- Add a simple script for dropdown functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userButton = document.querySelector('button.hover\\:text-gray-800');
            const dropdown = document.querySelector('.absolute.hidden');

            if (userButton && dropdown) {
                userButton.addEventListener('click', function() {
                    dropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userButton.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>

</body>

</html>
