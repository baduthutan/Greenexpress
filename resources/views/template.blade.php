<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Express</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <img src="logo.png" alt="Green Express" class="h-12 mr-2">
            </div>
            <nav class="space-x-4">
                <a href="#" class="text-gray-700">Home</a>
                <a href="#" class="text-gray-700">Services</a>
                <a href="#" class="text-gray-700">Schedule & Location</a>
                <a href="#" class="text-gray-700">Terms and Conditions</a>
                <a href="#" class="text-gray-700">Contact</a>
                <button class="bg-yellow-400 px-4 py-2 rounded">Check Booking</button>
            </nav>
        </div>
    </header>

    <!-- Main Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <main class="container mx-auto p-4">
        @yield('content')
    </main>  
</body>
</html>