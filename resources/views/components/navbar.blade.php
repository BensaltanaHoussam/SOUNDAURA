<nav class="bg-black shadow-black shadow-2xl sticky top-0 z-50">
    <div class="container mx-auto px-8 lg:px-8">
        <div class="flex justify-between items-center h-16">


            <div class="hidden md:flex items-center space-x-4">
                <!-- Logo -->
                <div class="flex-shrink-0  md:block">
                    <a href="{{ route('home') }}">
                        <img class="h-10 w-[100px]" src="{{ url('/assets/img/soundauraLogo.png') }}" alt="SoundAura">

                    </a>
                </div>




                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const searchInput = document.getElementById('search-input');
                        const searchResults = document.getElementById('search-results');
                        let searchTimeout;

                        searchInput.addEventListener('input', function () {
                            clearTimeout(searchTimeout);

                            if (this.value.length < 2) {
                                searchResults.classList.add('hidden');
                                return;
                            }

                            // Show loading state
                            searchResults.innerHTML = '<div class="p-4 text-center text-gray-400">Searching...</div>';
                            searchResults.classList.remove('hidden');

                            searchTimeout = setTimeout(() => {
                                fetch(`/search?query=${encodeURIComponent(this.value)}`)
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        if (data.error) {
                                            throw new Error(data.error);
                                        }

                                        let resultsHtml = '';

                                        // Add tracks section
                                        if (data.tracks && data.tracks.length > 0) {
                                            resultsHtml += `
        <div class="p-2">
            <h3 class="text-xs text-gray-400 uppercase mb-2">Tracks</h3>
            <div class="space-y-2">
    `;
                                            data.tracks.forEach(track => {
                                                resultsHtml += `
        <div 
            onclick="playTrack('/storage/${track.audio_file}', '${track.title.replace(/'/g, "\\'")}', '${track.user.name.replace(/'/g, "\\'")}', '/storage/${track.cover_image}')"
            class="flex items-center p-2 hover:bg-gray-800 rounded cursor-pointer">
            <img src="/storage/${track.cover_image}" 
                 alt="${track.title}"
                 class="w-10 h-10 object-cover rounded mr-3"
                 onerror="this.src='/assets/img/default-track.jpg'">
            <div>
                <div class="text-sm text-white">${track.title}</div>
                <div class="text-xs text-gray-400">${track.user.name}</div>
            </div>
        </div>
    `;
                                            });
                                            resultsHtml += `</div></div>`;
                                        }

                                        // No results message
                                        if (!resultsHtml) {
                                            resultsHtml = `
                                                <div class="p-4 text-center text-gray-400">
                                                    No results found for "${this.value}"
                                                </div>
                                            `;
                                        }

                                        searchResults.innerHTML = resultsHtml;
                                    })
                                    .catch(error => {
                                        console.error('Search error:', error);
                                        searchResults.innerHTML = `
                                            <div class="p-4 text-center text-red-500">
                                                ${error.message || 'An error occurred while searching'}
                                            </div>
                                        `;
                                    });
                            }, 300);
                        });


                        document.addEventListener('click', function (event) {
                            if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
                                searchResults.classList.add('hidden');
                            }
                        });
                    });

                    // Function to play track
                    function playTrack(audioUrl, title, artist, coverImage) {

                        window.dispatchEvent(new CustomEvent('play-track', {
                            detail: {
                                url: audioUrl,
                                title: title,
                                artist: artist,
                                cover: coverImage
                            }
                        }));
                    }
                </script>






            </div>

            <div class="relative">
                <div
                    class="flex items-center bg-black border border-red-600 rounded-full px-3 py-1 focus-within:ring-1 focus-within:ring-red-500">
                    <input type="text" id="search-input" placeholder="Search tracks, artists..."
                        class="bg-transparent focus:outline-none text-sm w-96 text-white placeholder-gray-400" />
                    <i class="ri-search-line text-gray-400"></i>
                </div>

                <!-- Search Results Dropdown -->
                <div id="search-results"
                    class="hidden absolute left-0 right-0 mt-2 bg-black rounded-lg shadow-lg border border-gray-800 z-50 max-h-96 overflow-y-auto">
                </div>
            </div>

            




            <!-- Right Side -User Profile -->
            <div class="hidden md:flex items-center space-x-4">




                <!-- User Profile Dropdown -->
                <div class="relative" id="user-dropdown">
                    <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-white font-light">{{ auth()->user()->name }}</span>
                        <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center overflow-hidden">
                            <img src="{{ auth()->user()->profilePicture ? asset('storage/' . auth()->user()->profilePicture) : asset('assets/img/unknown.webp') }}"
                                alt="User Avatar" class="w-full h-full object-cover">
                        </div>


                    </button>

                    <!-- Add this after the button -->
                    <div id="user-menu-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-gray-900 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-800">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-notifications />
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center space-x-4">
                <!-- Mobile Search Button -->
                <button id="mobile-search-btn" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- User Profile on Mobile -->
                <button id="mobile-profile-btn" class="text-white focus:outline-none">
                    <div class="w-7 h-7 rounded-full bg-red-600 flex items-center justify-center overflow-hidden">
                        <img src="{{ url('/assets/img/bgggggg22.jpg') }}" alt="User Avatar"
                            class="w-full h-full object-cover">
                    </div>
                </button>

                <!-- Mobile menu hamburger button -->
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

    <!-- Mobile Search Panel (Hidden by default) -->
    <div id="mobile-search-panel" class="hidden md:hidden bg-gray-900 px-4 py-3 border-t border-gray-800">
        <div class="flex items-center bg-gray-800 border border-red-600 rounded-full px-3 py-2">
            <input type="text" placeholder="Search..."
                class="bg-transparent focus:outline-none text-sm flex-grow text-white placeholder-gray-400" />
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
                <img src="assets/img/avatar.jpg" alt="User Avatar" class="w-full h-full object-cover">
            </div>
            <div>
                <p class="text-white font-medium">John Doe</p>
                <p class="text-gray-400 text-xs">johndoe@example.com</p>
            </div>
        </div>
        <div class=" border-t border-gray-800 py-2">
                    <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Settings</a>
                    <a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Favorites</a>
                <div class="border-t border-gray-800 my-1"></div>
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-gray-800">Sign out</a>
            </div>

            <div class="border-t border-gray-800 my-1"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-red-400 hover:bg-gray-800">
                    Sign out
                </button>
            </form>
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
            document.addEventListener('DOMContentLoaded', function () {
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
                menuBtn.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                    // Hide other panels when menu is toggled
                    searchPanel.classList.add('hidden');
                    profilePanel.classList.add('hidden');
                });

                // Toggle search panel
                searchBtn.addEventListener('click', function () {
                    searchPanel.classList.toggle('hidden');
                    // Hide other panels when search is toggled
                    mobileMenu.classList.add('hidden');
                    profilePanel.classList.add('hidden');
                });

                // Toggle profile panel
                profileBtn.addEventListener('click', function () {
                    profilePanel.classList.toggle('hidden');
                    // Hide other panels when profile is toggled
                    mobileMenu.classList.add('hidden');
                    searchPanel.classList.add('hidden');
                });

                // Toggle user dropdown on desktop
                userMenuBtn.addEventListener('click', function () {
                    userMenuDropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function (event) {
                    const isClickInside = userMenuBtn.contains(event.target) || userMenuDropdown.contains(event.target);
                    if (!isClickInside && !userMenuDropdown.classList.contains('hidden')) {
                        userMenuDropdown.classList.add('hidden');
                    }
                });
            });





        </script>




</nav>