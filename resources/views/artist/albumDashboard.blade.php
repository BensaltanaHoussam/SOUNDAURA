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
                    @foreach ($albums as $album)
                        <!-- Album Row -->
                        <tr class="border-b border-slate-800 hover:bg-black">
                            <td class="pl-4"> <!-- Added padding -->
                                <button onclick="toggleTracks('album-{{ $album->id }}')"
                                    class="w-8 h-8 flex items-center justify-center rounded-full bg-black border hover:bg-slate-600 transition-colors">
                                    <i class="ri-arrow-down-wide-line transform transition-transform duration-200"
                                        id="chevron-album-{{ $album->id }}"></i>
                                </button>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-triangle-exclamation text-orange-500"></i>
                                    <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                        <img src="{{asset('storage/' . $album->cover_image)}}" alt="Album Cover"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div>{{$album->title}}</div>
                                        <div class="text-slate-400 text-sm">{{auth()->user()->name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>Multiple</td>
                            <td>Album</td>
                            <td>{{ $album->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button class="text-orange-500 hover:text-orange-400">
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                                    <span class="text-slate-400">0</span>
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

                        <!-- Tracklist Row -->
                        <tr id="album-{{ $album->id }}" class="hidden bg-black">
                            <td colspan="8" class="p-4">
                                <div class="ml-14 space-y-2">
                                    <div class="text-sm font-medium mb-2 text-slate-300">Tracklist:</div>
                                    <div class="grid gap-2">
                                        @foreach($album->tracks as $index => $track)
                                            <div class="flex items-center justify-between hover:border py-2 px-4 bg-black rounded-lg"
                                                onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ auth()->user()->name }}', '{{ asset('storage/' . $track->cover_image) }}')">
                                                <div class="flex items-center gap-3">
                                                    <span class="text-slate-400 text-sm">{{ $index + 1 }}</span>
                                                    <div>
                                                        <div class="text-white">{{ $track->title }}</div>
                                                        <div class="text-slate-400 text-sm">{{ $track->features ?: 'No features' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-4 ">
                                                    <button class="text-slate-400 hover:text-white">
                                                        <i class="fas fa-play"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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


    <!-- Modal -->
    <div id="createSongModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-black border p-8 rounded-lg max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Create New Album</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{ route('artist.albums.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6 w-[800px]">
                @csrf
                <!-- Album Details Section -->
                <div class="flex gap-6">
                    <!-- Left: Album Info -->
                    <div class="space-y-4 w-1/2">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Album Name</label>
                            <input type="text" name="album_name" required
                                class="w-full bg-black border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-red-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                            <textarea name="description" rows="3"
                                class="w-full bg-black border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-red-500"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Category</label>
                            <select name="category_id" required
                                class="w-full bg-black border border-gray-700 rounded-md px-4 py-2">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <!-- Right: Album Cover -->
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-400 mb-1">Album Cover</label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="w-full h-48 flex flex-col items-center justify-center px-4 py-6 bg-black text-gray-400 rounded-lg tracking-wide border border-gray-700 cursor-pointer hover:bg-black">
                                <div id="coverPreview" class="hidden w-full h-full">
                                    <img src="" alt="Album Cover Preview" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <i id="coverIcon" class="fas fa-cloud-upload-alt text-3xl"></i>
                                <span id="coverText" class="mt-2 text-sm">Select album cover</span>
                                <input type="file" name="cover_image" id="coverInput" class="hidden" accept="image/*"
                                    required onchange="previewCover(this)">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Songs Section -->
                <div class="border-t border-gray-700 pt-6">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-medium">Album Songs</h4>
                        <button type="button" onclick="addSongField()"
                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-2 rounded-md flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            Add Song
                        </button>
                    </div>

                    <div id="songsContainer" class="space-y-4">
                        <!-- Songs -->
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-black text-white rounded-md hover:bg-black">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">
                        Create Album
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>


        let songCount = 0;

        function addSongField() {
            songCount++;
            const songField = `
                                <div class="song-entry bg-black p-4 rounded-lg" id="song-${songCount}">
                                    <div class="flex justify-between items-center mb-3">
                                        <h5 class="font-medium">Song ${songCount}</h5>
                                        <button type="button" onclick="removeSong(${songCount})" class="text-red-500 hover:text-red-400">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-1">Song Title</label>
                                            <input type="text" name="songs[${songCount}][title]" required
                                                class="w-full bg-black border border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-red-500">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-1">Features</label>
                                            <input type="text" name="songs[${songCount}][features]"
                                                class="w-full bg-black border border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-red-500"
                                                placeholder="Optional">
                                        </div>

                                        <div class="col-span-2">
                                            <label class="block text-sm font-medium text-gray-400 mb-1">Audio File</label>
                                            <div class="flex items-center justify-center w-full">
                                                <label class="w-full flex items-center gap-2 px-4 py-3 bg-black text-gray-400 rounded-lg tracking-wide border border-gray-600 cursor-pointer hover:bg-gray-600">
                                                    <i class="fas fa-music"></i>
                                                    <span class="text-sm audio-name-${songCount}">Select audio file</span>
                                                    <input type="file" name="songs[${songCount}][audio]" 
                                                        class="hidden" accept="audio/*" required 
                                                        onchange="updateAudioName(${songCount}, this)">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

            document.getElementById('songsContainer').insertAdjacentHTML('beforeend', songField);
        }

        function openModal() {
            document.getElementById('createSongModal').classList.remove('hidden');
            document.getElementById('createSongModal').classList.add('flex');
            if (document.querySelectorAll('.song-entry').length === 0) {
                addSongField();
            }
        }

        function openModal() {
            document.getElementById('createSongModal').classList.remove('hidden');
            document.getElementById('createSongModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('createSongModal').classList.remove('flex');
            document.getElementById('createSongModal').classList.add('hidden');
        }


        function previewCover(input) {
            const preview = document.getElementById('coverPreview');
            const icon = document.getElementById('coverIcon');
            const text = document.getElementById('coverText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.querySelector('img').src = e.target.result;
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                    text.textContent = input.files[0].name;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewAudio(input) {
            const preview = document.getElementById('audioPreview');
            const icon = document.getElementById('audioIcon');
            const text = document.getElementById('audioText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.querySelector('audio source').src = e.target.result;
                    preview.querySelector('audio').load();
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                    text.textContent = input.files[0].name;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>








@endsection