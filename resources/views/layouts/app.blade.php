<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
<!-- Header -->
<header class="bg-white shadow-lg border-b border-gray-200 sticky top-0 z-50 mb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <a href="{{ route('index') }}" class="flex items-center space-x-4 no-underline">
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Main
                    </h1>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-2">
                <a href="{{ route('students.index') }}"
                   class="inline-flex items-center px-6 py-3 text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105
                              {{ request()->routeIs('students.*') ?
                                 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg' :
                                 'bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 border border-gray-200 shadow-sm' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Students
                </a>

                <a href="{{ route('cities.index') }}"
                   class="inline-flex items-center px-6 py-3 text-sm font-semibold rounded-xl transition-all duration-300 transform hover:scale-105
                              {{ request()->routeIs('cities.*') ?
                                 'bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg' :
                                 'bg-white text-gray-700 hover:bg-green-50 hover:text-green-600 border border-gray-200 shadow-sm' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Cities
                </a>
            </nav>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button"
                        onclick="toggleMobileMenu()"
                        class="inline-flex items-center justify-center p-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-200 bg-white shadow-sm border border-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-gray-200 bg-white rounded-b-2xl shadow-lg">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('students.index') }}"
                   class="inline-flex items-center px-4 py-4 text-base font-semibold rounded-xl transition duration-200
                              {{ request()->routeIs('students.*') ? 'bg-blue-500 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Students Management
                </a>

                <a href="{{ route('cities.index') }}"
                   class="inline-flex items-center px-4 py-4 text-base font-semibold rounded-xl transition duration-200
                              {{ request()->routeIs('cities.*') ? 'bg-green-500 text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                    <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Cities Management
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <p class="text-gray-400">&copy; 2025 Lr3 Isichenko - Student Management System. All rights reserved.</p>
            <p class="text-gray-500 text-sm mt-2">Built with Laravel & Tailwind CSS</p>
        </div>
    </div>
</footer>

<!-- Mobile Menu Script -->
<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function (event) {
        const menu = document.getElementById('mobile-menu');
        const button = document.querySelector('[onclick="toggleMobileMenu()"]');

        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
</body>
</html>
