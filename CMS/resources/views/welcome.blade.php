<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My CMS</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">My CMS</a>
            <div class="space-x-4">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">About</a>
                <a href="#" class="hover:text-gray-300">Services</a>
                <a href="#" class="hover:text-gray-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">Welcome to My CMS</h1>
            <p class="text-gray-700 mb-6">This is a simple content management system built with Laravel and Tailwind CSS.</p>
            <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Get Started</a>
        </div>
    </div>

</body>
</html>
