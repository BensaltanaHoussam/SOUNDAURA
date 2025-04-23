@extends('layouts.dashboard')
@section('title', 'Home')
@section('content')




    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">My Music</h2>  
            <button onclick="openModal()"
                class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
                Create
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6">
            <button class="bg-red-600 text-gray-200 px-6 py-2 rounded-full">Drafts</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Distributed</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Deleted</button>
        </div>

        <!-- Search Bar -->
        <div class="relative mb-6">
            <i class="fas fa-search absolute left-3 top-3 text-slate-500"></i>
            <input type="text" placeholder="Search title, artist"
                class="w-full bg-black border border-slate-700 rounded-md py-2 pl-10 pr-4 focus:outline-none focus:ring-1 focus:ring-slate-600">
        </div>

        <!-- Layout Toggle -->
        <div class="flex justify-between items-center mb-4">
            <div></div>
            <div class="flex items-center gap-2 text-slate-400">
                <span>Layout</span>
                <button class="p-1 hover:bg-slate-700 rounded">
                    <i class="fas fa-table-cells"></i>
                </button>
                <button class="p-1 hover:bg-slate-700 rounded">
                    <i class="fas fa-grip"></i>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-slate-400 border-b border-slate-800">
                        <th class="w-12 pb-3 pl-4"></th> <!-- Expanded width for dropdown button -->
                        <th class="pb-3 pl-2">TITLE</th>
                        <th class="pb-3">Features</th>
                        <th class="pb-3">TYPE</th>
                        <th class="pb-3">RELEASE DATE</th>
                        <th class="pb-3">LIKES</th>
                        <th class="pb-3">STATUS</th>
                        <th class="pb-3">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Album Row -->
                    <tr class="border-b border-slate-800 hover:bg-black">
                        <td class="pl-4"> <!-- Added padding -->
                            <button onclick="toggleTracks('comments-1')"
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-black border hover:bg-slate-600 transition-colors">
                                <i class="ri-arrow-down-wide-line transform transition-transform duration-200"
                                    id="chevron-album-1"></i>
                            </button>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-triangle-exclamation text-orange-500"></i>
                                <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                    <img src="{{asset('assets/img/2093.jpg')}}" alt="Album Cover"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div>2093</div>
                                    <div class="text-slate-400 text-sm">Yeat</div>
                                </div>
                            </div>
                        </td>
                        <td>Multiple</td>
                        <td>Album</td>
                        <td>2025-03-18</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <button class="text-orange-500 hover:text-orange-400">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>
                                <span class="text-slate-400">12</span>
                            </div>
                        </td>
                        <td>
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Accepted</span>
                        </td>
                        <td class="pr-4">
                            <div class="flex justify-end gap-4">
                                <button class="text-slate-400 hover:text-white">
                                    <i class="ri-edit-box-fill"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-400">
                                    <i class="ri-delete-bin-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Comments Row (Hidden by default) -->
                    <tr id="comments-1" class="hidden bg-black">
                        <td colspan="8" class="p-4">
                            <div class="ml-14 space-y-2">
                                <!-- Comments List -->
                                <div class="text-sm font-medium mb-2 text-slate-300">Comments:</div>
                                <div class="space-y-2">
                                    <!-- Comment 1 -->
                                    <div class="flex items-start justify-between py-3 px-4 bg-black rounded-lg">
                                        <div class="flex items-start gap-3">
                                            <!-- User Avatar and Comment Info -->
                                            <div class="w-8 h-8 rounded-full bg-gray-500"></div>
                                            <!-- Placeholder for user avatar -->
                                            <div>
                                                <p class="text-white">John Doe</p>
                                                <p class="text-white pt-1   text-[15px]"> Thats hard !</p>
                                                
                                                <p class="text-slate-400 text-sm">March 25, 2025 at 3:30 PM</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <!-- Comment Actions -->
                                            <span class="text-slate-400">12 Likes</span>
                                            <button class="text-slate-400 hover:text-white">
                                                <i class="fas fa-thumbs-up"></i> Like
                                            </button>
                                            <button class="text-slate-400 hover:text-white">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Comment 2 -->
                                    <div class="flex items-start justify-between py-3 px-4 bg-black rounded-lg">
                                        <div class="flex items-start gap-3">
                                            <!-- User Avatar and Comment Info -->
                                            <div class="w-8 h-8 rounded-full bg-gray-500"></div>
                                            <!-- Placeholder for user avatar -->
                                            <div>
                                                <p class="text-white">Houssam Bensaltana</p>
                                                <p class="text-white pt-1   text-[15px]">My Favorite album</p>
                                                
                                                <p class="text-slate-400 text-sm">March 25, 2025 at 3:30 PM</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <!-- Comment Actions -->
                                            <span class="text-slate-400">12 Likes</span>
                                            <button class="text-slate-400 hover:text-white">
                                                <i class="fas fa-thumbs-up"></i> Like
                                            </button>
                                            <button class="text-slate-400 hover:text-white">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Add this JavaScript to handle the dropdown -->
        <script>
            function toggleTracks(albumId) {
                const tracksRow = document.getElementById(albumId);
                const chevron = document.getElementById(`chevron-${albumId}`);

                tracksRow.classList.toggle('hidden');
                chevron.classList.toggle('rotate-180');
            }
        </script>




        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            <div class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-700">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>







@endsection