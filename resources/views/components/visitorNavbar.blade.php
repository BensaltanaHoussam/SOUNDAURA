<nav class="bg-black shadow-black shadow-2xl sticky top-0 z-50">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex justify-between items-center h-16">
            <!-- Logo (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="flex-shrink-0 md:block">
                    <a href="{{ route('home') }}">
                        <img class="h-10 w-[100px]" src="{{ url('/assets/img/soundauraLogo.png') }}" alt="SoundAura">
                    </a>
                </div>
            </div>

            <!-- Logo (Mobile) -->
            <div class="md:hidden flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img class="h-8 w-[80px]" src="{{ url('/assets/img/soundauraLogo.png') }}" alt="SoundAura">
                </a>
            </div>

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-white hover:text-red-500 transition-colors px-4 py-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white font-medium rounded-full px-6 py-2 transition-colors">
                    Sign Up
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900 border-t border-gray-800">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Home</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Playlists</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Services</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">About</a>
            <div class="border-t border-gray-800 my-2"></div>
            <div class="flex flex-col px-3 py-2 space-y-2">
                <a href="{{ route('login') }}" class="text-white hover:text-red-500 transition-colors py-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white font-medium rounded-full px-4 py-2 text-center transition-colors">
                    Sign Up
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            // Toggle mobile menu
            menuBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });

            // Close menu when clicking outside
            document.addEventListener('click', function (event) {
                if (!menuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</nav>