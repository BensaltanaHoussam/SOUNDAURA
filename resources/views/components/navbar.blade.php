<nav class="bg-black shadow-black shadow-2xl sticky top-0 z-50">
    <div class="container mx-auto px-8 lg:px-16">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0  md:block">
                <img class="h-10 w-[100px]" src="{{'assets/img/soundauraLogo.png'}}" alt="SoundAura">
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-white hover:text-red-500 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-red-500 px-1 py-2">
                    Home
                </a>
                <a href="#" class="text-white hover:text-red-500 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-red-500 px-1 py-2">
                    Playlists
                </a>
                <a href="#" class="text-white hover:text-red-500 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-red-500 px-1 py-2">
                    Services
                </a>
                <a href="#" class="text-white hover:text-red-500 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-red-500 px-1 py-2">
                    About
                </a>
            </div>

            <!-- Right Side - Search & User Profile -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative">
                    <div class="flex items-center bg-black border border-red-600 rounded-full px-3 py-1 focus-within:ring-1 focus-within:ring-red-500">
                        <input type="text" placeholder="Search..." class="bg-transparent focus:outline-none text-sm w-40 text-white placeholder-gray-400" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            class="h-4 w-4 text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative" id="user-dropdown">
                    <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center overflow-hidden">
                            <img src="{{'assets/img/playboi.jpg'}}" alt="User Avatar" class="w-full h-full object-cover" onerror="this.src='assets/img/default-avatar.jpg'">
                        </div>
                        <span class="text-white font-light">Playboi carti</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="user-menu-dropdown" class="absolute right-0 mt-2 w-48 bg-black rounded-md shadow-lg py-1 z-50 hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-red-600">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-red-600">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-red-600">Favorites</a>
                        <div class="border-t border-gray-700 my-1"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-red-600">Sign out</a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center space-x-4">
                <!-- Mobile Search Button -->
                <button id="mobile-search-btn" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </button>
                
                <!-- User Profile on Mobile -->
                <button id="mobile-profile-btn" class="text-white focus:outline-none">
                    <div class="w-7 h-7 rounded-full bg-red-600 flex items-center justify-center overflow-hidden">
                        <img src="assets/img/avatar.jpg" alt="User Avatar" class="w-full h-full object-cover" onerror="this.src='assets/img/default-avatar.jpg'">
                    </div>
                </button>
                
                <!-- Mobile menu hamburger button -->
                <button id="menu-btn" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Search Panel (Hidden by default) -->
    <div id="mobile-search-panel" class="hidden md:hidden bg-gray-900 px-4 py-3 border-t border-gray-800">
        <div class="flex items-center bg-gray-800 border border-red-600 rounded-full px-3 py-2">
            <input type="text" placeholder="Search..." class="bg-transparent focus:outline-none text-sm flex-grow text-white placeholder-gray-400" />
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" 
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="h-4 w-4 text-gray-400">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
    </div>

    <!-- Mobile Profile Panel (Hidden by default) -->
    <div id="mobile-profile-panel" class="hidden md:hidden bg-gray-900 border-t border-gray-800">
        <div class="px-4 py-3 flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-red-600 flex items-center justify-center overflow-hidden">
                <img src="assets/img/avatar.jpg" alt="User Avatar" class="w-full h-full object-cover" onerror="this.src='assets/img/default-avatar.jpg'">
            </div>
            <div>
                <p class="text-white font-medium">John Doe</p>
                <p class="text-gray-400 text-xs">johndoe@example.com</p>
            </div>
        </div>
        <div class="border-t border-gray-800 py-2">
            <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Settings</a>
            <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Favorites</a>
            <div class="border-t border-gray-800 my-1"></div>
            <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-800">Sign out</a>
        </div>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900 border-t border-gray-800">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Home</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Playlists</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">Services</a>
            <a href="#" class="block px-3 py-2 rounded-md text-white font-medium hover:bg-gray-800">About</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            // Mobile search toggle
            const searchBtn = document.getElementById('mobile-search-btn');
            const searchPanel = document.getElementById('mobile-search-panel');
            
            // Mobile profile toggle
            const profileBtn = document.getElementById('mobile-profile-btn');
            const profilePanel = document.getElementById('mobile-profile-panel');
            
            // Desktop user dropdown toggle
            const userMenuBtn = document.getElementById('user-menu-btn');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');
            
            // Toggle mobile menu
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                // Hide other panels when menu is toggled
                searchPanel.classList.add('hidden');
                profilePanel.classList.add('hidden');
            });
            
            // Toggle search panel
            searchBtn.addEventListener('click', function() {
                searchPanel.classList.toggle('hidden');
                // Hide other panels when search is toggled
                mobileMenu.classList.add('hidden');
                profilePanel.classList.add('hidden');
            });
            
            // Toggle profile panel
            profileBtn.addEventListener('click', function() {
                profilePanel.classList.toggle('hidden');
                // Hide other panels when profile is toggled
                mobileMenu.classList.add('hidden');
                searchPanel.classList.add('hidden');
            });
            
            // Toggle user dropdown on desktop
            userMenuBtn.addEventListener('click', function() {
                userMenuDropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = userMenuBtn.contains(event.target) || userMenuDropdown.contains(event.target);
                if (!isClickInside && !userMenuDropdown.classList.contains('hidden')) {
                    userMenuDropdown.classList.add('hidden');
                }
            });
        });
    </script>
</nav>