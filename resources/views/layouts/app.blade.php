<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.4s ease-out forwards;
        }

        /* Hover effect for nav links */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #ef4444;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Mobile menu animations */
        .mobile-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .mobile-panel.active {
            max-height: 500px;
            opacity: 1;
        }

        /* Pulse animation for search icon */
        .search-icon {
            transition: transform 0.3s ease;
        }

        .search-container:focus-within .search-icon {
            transform: scale(1.1);
            color: #ef4444;
        }

        /* Glow effect for active elements */
        .glow-effect:hover {
            box-shadow: 0 0 8px rgba(239, 68, 68, 0.6);
        }
    </style>
</head>

<body class="bg-gray-100">

    @include('components.navbar')

    <div class="flex ">
        <!-- Sidebar -->
        <aside class="border-r-white hidden sticky md:block bg-black p-6 top-0 h-screen">

            <!-- Navigation Links -->
            <nav class="space-y-4">
          
                <a href="#"
                    class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors active">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m6-1h3a1 1 0 001-1V10" />
                    </svg>

                </a>
                <a href="#" class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z" />
                    </svg>

                </a>
                <a href="#" class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>

                </a>
                <a href="#" class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>

                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>

</body>

</html>