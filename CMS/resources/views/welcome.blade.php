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

    <!-- Upload Section for Teachers -->
    @auth
        @if(Auth::user()->role === 'teacher')
            <div class="container mx-auto mt-10 px-4">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Upload Content</h2>
                    <form action="{{ route('content.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required></textarea>
                        </div>

                        <!-- File Upload -->
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload File</label>
                            <input type="file" name="file" id="file"
                                class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300"
                                required>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- View Uploaded Content Section -->
            <div class="container mx-auto mt-10 px-4">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Your Uploaded Content</h2>
                    <div class="space-y-4">
                        @foreach(Auth::user()->contents as $content)
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $content->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $content->description }}</p>
                                <a href="{{ Storage::url($content->file_path) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-600">Download File</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endauth

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
