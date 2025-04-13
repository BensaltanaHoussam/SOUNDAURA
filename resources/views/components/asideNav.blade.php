<!-- Sidebar -->
<aside class="border-r-white hidden sticky md:block bg-black p-6 top-0 h-screen">

    <!-- Navigation Links -->
    <nav class="space-y-4">

        <a href="{{ route('home') }}"
            class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors active">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m6-1h3a1 1 0 001-1V10" />
            </svg>

        </a>
        <a href=""
            class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z" />
            </svg>

        </a>
        <a href="{{ route('listner.profile.edit') }}"
            class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>

        </a>
        <a href="{{ route('listner.playlists') }}" class="nav-link flex items-center space-x-3 p-2 rounded-lg text-gray-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>

        </a>

    </nav>
</aside>