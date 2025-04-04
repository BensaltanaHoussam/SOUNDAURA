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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('/assets/img/iconaurahhh.png') }}" type="image/x-icon">

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

<body class="bg-black text-white min-h-screen">

    <div class="flex flex-col h-screen">

        @include('components.navbar')
        <div class="flex flex-1 overflow-hidden">

            @include('components.dashboardAside')

            <!-- Main Content -->
            <main class="flex-1 overflow-auto">
                @yield('content')
            </main>
        </div>
        @include('components.footer')


    </div>



</body>

</html>